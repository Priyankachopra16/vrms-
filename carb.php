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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


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
   <!-- Hero Image Starts here -->
   <div class="hero-image-small hero-small-car">
      <div class="container">
         <div class="hero-text-inner">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 m-auto text-center">
                  <h3><span class="sub-heading-1">Try Riders</span> Car Rentals</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
 <!-- Hero Image Ends here -->
   

<!-- Intro Starts here -->
    <div class="section-first">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 text-container-left">
                
                    <div class="container-text">
                    <h2>Hyundai<br>santro astra star dust</h2>
                    <p>Engine(upto) -> 1086cc <br> Fuel type -> petrol <br>Fuel tank Capacity ->35l <br> Mileage(upto) -> 20.3kmpl <br>Colour -> HatchBlack</p>
                        <h4>Price charge</h4>
                        <p>/per hour -> 194rs</p>
                        <p>/per day ->4656 </p>
                        <button style="background-color:maroon;color: whitesmoke;border-color:darkgrey"   type="submit">Book Now</button>
                        <p style="color:green">&lt;Available&gt;</p>
                        <p style="color: red">&lt;Unavailable&gt;</p>
                    
                    </div>
                
            </div>
            
            <div class="col-lg-5 col-md-5 col-sm-12">
               <div class="img-container">
                   <img src="hyundai.png" class="img-fluid" alt=""> 
                   <i style="color: black;border-color: black;"class="fa-solid fa-cart-shopping"></i> 
                   <i class="fa-solid fa-heart"></i>
                   <i class="fa-sharp fa-solid fa-share-nodes"></i><br><br>
                   <h3> Ratings </h3> <br>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star-half"></i>
               </div> 
            </div>
        </div>
        </div>
    </div>
    
    <div class="section-first">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 text-container-left">
                
                    <div class="container-text">
                    <h2>Mahindra<br>Xylo</h2>
                    <p>Engine(upto) -> 2179cc-2489cc <br> Fuel type -> diesel<br>Fuel tank Capacity ->55l <br> Mileage(upto) -> 11.4kmpl <br>Colour ->DiamondWhite</p>
                        <h4>Price charge</h4>
                        <p>/per hour -> 200rs</p>
                        <p>/per day ->4800</p>
                        <button style="background-color:maroon;color: whitesmoke;border-color:darkgrey"   type="submit">Book Now</button>
                        <p style="color:green">&lt;Available&gt;</p>
                        <p style="color: red">&lt;Unavailable&gt;</p>
                    
                    </div>
                
            </div>
            
            <div class="col-lg-5 col-md-5 col-sm-12">
               <div class="img-container">
                   <img src="Mahindra.jpg"alt=""> 
                   <i style="color: black;border-color: black;"class="fa-solid fa-cart-shopping"></i> 
                   <i class="fa-solid fa-heart"></i>
                   <i class="fa-sharp fa-solid fa-share-nodes"></i><br><br>
                   <h3> Ratings </h3> <br>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star-half"></i>
               </div> 
            </div>
        </div>
        </div>
    </div>
    
    <div class="section-first">
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 text-container-left">
                
                    <div class="container-text">
                    <h2>Hyundai<br>santro astra star dust</h2>
                    <p>Engine(upto) -> 1199cc <br> Fuel type -> petrol <br>Fuel tank Capacity ->37l <br> Mileage(upto) -> 18.97kmpl <br>Colour ->FoliageGreen</p>
                        <h4>Price charge</h4>
                        <p>/per hour -> 150rs</p>
                        <p>/per day ->3600 </p>
                        <button style="background-color:maroon;color: whitesmoke;border-color:darkgrey"   type="submit">Book Now</button>
                        <p style="color:green">&lt;Available&gt;</p>
                        <p style="color: red">&lt;Unavailable&gt;</p>
                    
                    </div>
                
            </div>
            
            <div class="col-lg-5 col-md-5 col-sm-12">
               <div class="img-container">
                   <img src="tata.jpg" class="img-fluid" alt=""> 
                   <i style="color: black;border-color: black;"class="fa-solid fa-cart-shopping"></i> 
                   <i class="fa-solid fa-heart"></i>
                   <i class="fa-sharp fa-solid fa-share-nodes"></i><br><br>
                   <h3> Ratings </h3> <br>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star"></i>
                   <i class="fa-solid fa-star-half"></i>
               </div> 
            </div>
        </div>
        </div>
    <
