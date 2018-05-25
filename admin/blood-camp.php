<!DOCTYPE html>
<?php
    ob_start();
?>

    <html lang="en">

    <!--HEADER-->
    <?php
    $page = "blood-camp";
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

                               
                                <h1 class="page-header">
                                    BLOOD BANK
                                    <small>JV</small>
                                </h1>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-map-marker fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">Mumbai</div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="posts.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">27-4-2018</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-map-marker fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">Pune</div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="comments.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">12-3-2018</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-yellow">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-map-marker fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">Matheran</div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="comments.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">18-3-2018</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="panel panel-red">
                                        <div class="panel-heading">
                                            <div class="row">
                                                <div class="col-xs-3">
                                                    <i class="fa fa-map-marker fa-5x"></i>
                                                </div>
                                                <div class="col-xs-9 text-right">
                                                    <div class="huge">Goa</div>
                                                    <div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="categories.php">
                                            <div class="panel-footer">
                                                <span class="pull-left">19-5-2018</span>
                                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
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
