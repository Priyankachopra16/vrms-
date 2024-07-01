<?php 
session_start();
include('includes/config1.php');
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="zxx">



<head><style>  
    
    .img-container .img-sm{
        
        width: 100%;
        height: 200%;
        
    }
    </style>
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
   <div class="hero-image-small hero-small-bike">
      <div class="container">
         <div class="hero-text-inner">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 m-auto text-center">
                  <h3><span class="sub-heading-1">Get Instantly</span>Scooty Rentals</h3>
               </div>
            </div>
         </div>
      </div>
   </div>
 <!-- Hero Image Ends here -->

   <!-- Client section Starts here -->
   <section class="page-header profile_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>My Booking</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>My Booking</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from tblusers where EmailId=:useremail ";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">
    <div class="user_profile_info gray-bg padding_4x4_40">
      <div class="upload_user_logo"> <img src="assets/images/dealer-logo.jpg" alt="image">
      </div>

      <div class="dealer_info">
        <h5><?php echo htmlentities($result->FullName);?></h5>
        <p><?php echo htmlentities($result->Address);?><br>
          <?php echo htmlentities($result->City);?>&nbsp;<?php echo htmlentities($result->Country); }}?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-8 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Booikngs </h5>
          <div class="my_vehicles_list">
            <ul class="vehicle_listing">
<?php 
$useremail=$_SESSION['login'];
 $sql = "SELECT tblvehicles.Vimage1 as Vimage1,tblvehicles.VehiclesTitle,tblvehicles.id as vid,tblbrands.BrandName,tblbooking.FromDate,tblbooking.ToDate,tblbooking.message,tblbooking.Status,tblvehicles.PricePerDay,DATEDIFF(tblbooking.ToDate,tblbooking.FromDate) as totaldays,tblbooking.BookingNumber  from tblbooking join tblvehicles on tblbooking.VehicleId=tblvehicles.id join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblbooking.userEmail=:useremail order by tblbooking.id desc";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

<li>
    <h4 style="color:red">Booking No #<?php echo htmlentities($result->BookingNumber);?></h4>
                <div class="vehicle_img"> <a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"><img src="admin/img/vehicleimages/<?php echo htmlentities($result->Vimage1);?>" alt="image"></a> </div>
                <div class="vehicle_title">

                  <h6><a href="vehical-details.php?vhid=<?php echo htmlentities($result->vid);?>"> <?php echo htmlentities($result->BrandName);?> , <?php echo htmlentities($result->VehiclesTitle);?></a></h6>
                  <p><b>From </b> <?php echo htmlentities($result->FromDate);?> <b>To </b> <?php echo htmlentities($result->ToDate);?></p>
                  <div style="float: left"><p><b>Message:</b> <?php echo htmlentities($result->message);?> </p></div>
                </div>
                <?php if($result->Status==1)
                { ?>
                <div class="vehicle_status"> <a href="#" class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>

              <?php } else if($result->Status==2) { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <div class="vehicle_status"> <a href="#" class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?>
       
              </li>

<h5 style="color:blue">Invoice</h5>
<table>
  <tr>
    <th>Car Name</th>
    <th>From Date</th>
    <th>To Date</th>
    <th>Total Days</th>
    <th>Rent / Day</th>
  </tr>
  <tr>
    <td><?php echo htmlentities($result->VehiclesTitle);?>, <?php echo htmlentities($result->BrandName);?></td>
     <td><?php echo htmlentities($result->FromDate);?></td>
      <td> <?php echo htmlentities($result->ToDate);?></td>
       <td><?php echo htmlentities($tds=$result->totaldays);?></td>
        <td> <?php echo htmlentities($ppd=$result->PricePerDay);?></td>
  </tr>
  <tr>
    <th colspan="4" style="text-align:center;"> Grand Total</th>
    <th><?php echo htmlentities($tds*$ppd);?></th>
  </tr>
</table>
<hr />
              <?php }}  else { ?>
                <h5 align="center" style="color:red">No booking yet</h5>
              <?php } ?>
             
         
            </ul>
          </div>
        </div>
      </div>
    </div>
      </div></div>
</section>
<!-- Package price Ends here -->

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
   <!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>
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


<!-- Mirrored from www.designovative.com/vetiv/light_grey/bike.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:39:56 GMT -->
</html>