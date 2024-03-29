<?php
    session_start();
        // include "./init/config.php";
    include './init/functions.php';
    if(isset($_SESSION['user_email'])){
        header("Location: dashboard.php");
      
    }else{
    $message = loginUser();
    @$user_email = $_POST['user_email'];
    }



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
          
    <title>Inventory-Login</title>
</head>
<body>
    <div class="container">
        <div class="loginHeader">
            <a href="index.php"><img src="./imges/logo.png" alt="" class="logo"></a> 
           
        </div>
        <div class="">
            <form action="" method="POST">
                <div class="loginBody">
                    <div class="sign">
                        <h1>Sign In</h1>
                        <?php
                                if(@$message == "success"){
                            ?>
                                <p class="success" style="color:green; font-size:small;margin-top:15px; margin-bottom:0;"><b>Your account has been successfully verified</b></p>
                            <?php
                                }else{
                            ?>
                                <p class="error" style="color:red; font-size:small;margin-top:15px; margin-bottom:0;"><b><?php echo @$message;?></b></p>
                            <?php
                                }
                            ?>
                    </div>
                    <div class="shift">
                        <!-- <label for="">Username</label> -->
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; <input type="text" placeholder="E-mail" class="inp" name="user_email" value="<?php echo @$user_email;?>">
                    </div>
                    <div class="shift">
                        <!-- <label for="">Password</label> -->
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>&nbsp; <input type="password" placeholder="Password" class="inp" name="user_password">
                    </div>
                    <div class="forgot">
                        <a href="forgot_password.php">Forgot your password?</a>
                    </div>
                    
                    <input type="submit" class="signin"  name="sign_in"value="Sign In">
                    <div class="acct">
                        <h5>Don't have an account?<a href="register.php">Signup here</a>
                        </h5>
                 </div>
                </div>
                
            </form>

        </div>
    </div>
</body>
</html>
