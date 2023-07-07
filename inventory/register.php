<?php
    include './init/functions.php';
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_SESSION['user_email'])){
        header("Location: dashboard.php");
    }

    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    if(isset($_POST['sign_up'])){
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $con_password = $_POST['con_password'];
        $code = md5(rand());
        $response = regUser($username , $user_email, $user_password, $con_password,$code);
        
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
                <div class="regBody">
                    <div class="sign">
                        <h1>Sign Up</h1> 
                            <?php
                                if(@$response == "success"){
                                    echo "<div style='display:none;'>";
                                    //Create an instance; passing `true` enables exceptions
                                    $mail = new PHPMailer(true);

                                    try {
                                        //Server settings
                                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                                        $mail->isSMTP();                                            //Send using SMTP
                                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                                        $mail->Username   = 'saal2407@gmail.com';                     //SMTP username
                                        $mail->Password   = 'efrbnepzhmhhlwcz';                               //SMTP password
                                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                                        //Recipients
                                        $mail->setFrom('saal2407@gmail.com');
                                        $mail->addAddress($user_email);

                                    
                                        //Content
                                        $mail->isHTML(true);                                  //Set email format to HTML
                                        $mail->Subject = 'no reply';
                                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/hasbunallah/inventory/login.php?verification='.$code.'">http://localhost/hasbunallah/inventory/login.php?verification='.$code.'</a></b>';

                                        $mail->send();
                                        echo 'Message has been sent';
                                    } catch (Exception $e) {
                                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                                    }
                                    echo "</div>";
                                 ?>
                                <p class="success" style="color:green; font-size:small;margin-top:15px; margin-bottom:0;">We've sent a verification login to your email</p>
                            <?php
                                }else{
                            ?>
                                <p class="error" style="color:red; font-size:small;margin-top:15px; margin-bottom:0;"><?php echo @$response;?></p>
                            <?php
                                }
                            ?>
                           
                    </div>
                    <div class="shift">
                        <!-- <label for="">Username</label> -->
                        <i class="fa fa-user" aria-hidden="true"></i> &nbsp; <input type="text" name="username" placeholder="Enter Fullname" class="inp" value="<?php echo @$username;?>">
                    </div>
                    <div class="shift">
                        <!-- <label for="">Username</label> -->
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; <input type="text" name="user_email" placeholder="Enter E-mail" class="inp" value="<?php echo @$user_email;?>">
                    </div>
                    <div class="shift">
                        <!-- <label for="">Password</label> -->
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>&nbsp; <input type="password" name="user_password" placeholder="Enter Password" class="inp" value="<?php echo @$user_password;?>">
                    </div>
                    <div class="shift">
                        <!-- <label for="">Password</label> -->
                        <span><i class="fa fa-key" aria-hidden="true"></i></span>&nbsp; <input type="password" name="con_password" placeholder="Confirm Password" class="inp" value="<?php echo @$con_password;?>">
                    </div>
                    <div class="acct">
                        <h5>Already have an account?<a href="login.php">Sign in</a>
                        </h5>
                 </div>
                  
                    <input type="submit" name="sign_up" class="signup" value="Sign Up">
                   
                </div>
               
                
            </form>

        </div>
    </div>
  
</body>
</html>
