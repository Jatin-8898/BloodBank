<!DOCTYPE html>
<?php
    ob_start();
?>

<html lang="en">

<!--HEADER-->
<?php
    $page = "blood-groups";
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
                                include_once("includes/blood-groups/add-blood-group.php");
                            ?>

                            <?php
                                include_once("includes/blood-groups/edit-blood-group.php");
                            ?>

                            <?php
                                include_once("includes/blood-groups/view-blood-groups.php");
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