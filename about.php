<?php 
session_start();
include('includes/config1.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="zxx">



<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Vetiv - Insurance Agency HTML Template</title>
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

    <!-- magnific popup css -->
    <link rel="stylesheet" href="css/magnific/magnific-popup.css" type="text/css">

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
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="car.php">Car</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="bike.php">Bike</a>
                </li>
                <li class="nav-item active">
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
               <button class="btn-link my-2 my-sm-0 ml-15" type="submit">Login</button>
            </form><?php }?>
        </div>
         
      </div>
      </div>
    
   </nav>
  <!-- Nav Bar Ends here -->
   <!-- Hero Image Starts here -->
   <div class="hero-image-small hero-small-about">
      <div class="container">
         <div class="hero-text-inner">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 m-auto text-center">
                  <h3><span class="sub-heading-1">Few words</span>About Us</h3>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
 <!-- Hero Image Ends here -->
   

<!-- Intro Starts here -->
    <div class="section-larger">
        <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                
                <div class="highlight-top">
                    <h5>TRY RIDE VEHICLE</h5>
                    <h3>RENTALS</h3>
                </div>
                
            </div>
            
            <div class="col-lg-7 col-md-7 col-sm-12">
                   <p>Our Aim is to design and create a data management System for a vehicle rental company. This enables admin can rent a vehicle that can be used by a customer. By paying the money for a specified period of time. This system increases customer retention and simplify vehicle and staff Management in an efficient way. This software, Supercar Rental System has a very user friendly interface. Thus the users will feel very easy to work on it. By using this system admin can manage their rental,Bookings, customer issues and vehicle issues etc…. The car and bike </p>
                
                
                <p>The car and bike information can be added to the system. or existing  car and bike information can be edited or deleted too by the  Administrator. The transaction reports of the vehicle rental system can be retrieved by the admin,when its required. Thus, there is no delay in the availability of any vehicle information, whenever needed the vehicle information can be Captured very quickly and easily. The customers can also use the system to rent a bike or car. The customer should create a new account before logging in or he/she can log into the system with his/her created account.                                      </p>
            </div>

        </div>
        </div>
    </div>


   <!-- Footer section starts here -->
   <div class="section-padding-none">
      <footer>
         
         <div class="container-fluid copyright">
            <div class="container">
               <div class="row">
                  <div class="col-xl-9 col-lg-9 col-md-6">
                     <p>Copyright © 2021. All rights reserved by Company.</p>
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

   <!-- Magnific popup -->
   <script src="js/magnific/jquery.js"></script>
   <script src="js/magnific/jquery.magnific-popup.js"></script>
   <script src="js/magnific/magnific-popup.js"></script>
   
   
</body>


<!-- Mirrored from www.designovative.com/vetiv/light_grey/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:39:20 GMT -->
</html>