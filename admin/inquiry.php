
<!DOCTYPE html>
<?php
    ob_start();             //this should be the first line n it clears the buffer wen it crosses 4096 or it has sent the page 
?>

<html lang="en">

<?php
    $page ="inquiry";
    include_once("includes/header.php");
    include_once("functions.php");
     $username = checkUser();
?>
   
   
    <body>
    
<?php
    if($connection)
        echo "TESTING CONNECTION";
?>
            <div id="wrapper">
                <!--NAVIGATION-->
            <?php
                include_once("includes/navigation.php");
            ?>
                <!--END OF NAVIGATION-->
                    <div id="page-wrapper">

                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header">
                                        Inquiry
                                    </h1>
                                    
                                    <form action="" method="POST" role="form">

                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" id="" placeholder="Enter your Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" class="form-control" id="" placeholder="Enter your Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contact Number</label>
                                            <input type="number" class="form-control" id="" placeholder="Enter your Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Message</label>
                                        <textarea name="" id="" cols="100" rows="10" class="form-control"></textarea>
                                        </div>



                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
   
                                </div>
                            </div>
                            <!-- /.row -->

                        </div>
                        <!-- /.container-fluid -->

                    </div>
                    <!-- /#page-wrapper -->

            </div>
            <!-- /#wrapper -->

            
            
            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>
        
            <!--BOOTSTRAP VALIDATOR-->
            <script src="js/bootstrapValidator.min.js"></script>

            <!--CUSTOM SCRIPT BY JV-->
            <script src="js/scripts.js"></script>

    </body>
</html>
