<?php
    require "config.php";
    // DataBase Connect 
    // Register User 
    

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

        $hash_pasword = password_hash($user_password, PASSWORD_DEFAULT);
        

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
   

    function loginUser($username, $user_password){
           global $conn;

            if(isset($_GET['verification'])){
                $get_verification = $_GET['verification'];
                $sql = "SELECT * FROM register WHERE code = ? ";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $get_verification);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $stmt->num_rows($result);
                var_dump($data);
            }






           $username = trim($username);
           $user_password = trim($user_password);

           if($username = "" || $user_password = ""){
                return "Both fields are required";
           }

           $username = filter_var($username, FILTER_SANITIZE_STRING);
           $user_password = filter_var($user_password, FILTER_SANITIZE_STRING);



           $sql = "SELECT username, user_password FROM register WHERE username = ? ";
           $stmt = $conn->prepare($sql);
           $stmt->bind_param('s', $username);
           $stmt->execute();
           $result = $stmt->get_result();
           $data = $result->fetch_assoc();

           

           if ($data == NULL) {
            return "Username or Password incorrect";
           }

           if(password_verify($user_password, $data['user_password'] == TRUE)){
               return "Username or Password incorrect";
           
            }else{
                $_SESSION['username'] = $username;
                header("Location: ./dashboard.php");
                exit();
            
        
           }
    }

function logoutUser(){
    session_destroy();
    header("Location: ./login.php"); 
    exit();   

}

function passwordReset(){

}

function deleteAcct(){

}