<!-- Intro Ends here -->
  

   <!-- Client section Starts here -->
   <div class="section">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 m-auto">
               <div class="title-center">
                  <span class="sub-heading-1">Buy/Renew</span>
                  <h2>Insurance Online</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti numquam sit eligendi veritatis debitis illo consequuntur tenetur distinctio, totam modi!</p>
                </div>
            </div>
            <div class="col-lg-8 m-auto">
                <div class="title-center">
                    <h4><strong>How our car insurance works?</strong></h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ex maiores natus voluptas temporibus mollitia.</p>
               </div>
            </div>
         </div>
         
         <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 steps">
                
                    <div class="img-container-step">
                        <img src="images/about_step_1.png" class="img-fluid" alt="">
                    </div>
                    <div class="step-head vertical-cntr">
                        <div class="step-count"><h1>1</h1></div>
                        <h6>Start with entering your car number or selecting your car.</h6>
                    </div>
                    <div class="step-text">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore adipisci nihil, eos quia itaque necessitatibus voluptatum cupiditate magnam molestiae. Voluptatibus?</p>
                    </div>
                
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 steps">
                
                    <div class="img-container-step">
                        <img src="images/about_step_2.png" class="img-fluid" alt="">
                    </div>
                    <div class="step-head vertical-cntr">
                        <div class="step-count"><h1>2</h1></div>
                        <h6>Just answer a few simple questions about your car.</h6>
                    </div>
                    <div class="step-text">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore adipisci nihil, eos quia itaque necessitatibus voluptatum cupiditate magnam molestiae. Voluptatibus?</p>
                    </div>
                
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 steps">
                
                    <div class="img-container-step">
                        <img src="images/about_step_3.png" class="img-fluid" alt="">
                    </div>
                    <div class="step-head vertical-cntr">
                        <div class="step-count"><h1>3</h1></div>
                        <h6>Amazing online car insurance plans & prices tailor-made for you.</h6>
                    </div>
                    <div class="step-text">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore adipisci nihil, eos quia itaque necessitatibus voluptatum cupiditate magnam molestiae. Voluptatibus?</p>
                    </div>
                
            </div>
            
            <div class="col-lg-6 col-md-6 col-sm-12 steps">
                
                    <div class="img-container-step">
                        <img src="images/about_step_4.png" class="img-fluid" alt="">
                    </div>
                    <div class="step-head vertical-cntr">
                        <div class="step-count"><h1>4</h1></div>
                        <h6>Choose a price, make payment & the policy will be in your inbox in seconds.</h6>
                    </div>
                    <div class="step-text">
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Inventore adipisci nihil, eos quia itaque necessitatibus voluptatum cupiditate magnam molestiae. Voluptatibus?</p>
                    </div>
                
            </div>
            

         </div>

      </div>
   </div>
   <!-- Client section Ends here -->
   
   <!-- Full width Starts here -->

   <div class="section-larger bg-color-10">
      <div class="container-fluid">
         <div class="row">
            
            <div class="col-lg-4 col-md-12 col-sm-12">
               <div class="img-container">
                  <img src="images/home_img_1.png" class="img-fluid" alt="">
               </div>
               <div class="text-container">
                  <h2><span class="sub-heading-1">6 Factors Affect</span>Insurance Cost</h2>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, fugit laudantium? Ad quibusdam blanditiis quas aspernatur.</p>
               </div>
            </div>
           <div class="col-lg-8 col-md-12 col-sm-12 factors">
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="point-list">
                        <ul>
                           <li>
                              <div class="list-icon">
                                 <span class="flaticon-credit"></span>
                              </div>
                              <div class="list-text">                              
                                 <h6>Value of your Car</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                           <li>
                              <div class="list-icon">
                                 <span class="flaticon-car-insurance-2"></span>
                              </div>
                              <div class="list-text">
                                 <h6>Type of Car Insurance</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                           <li class="last">
                              <div class="list-icon">
                                 <span class="flaticon-document"></span>
                              </div>
                              <div class="list-text">
                                 <h6>Coverage</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>

                  <div class="col-lg-6 col-md-6 col-sm-12">
                     <div class="point-list">
                        <ul>
                           <li>
                              <div class="list-icon">
                                 <span class="flaticon-credit"></span>
                              </div>
                              <div class="list-text">                              
                                 <h6>Car’s Age</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                           <li>
                              <div class="list-icon">
                                 <span class="flaticon-car-insurance-2"></span>
                              </div>
                              <div class="list-text">
                                 <h6>Extra Features</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                           <li>
                              <div class="list-icon">
                                 <span class="flaticon-document"></span>
                              </div>
                              <div class="list-text">
                                 <h6>Your Claim History</h6>
                                 <p>Get the best price, every single time. for your Car and Bike</p>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
           </div>
         </div>
      </div>
   </div>

