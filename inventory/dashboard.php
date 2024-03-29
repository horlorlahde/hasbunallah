<?php
  session_start();
    include "./init/functions.php";

    if(!isset($_SESSION['user_email'])){
        header("Location: login.php");
       
    }else{
      $sql = "SELECT * FROM register WHERE user_email = '{$_SESSION['user_email']}'";
      $query = mysqli_query($conn, $sql);
      $result = mysqli_fetch_assoc($query);
      $count = mysqli_num_rows($query);


      if(isset($_GET['logout'])){
      logoutUser();
      }
     
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/dashboard.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
            
      <title>Inventory-Login</title>
  </head>
  <body> 
    <div class="container" id="container">
        <div class="dashboard-sidebar">
          <div class="dashboard_logo">
            <img src="./imges/logo.png" alt="" class="logo"><p>Hasbunallah Enterprises</p>
          </div>
          <div class="dashboard_sidebar_user">
            <img src="./imges/saal.jpg" alt="" class="user-img">
            <span><?php echo ucwords(@$result['username']) ?></span>
          </div>
          <div class="dashboard_sidebar_nav">
            <ul class="dashboard_nav_list">
              <li class="menuActive">
                <a href="" ><i class="fa fa-dashboard"></i> DASHBOARD</a>
              </li>
              <li>
                <a href="" ><i class="fa fa-dashboard"></i> DASHBOARD</a>
              </li>
              <li>
                <a href="" ><i class="fa fa-dashboard"></i> DASHBOARD</a>
              </li>
              <li>
                <a href="" ><i class="fa fa-dashboard"></i> DASHBOARD</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="dashboard-container">
          <div class="dashboard_topNav">
              <a href="" id="toggleBtn"><i class="fa fa-navicon"></i></a>
              <a href="?logout" id="logoutBtn"><i class="fa fa-power-off"></i> Logout</a>
          </div>
          <div class="dashboard_content">
              <div class="dashboard_content_main">
               
              </div>
            </div>
            <footer>
              <p class="footer">Hasbunallah Enterprises @ 2022 By : Shopade Abdulazeez</p>
            </footer>
        </div>
    </div> 


    <script>
      toggleBtn.addEventListener("click", (event)=>{
        event.preventDefault();  

      }
      );
    </script>

  </body>
</html>