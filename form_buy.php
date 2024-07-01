<?php 
session_start();
include('includes/config1.php');
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from www.designovative.com/vetiv/light_grey/form_buy.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:40:16 GMT -->
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
   
   

   <!-- Form section start here -->
   <div class="section-larger">
      <div class="container">
   
         <!--<div class="insure-text bg-color">
            <div class="row vertical-cntr">
               <div class="col-lg-7 col-md-6 col-sm-12">
                  <h5 class="highlight p-0"><strong class="text-yellow">Standard Plan</strong></h5>
                  <h6>with great offers and do eiusmod</h6>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
               </div>
               
               <div class="col-lg-5 col-md-6 col-sm-12">
                  <div class="plan-selected">
                     <ul>
                         <li>
                             <input class="form-check-input" type="radio" name="exampleRadios10" id="exampleRadios10"
                             value="option10" checked>
                             <h5>₹ 2,999 <span>/ 1 Year</span></h5>
                             <p><strong>Included:</strong> Accident | Theft | Fire </p>
                         </li>
                     </ul>
                     
                 </div>
               </div>
            </div>
         </div>-->
   
         <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
               <div class="insure-form">
                  <h5>Verify your details</h5>
                  <form>
                     <ul class="car-info">
                         <li><p>Ankush Rao</p></li>
                         <li><p>+91 654 254 8745</p></li>
                         <li><p>MH12 TN6687</p></li>
                         <li><p>Delhi - 466 789</p></li>
                         <li><p>Range Rover Velar - Petrol</p></li>
                         <li><p>Purchased on 10th June 2010</p></li>
                         <li><p>Personal use </p></li>
                         <li><p>Policy not Expired</p></li>
                     </ul>
                     <button type="button" class="btn btn-ter-round mt-4">Edit</button>
                     <button type="Submit" class="btn btn-prim-round mt-lg-4 mt-md-3 mt-sm-3 bg-color-pink">Book Now</button>
                  </form>
               </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 offset-md-2 offset-lg-2">
                
                
                <div class="offers">
            
                    <h6 class="heading">Included offers</h6>
            
                    <ul>
                        <li>
                            <div class="list-icon">
                                <span class="flaticon-car-insurance-2"></span>
                            </div>
                            <div class="offer-text">
                                <h6>Saved ₹ 700/-</h6>
                                <p>This is 10% discount</p>
                            </div>
                            <a href="#">Remove</a>
                        </li>
            
                        <li>
                            <div class="list-icon">
                                <span class="flaticon-car-insurance-2"></span>
                            </div>
                            <div class="offer-text">
                                <h6>1 Year free servicing</h6>
                                <p>This is 10% discount</p>
                            </div>
                            <a href="#">Remove</a>
                        </li>
            
                    </ul>
                </div>
               <div class="offers">
               
                  <h6 class="heading">Additional Covers</h6>
               
                  <ul>
                     <li>
                        <div class="list-icon">
                           <span class="flaticon-car-insurance-2"></span>
                        </div>
                        <div class="offer-text">
                           <h6>Consumables</h6>
                           <p>You should go with this plan</p>
                        </div>
                        <a href="#"> @ ₹20</a>
                     </li>
               
                     <li>
                        <div class="list-icon">
                           <span class="flaticon-car-insurance-2"></span>
                        </div>
                        <div class="offer-text">
                           <h6>Personal Accident</h6>
                           <p>We are always ready to help you</p>
                        </div>
                        <a href="#"> @ ₹10</a>
                     </li>
               
                  </ul>
               </div>
            
               <div class="send-quotes bg-color-2">
                  <h6>Send me the quote</h6>
                  <p>We will remind you before your current policy expire.</p>
                  <div class="quote-text">
                     <ul>
                        <li>
                        <a href="#">
                           <span class="flaticon-email"></span>
                           <p>Email</p>
                        </a>
                        </li>
                        <li>
                           <a href="#">
                              <span class="flaticon-mobile-phone"></span>
                              <p>SMS</p>
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <span class="flaticon-whatsapp"></span>
                              <p>WhatsApp</p>
                           </a>
                        </li>
                  </ul>
                  </div>
               </div>
            
            </div>

         </div>
      </div>
   </div>
   <!-- Form section Ends here -->
    

  <!-- Footer section starts here -->
  <div class="section-padding-none">
   <footer>
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
               <h5>Company</h5>
               <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Board Of Directors</a></li>
                  <li><a href="#">Articles</a></li>
                  <li><a href="#">Insurance</a></li>
                  <li><a href="#">Claims</a></li>
                  <li><a href="#">Careers</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
               <h5>General</h5>
               <ul>
                  <li><a href="#">Insurance Sector In Country</a></li>
                  <li><a href="#">Types Of Insurance</a></li>
                  <li><a href="#">Motor Vehicles Act 2020</a></li>
                  <li><a href="#">Vehicle Registration</a></li>
                  <li><a href="#">About Your Vehicle Number</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
               <h5>Insurance</h5>
               <ul>
                  <li><a href="#">Car Insurance</a></li>
                  <li><a href="#">Bike Insurance</a></li>
                  <li><a href="#">Car Insurance Claim</a></li>
                  <li><a href="#">Bike Insurance Claim</a></li>
                  <li><a href="#">Add-on Covers</a></li>
                  <li><a href="#">Car Insurance Comparison</a></li>
               </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 footer-sec">
               <h5>Vehicle Rental Management System</h5>
               
               <p></p>
            </div>
         </div>
      </div>
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


<!-- Mirrored from www.designovative.com/vetiv/light_grey/form_buy.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:40:16 GMT -->
</html>