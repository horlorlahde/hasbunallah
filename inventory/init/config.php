
<?php
    @session_start();

    define("host", "localhost");
    define("name", "root");
    define("password", "");
    define("database", "hasent");

    
    $conn = mysqli_connect(host, name, password, database);

    if(!$conn){
         $error = mysqli_connect_error();
         $error_date = date("F j, Y  g:ia");
         $message = "$error| {$error_date} \r\n";
         file_put_contents("db-error.txt", $message, FILE_APPEND);            
     }
        
   