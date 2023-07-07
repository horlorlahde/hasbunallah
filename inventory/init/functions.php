<?php
    require "config.php";
    // DataBase Connect 
    // Register User Function
    function regUser($username, $user_email, $user_password, $con_password, $code){
        // Get all function arguments
        global $conn;
        $args = func_get_args();
        // trim white spaces
        $args = array_map(
                    function($value){
                        return trim($value);
                    }, $args);

         // Checking is all fields are filled
        foreach($args as $value){
            if(empty($value)){
               return "All fields are required";
            }
        }
        // chaecking if the <> is not inputed
        foreach($args as $value){
            if(preg_match("/(<|>)/", $value)){
                echo "<> Characters are not allowed";
            }
        }
        
        // checking id username exist or not
        $stmt = $conn->prepare("SELECT username FROM `register` WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if($data != NULL){
            return "Username already exists";
        }

         

        // chaecking if the E-mail is valid;
        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
                $error = "E-mail is not valid";
                return $error;
        }

        // SELECT the email from data base iif it already exists
        $stmt = $conn->prepare("SELECT user_email FROM `register` WHERE user_email = ?");
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        if ($data != NULL){
            return "Email already exists";
        }


        if($user_password != $con_password){
            return "Passwords does not match";
        }

        $hash_pasword = md5($user_password);
        

        $stmt = $conn->prepare("INSERT INTO `register`(username, user_email, user_password,code) VALUES(?,?,?,?)");
        $stmt->bind_param("ssss", $username, $user_email, $hash_pasword,$code);
        $stmt->execute();

        if($stmt->affected_rows == 1){          
          
            return "success";
            // echo "<script> window.open('./login.php', '_self');</script>";
        }
        else{
            return "Please try again";
           
            
        }
        

    }
   
    // User Login Function
    function loginUser(){
           global $conn;
    
           if(isset($_GET['verification'])){
            $get_verification = $_GET['verification'];
            $sql = "SELECT * FROM register WHERE code ='$get_verification'";
            $query =mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            if($count > 0){
                $sql = "UPDATE register SET code = '' WHERE code ='$get_verification'";
                $quer = mysqli_query($conn, $sql);
    
                if($quer){
                    return "success";      
                }
            }else{
              return "<script>window.open('./login.php', '_self');</script>";
            }
         }
    
    
         if(isset($_POST['sign_in'])){
                            $user_email = mysqli_real_escape_string($conn , $_POST['user_email']);
                            $user_password = mysqli_real_escape_string($conn, md5($_POST['user_password']));
                          
                            $sql = "SELECT * FROM register WHERE user_email = '{$user_email}' AND user_password = '{$user_password}'";
    
                            $que = mysqli_query($conn ,$sql);
                            $count = mysqli_num_rows($que);
                            $fetch = mysqli_fetch_assoc($que);
                            
                             if ($count > 0){
                                 if(empty($fetch['code'])){
                                     $_SESSION['user_email'] = $user_email;
                                     return "<script>window.open('./dashboard.php', '_self');</script>";
    
                                }else{
                                    return  "<sapn style='color: #def44e'>First verify your account</span>";
                                }
                             }else{
                                return "E-mail or Password incorrect";
                             }
                         
    
            }
    
    
    
    
    }

    // User Logout Function
    function logoutUser(){
        
        session_unset();
        session_destroy();
        header("Location: ./login.php"); 
        exit();   

    }

    // User Password reset function
    function passwordReset(){
        global $conn;

        if(isset($_POST['forgot'])){
            $user_email = mysqli_real_escape_string($conn , $_POST['user_email']);
            $code = mysqli_real_escape_string($conn, md5(rand()));
            
            $sql = "SELECT * FROM register WHERE user_email = '{$user_email}'";
            $query = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($query);
            // $fetch = mysqli_fetch_assoc($query);

            $sql2 = "UPDATE register SET code = '{$code}' WHERE user_email = '{$user_email}'";
            $query2  = mysqli_query($conn, $sql2);

            if($count > 0){
                if($query2){
                    return "success";
                }
            }else{
                return "$user_email- <br>This E-mail address not found";
            }



        }

    }

    function deleteAcct(){

    }


    function userDashboard() {
      
     
    }
