<!DOCTYPE html>
<?php
    ob_start();
?>

<html lang="en">

<!--HEADER-->
<?php
    $page = "find-donors";
    include_once("../includes/db.php");
    include_once("includes/header.php");
    include_once("functions.php");
    $username = checkUser();

?>
<!--END OF HEADER-->
<body>
   <?php
        if($connection)
        echo "hello";
    ?>
    <div id="wrapper">
        <!-- Navigation -->
            <?php 
                include_once("includes/navigation.php");
            ?>
        <!-- /.navbar-collapse -->

        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            BLOOD BANK
                            <small>JV</small>
                          </h1>  
                            <?php
                                include_once("includes/find-donors/find-by-city.php");
                            ?>

                            <?php
                                include_once("includes/find-donors/find-by-blood-type.php");
                            ?>
                            <?php
                                    /********************************************************************************
                                    FOR CITY IT WILL SHOW TABLE OF CITY ELSE FOR BLOOD TYPE IT WILL SHOW FOR BLOOD TYPE
                                    ********************************************************************************/
                                    
                                    $text_search_city = findDonorCity();
                                    $text_blood_type = findDonorBloodType();
                        
                                    if(isset($text_search_city)){ 
                                            
                                        include_once("includes/find-donors/view-search-results-city.php");
                                        
                                    }elseif(isset($text_blood_type)){

                                        include_once("includes/find-donors/view-search-results-blood.php");
                                        
                                    }
                            ?>  
                        
                        
                    </div>
                
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>