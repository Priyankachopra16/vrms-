<?php
session_start();
include('includes/config1.php');
include'config.php';
error_reporting(0);
$_SESSION['vhid']=$_REQUEST['vhid'];

   
if(isset($_POST['submit']))
{
$vidd=$_POST['vecid'];
 
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate']; 
$message=$_POST['message'];
$useremail=$_SESSION['login'];
$status=0;
$vhid=$_POST['vecid'];
$bookingno=mt_rand(100000000, 999999999);
    //echo"id is".$bookingno;exit;
$ret="SELECT * FROM tblbooking where (:fromdate BETWEEN date(FromDate) and date(ToDate) || :todate BETWEEN date(FromDate) and date(ToDate) || date(FromDate) BETWEEN :fromdate and :todate) and VehicleId=:vhid";
$query1 = $dbh -> prepare($ret);
$query1->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query1->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query1->bindParam(':todate',$todate,PDO::PARAM_STR);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);

if($query1->rowCount()==0)
{

$sql="INSERT INTO  tblbooking(BookingNumber,userEmail,VehicleId,FromDate,ToDate,message,Status) VALUES(:bookingno,:useremail,:vhid,:fromdate,:todate,:message,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':bookingno',$bookingno,PDO::PARAM_STR);
$query->bindParam(':useremail',$useremail,PDO::PARAM_STR);
$query->bindParam(':vhid',$vhid,PDO::PARAM_STR);
$query->bindParam(':fromdate',$fromdate,PDO::PARAM_STR);
$query->bindParam(':todate',$todate,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Booking successfull.');</script>";
echo "<script type='text/javascript'> document.location = 'my-booking.php'; </script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
 echo "<script type='text/javascript'> document.location = 'car-listing.php'; </script>";
} }  else{
 echo "<script>alert('Car already booked for these days');</script>"; 
 echo "<script type='text/javascript'> document.location = 'car.php '; </script>";
}

}

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
 <?php //include('includes/header.php');?>
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
   
         <!---->
   
         <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12">
               <div class="insure-form">
                  <h5>Vehicle Booking details</h5>
                  <form method="POST" action="form.php">
                      
                   
                     <h6>Personal Info</h6>
                         <?php //$uname=$_REQUEST['uname'];
//$pwd=md5($_REQUEST['pwd']);
                      $email=$_SESSION['login'];
$vid=$_REQUEST['vhid'];
//echo"vechicle id is";exit;
$query="select * from $dbname.tblusers where EmailId ='$email' ";
$result=mysqli_query($conn,$query);

  
$row=mysqli_fetch_array($result); 
                      
              $mobile=$row['ContactNo'];
               $name=$row['FullName'];
                      
             
                      
                      ?>
                      
                     <div class="form-group">
                        <input type="text" class="form-control" id="formGroupExampleInput1" value="<?php echo $name;  ?>" placeholder="Vehicle owner's name">
                     </div>
                     
                     <div class="form-group">
                        <input type="text" class="form-control" 
                               value="<?php echo  $mobile; ?>" id="formGroupExampleInput2" placeholder="Mobile number">
                     </div>

                     <h6>Vechicle Info</h6>
                      <?php 
                      $vid=$_REQUEST['vhid'];
