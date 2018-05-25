<!DOCTYPE html>
<html lang="en">


<?php
    include_once("includes/db.php");
    include_once("includes/header.php");
?>


<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<div id="preloader">
  <div id="status"> <img src="img/preloader.gif" height="64" width="64" alt=""> </div>
</div>



<?php
/*  if($connection){
        echo "CONNECTION SUCCESS";
    }*/
?>

<?php        
    include_once("includes/navigation.php");
?>


<!--IMAGE AND BUTTON-->
<div id="intro">
  <div class="intro-body">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1><span class="brand-heading">Blood Bank Management</span></h1>
          <p class="intro-text">A drop of blood could save a life</p>
          <a href="register.php" class="btn btn-default page-scroll">Register Here</a>
          <a href="login.php" class="btn btn-default page-scroll">Login Here</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/IMAGE AND BUTTON-->





<?php
    include_once("includes/team.php");
?>


<?php
    include_once("includes/count.php");
?>





<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title center">
      <h2>Contact Us</h2>
      <hr>
      <p>For any queries contact here</p>
    </div>
    
     <div class="col-md-8 col-md-offset-2">
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-map-marker fa-2x"></i>
          <p>4321 Bazaar<br>
            Mulund, Mumbai-420290</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-envelope-o fa-2x"></i>
          <p>info@company.com</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact-item"> <i class="fa fa-phone fa-2x"></i>
          <p> +91123456789<br>
            +91123456789</p>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
    

   
   
    <!--CONTACT US SECTION--> 
    <div class="col-md-8 col-md-offset-2">
      <h3>Leave us a message</h3>
      
        <?php
            include_once("contact-us.php");
        ?>
      
      
      <div class="social">
        <h3>Follow us</h3>
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
          <li><a href="#"><i class="fa fa-github"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>


<?php 

    include_once("includes/footer.php");
?>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jquery.parallax.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<!--<script type="text/javascript" src="js/contact_me.js"></script> -->
<script type="text/javascript" src="vendor/waypoints-34d9f6d/lib/jquery.waypoints.min.js"></script> 
<script type="text/javascript" src="vendor/waypoints-34d9f6d/src/waypoint.js"></script> 
<script type="text/javascript" src="vendor/Counting-Up-To-Numerical-Values-On-Scroll-jQuery-Countup-js/jquery.countup.js"></script> 
<script type="text/javascript" src="vendor/Counting-Up-To-Numerical-Values-On-Scroll-jQuery-Countup-js/jquery.countup.min.js"></script> 



<!-- Javascripts
    ================================================== --> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>