<!-- Full width Ends here -->


<!-- Package price Start here -->
   <div class="section-larger">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 m-auto">
               <div class="title-center">
                  <span class="sub-heading-1">Three Atractive</span>
                  <h2>Insurance Packages</h2>
               </div>
            </div>
         </div>
         <div class="row">
             
         <div class="col-lg-4 col-md-6 col-sm-12">
             <form action="index.php" method="post">
            <div class="package">
               <h5>Hyundai</h5>
               <div class="package-list">
                   
                    <div class="img-container">
                   <img src="hyundai.png" class="img-sm" alt="">
               </div> <br>
                   <input type="text" value="" name="Hyundai" hidden><input type="text" name="5000" hidden>
                 <div class="duration"><h4>Rs.5000 <span>/Perday</span></h4></div>
                  <ul>
                     <li class="active">Hyundai 120CC </li>
                     <li class="active">Engine- 1997 cc - 1999 cc</li>
                     <li>BHP-153.81 - 183.72 Bhp
</li>
                     <li>Seating Capacity-5</li>
                     <li>Diesel/Petrol </li>
                  </ul>
               </div>
               <button type="Submit" name="5000" class="btn btn-prim mt-lg-4 mt-md-3 mt-sm-3">Book Now</button>
            </div></form>
         </div>
         
         <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="package">
               <h5>Mahindra</h5>
               <div class="package-list">
                   
                    <div class="img-container">
                   <img src="Mahindra.jpg" class="img-sm" alt="">
               </div> <br>
                
                   
                   
                   
                   
                  <div class="duration"><h4>Rs.4000 <span>yearly</span></h4></div>
                  <ul>
                     <li class="active"> </li>
                     <li class="active"> </li>
                     <li class="active"> </li>
                     <li>  </li>
                     <li> </li>
                  </ul>
               </div>
               <button type="Submit" class="btn btn-prim mt-lg-4 mt-md-3 mt-sm-3">Book Now</button>
            </div>
         </div>
         
         <div class="col-lg-4 col-md-6 col-sm-12 no-of-package">
            <div class="package">
               <h5>Tata</h5>
               <div class="package-list">
                   
                    <div class="img-container">
                   <img src="tata.jpg" class="img-sm" alt="">
               </div> <br>
                
                   
                   
                   
                   
                   
                  <div class="duration"><h4>Rs.3000 <span>yearly</span></h4></div>
                  <ul>
                     <li class="active"> </li>
                     <li class="active"> </li>
                     <li class="active"> </li>
                     <li class="active">  </li>
                     <li class="active"></li>
                  </ul>
               </div>
               <button type="Submit" class="btn btn-prim mt-lg-4 mt-md-3 mt-sm-3">Book Now</button>
            </div>
         </div>
      </div>
         
      </div>
   </div>
<!-- Package price Ends here -->

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


<!-- Mirrored from www.designovative.com/vetiv/light_grey/car.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:39:37 GMT -->
</html>