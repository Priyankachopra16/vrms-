
<?php
session_start();
include_once 'includes/config1.php';
error_reporting(0);
if(isset($_POST['login']))
{
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,FullName FROM tblusers WHERE EmailId=:email and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['login']=$_POST['email'];
$_SESSION['fname']=$results->FullName;
$currentpage=$_SERVER['REQUEST_URI'];
/*echo "<script type='text/javascript'> document.location = '$currentpage'; </script>";*/
    echo "<script>
alert('You are LoggedIn  Successfully');
window.location.href='Scooty.php?email=$email';
</script>";
} else{
  
  echo "<script>
alert('Incorrect Password,Login Again');
window.location.href='index.php';
</script>";

}

}
/*if(isset($_POST["login"]))
{
    //echo"test";exit;
 $email=$_POST["email"];
 $password=$_POST["password"];
  $query="select * from $dbname.customer_reg where email='$email' and password='$password'";
$result=mysqli_query($conn,$query);
if(mysqli_num_rows($result)!=0)
{
    $_SESSION["mail"]=$email;
    
   echo "<script>
alert('You are LoggedIn  Successfully');
window.location.href='Scooty.php?email=$email';
</script>"; 
}
    else
{
    echo "<script>
alert('Incorrect Password,Login Again');
window.location.href='index.php';
</script>"; 
}
    
}*/
?>



<!DOCTYPE html>
<html lang="zxx">



<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Vehicle Rental Management System</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
   <link rel="stylesheet" href="css/bootstrap/bootstrap-grid.css">
   <link rel="stylesheet" href="css/bootstrap/bootstrap-reboot.css">

   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico">

   <!-- Google font -->
   <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      rel="stylesheet">

   <!-- owl carousle css -->
   <link rel="stylesheet" href="css/owl-carousel/owl.carousel.css" type="text/css">
   <link rel="stylesheet" href="css/owl-carousel/owl.theme.default.min.css" type="text/css">

   <!-- Swiper Slider -->
   <link rel="stylesheet" href="css/swiper/swiper.min.css">
   <link rel="stylesheet" href="css/swiper/swiper-slide.css">

   <!-- Custome CSS -->
   <link rel="stylesheet" href="css/custome/style.css">

   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/custome/responsive.css">
   
   <!-- Flaticon CSS -->
   <link rel="stylesheet" href="font/flaticon.css">
</head>

<body>
   <!-- Nav Bar Starts here -->
   
  <nav class="navbar fixed-top navbar-expand-lg">
      <div class="container">
         <div class="navbar-light bg-dark">
         <!-- Logo -->
            <a class="navbar-brand" href="index.html">
               <img src="images/head_logo.png" alt="">
            </a>
         <!-- Logo -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                 <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="car.php">Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bike.php">Bike</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="Scooty.php">Scooty</a>
                </li>
              
               <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
                
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?>
   <i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="my-booking.php">My Booking</a></li>
          
            <li><a href="logout.php">Sign Out</a></li>
            <?php }else { ?>
          </ul>
            </li>
          </ul>
        </div>
    <!--    <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          <form action="search.php" method="post" id="header-search-form">
         
            <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
          </form>
        </div>-->
      </div>
      <?php  ?>
            <form class="form-inline my-2 my-lg-0">
               <button class="btn-link my-2 my-sm-0 ml-15" type="submit"><a href="index1.php">SignUp</a></button>
            </form><?php }?>
        </div>
         
      </div>
      </div>
    
   </nav>
   
   <!-- Nav Bar Ends here -->
   <!-- Hero Image Starts here -->

   <div class="hero-image">
      <div class="container">
         <div class="row">
            <div class="col-lg-12">
               <div class="hero-text">
                  <h5>TryRide vehicle rentals</h5>
                  <h1 class="text-pink">Get your Car & Bike Rentals<span class="text-black"></span></h1>
               </div>
            </div>
         </div>
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
         <!-- Swiper -->
            <div class="swiper-container">
               <div class="swiper-wrapper">
                  
                  <div class="swiper-slide">
                     
                     <div class="slider-text-bg">
                              
                        <div class="title" data-swiper-parallax="900">
                           <img src="images/hero_car_2.png" class="img-fluid" alt="">
                        </div>
                     
                        <div class="text" data-swiper-parallax="1500">
                           <img src="images/hero_car_1.png" class="img-fluid" alt="">
                        </div>

                     </div>
                  </div>
                  
                  <div class="swiper-slide">
                     
                     <div class="slider-text-bg">
                              
                        <div class="title" data-swiper-parallax="600">
                           <img src="images/hero_bike_2.png" class="img-fluid" alt="">
                        </div>
                     
                        <div class="text" data-swiper-parallax="1000">
                           <img src="images/hero_bike_1.png" class="img-fluid" alt="">
                        </div>

                     </div>
                  </div>
                  
                  
               </div>
               <!-- Add Pagination -->
               <div class="swiper-pagination swiper-pagination-h"></div>
            </div>
         <!-- Swiper login box -->
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 offset-lg-1 offset-md-1">
               <div class="form-head">
                  
               </div>
               
               <div class="form-home">
                  <form action="index.php" method="post">
                     <div class="form-login">
                       <h6>Login Now </h6>
                     </div>
                     <div class="form-group">
                        <input type="email" name="email"class="form-control" id="formGroupExampleInput1" placeholder="Enter your Email">
                         <input type="password" class="form-control" name="password"id="formGroupExampleInput1" placeholder="Enter your password">
                         
                     </div>
                   
                     <button type="submit" class="btn btn-prim-round mt-4"name="login" >Login </button>
                      <button type="submit" class="btn btn-prim-round mt-4"name="cancel" >Cancel </button>
                  </form>
               </div>
            </div>
         </div>
        
      </div>
   </div>

   <!-- Hero Image Ends here -->
   
   
  
  
   
   <!-- Footer section starts here -->
   <div class="section-padding-none">
      <footer>
        
         <div class="container-fluid copyright">
            <div class="container">
               <div class="row">
                  <div class="col-xl-9 col-lg-9 col-md-6">
                     <p>Copyright © 2023. All rights reserved by MKJC-BCA.</p>
                  </div>
                  
                  <div class="col-xl-3 col-lg-3 col-md-6">
                     <div class="copyright-social">
                        <ul>
                           <li><a href="#"><img src="images/icon_fb.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="images/icon_tw.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="images/icon_li.png" class="img-fluid" alt=""></a></li>
                           <li><a href="#"><img src="images/icon_yt.png" class="img-fluid" alt=""></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
   </div>
   <!-- Footer section ends here -->
   
   <!-- Bootstrap JavaScript -->
   
   <!-- jQuery library -->
   <script src="js/bootstrap/jquery.min.js"></script>
   
   <!-- Popper JS -->
   <script src="js/bootstrap/popper.min.js"></script>
   
   <!-- Latest compiled JavaScript -->
   <script src="js/bootstrap/bootstrap.min.js"></script>
   
   <!-- Jequery -->
   <script src="js/aos/jquery-3.4.1.html"></script>
   
   <!-- owl-carousel java script -->
   <script src="js/owl-carousel/owl.carousel.js"></script>
   
   <!-- Swiper JS -->
   <script src="js/swiper/swiper.min.js"></script>

   <!-- Plugins JavaScripts -->
   <script src="js/plugins/plugins.js"></script>
</body>


<!-- Mirrored from www.designovative.com/vetiv/light_grey/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:37:40 GMT -->
</html>