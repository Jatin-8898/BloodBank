<!DOCTYPE html>
<html lang="en">

<!--HEADER-->
<?php
    $page = "";
    include_once("../includes/db.php");
    include_once("includes/header.php");
    include_once("functions.php");
    $username = checkUser();
?>
<!--END OF HEADER-->
<body>
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
                            <small><?php echo $username;?></small>
                        </h1>
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
    
    
    <!--CUSTOM SCRIPT-->
    <script src="js/scripts.js"></script>    

</body>
</html>












