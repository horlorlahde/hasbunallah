<?php
    include './init/functions.php';
  if(isset($_SESSION['user_email'])){
    header("Location: dashboard.php");
}


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href= 
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
            
        <title>Inventory-Login</title>
    </head>
    <body>

        <section>
            <div class="homeContainer">
                <div class="topnav" id="myTopnav">
                    <a href="index.php" ><img src="./imges/logo.png" alt="" class="logo"></a>
                    <a href="#contact" class="active top">Contact</a>
                    <a href="#about " class="active top">About</a>
                    <a href="login.php" class="active "> <input type="submit" class="signin" value="Sign In"></a>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                      <i class="fa fa-bars"></i>
                    </a>
                 </div>
                  
                  <div class="homeBody">
                    <h2>
                      Hasbunallah <span style="color: grey;"> Enterprises </span>

                    </h2>
                    
                    
                  </div>
                   
          
            </div>

        </section>
          
        
          <div class="container2">
            <div class="row">
              <div class="columns1 columns"> 
                  <div class="col-1">
                    <!-- Card -->
                    <div class="card">
                      <img class="card-img-top" src="./imges/settings.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                    <!-- card -->
                  </div>
                  <div class="col-1">
                      <!-- Card -->
                      <div class="card">
                        <img class="card-img-top" src="./imges/star-icon.png" alt="Card image cap">
                       
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                      <!-- card -->
                  </div>
                  <div class="col-1">
                       <!-- Card -->
                    <div class="card">
                      <img class="card-img-top" src="./imges/earth.png" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      </div>
                    </div>
                    <!-- card -->
                  </div>
              </div> 
              <div  class="columns2 columns"> 
                  <div class="col-2">
                      <h4>Get In Touch</h4>
                     
                        <form action="" class="input-icons">
                          <label for="">Name</label>
                          <div class="input1">
                            <i class="fa fa-user icon"></i>
                            <input type="text" name="" id="" class="input-field inpu " >
                          </div>
                          <label for="">E-mail</label>
                          <div class="input1">
                            <i class="fa fa-envelope icon"></i>
                            <input type="email" name="" id="" class="input-field inpu " >
                          </div>
                          <label for="">Subject</label>
                          <div class="input1">
                            <i class="fa fa-book icon"></i>
                            <input type="text" name="" id="" class="input-field inpu " >
                          </div>
                          <label for="">Message</label>
                          <div class="input1">
                            <i class="fa fa-message-lines icon"></i>
                            <textarea name="" id="" cols="30" rows="3" class="input-field inpu"></textarea>
                          </div>
                           
                            
                          
                          <input type="submit" name="" id="" class="sub" value="Send Message">

                        </form>
                       
                  </div>
                  <div class="col-2">
                    <iframe  src="https://www.youtube.com/embed/eU36saitAZo?list=PLglf6-OPbGDfDFpnN67xqvTCR4WxQm4bd" title="PHP Project: How To Create Your First Website Homepage using HTML CSS - Step-by-step Tutorial - I" frameborder="0" 
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                   
                  </div>
              </div> 
            </div>
            
            <footer>
              <p class="footer">Hasbunallah Enterprises @ 2022 By : Shopade Abdulazeez</p>
            </footer>
          </div>

         

        <script>
            function myFunction() {
              var x = document.getElementById("myTopnav");
              if (x.className === "topnav") {
                x.className += " responsive";
              } else {
                x.className = "topnav";
              }
            }
            </script>
    </body>
</html>