//echo"vechicle id is";exit;
$query1="select * from $dbname.tblvehicles where id ='$vid' ";
$result1=mysqli_query($conn,$query1);

  
$row1=mysqli_fetch_array($result1); 
                      
                   $vname=$row1['VehiclesTitle'];
                      $model=$row1['ModelYear'];
                       $_SESSION['vhid']=$row1['id'];
                      ?><input type="text" class="form-control" 
                               value="<?php echo $row1['id']; ?>" id="formGroupExampleInput2"name="vecid" placeholder="Mobile number" hidden>
                        <div class="form-group">
                        <input type="text" class="form-control" 
                                value="<?php echo $vname; ?>" id="formGroupExampleInput2" placeholder="Mobile number">
                     </div>
                        <div class="form-group">
                        <input type="text" class="form-control" 
                               value="<?php echo  $model; ?>" id="formGroupExampleInput2" placeholder="Mobile number">
                     </div>
                    
                    
                     <!--<div class="form-group form-row">
                        <div class="col-lg-7">
                           <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect2">
                              <option selected>Car model</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                        </div>
   
                        <div class="col-lg-5">
                           <select class="form-control custom-select mr-sm-2" id="inlineFormCustomSelect3">
                              <option selected>Fuel Type</option>
                              <option value="1">One</option>
                              <option value="2">Two</option>
                              <option value="3">Three</option>
                           </select>
                        </div>
   
                     </div>
   -->
                     <div class="form-group form-row">
                         <div class="col-lg-6">
                             <h6>From Date:</h6>
                       <!--<label for="" class="control-label">From Date </label>-->
				<input type="date" class="form-control" name="fromdate"  value="<?php echo isset($date_in) ? date("Y-m-d",strtotime($date_in)) :'' ?>" required>
                         </div>
                         <div class="col-lg-6">
                             <h6>To Date:</h6>
                       <!--<label for="" class="control-label">From Date </label>-->
				<input type="date" class="form-control" name="todate"  value="<?php echo isset($date_in) ? date("Y-m-d",strtotime($date_in)) :'' ?>" required>
                         </div>
                      
                    </div>
                      
                      <div class="form-group">
                           <label for="" class="control-label">Pick-up Time</label>
                          <input type="time" class="form-control" id="formGroupExampleInput2" placeholder="Enter place for pickup"></div>
                      
                       <div class="form-group">
                           <label for="" class="control-label">Pick Up Area</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter place for pickup"></div>
                      <div class="form-group">
                           <label for="" class="control-label">Travel To </label>
                        <input type="text" class="form-control" id="formGroupExampleInput3" placeholder="Enter to place"></div>
                      
                     
                     <div class="form-group">
                        <label class="col-form-label">Vehicle for:</label>
                        <div class="form-check-inline">
                           <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios1"
                              value="option1" checked>
                           <label class="form-check-label" for="exampleRadios1">
                              Commercial use
                           </label>
                        </div>
                        <div class="form-check-inline">
                           <input class="form-check-input" type="radio" name="exampleRadios1" id="exampleRadios2"
                              value="option2">
                           <label class="form-check-label" for="exampleRadios2">
                              Personal use
                           </label>
                        </div>
                     </div>
                     
                     
   
                     <button type="button" class="btn btn-ter-round mt-4">Reset</button>
                     <button type="submit" class="btn btn-prim-round mt-4" name="submit">Proceed</button><!--  <button type="button" class="btn btn-prim-round mt-4" onclick="window.location.href='form_buy.html';">Proceed</button>-->
                  </form>
               </div>
   
            </div>

            <div class="col-lg-5 col-md-5 col-sm-12 offset-md-1 offset-lg-2">
               <div class="plan">
               <ul>
                  <li>
                     <input class="form-check-input" type="radio" name="exampleRadios69" id="exampleRadios69"
                     value="option10" checked>
                     <h5>₹ 599 <span>/ for 2 days</span></h5>
                     <p><strong>With Special Offer!</strong>  </p>
                  </li>
                  
                  <li>
                     <input class="form-check-input" type="radio" name="exampleRadios79" id="exampleRadios79"
                     value="option11">
                     <h5>₹ 1,999 <span>/ for 5 days</span></h5>
                     <p><strong>With Special Offer!</strong> </p>
                  </li>
                  
                  <li>
                     <input class="form-check-input" type="radio" name="exampleRadios89" id="exampleRadios89"
                     value="option12">
                     <h5>₹ 3,999 <span>/for 8 days</span></h5>
                     <p><strong>With Special Offer!</strong>  </p>
                  </li>

               </ul>
               </div>
               
               <br><br><br><br><br>

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


<!-- Mirrored from www.designovative.com/vetiv/light_grey/form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Feb 2023 14:40:16 GMT -->
</html>