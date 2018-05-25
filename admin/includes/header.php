
<?php
    include_once("../includes/db.php");
    session_start();
    include_once("functions.php");
    //checkUserSession();

?>


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLOOD BANK</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--BOOTSTRAP VALIDATOR CSS-->
    <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">

    <!--TOASTR-->
    <link rel="stylesheet" href="css/bootstrapValidator.min.css" type="text/css">
   
    <?php
        if($page == "donors" || $page =="seekers" || $page=="users")   
        {
    ?>
    
        <!--SWEET ALERT CSS-->
        <link rel="stylesheet" href="js/plugins/sweet-alert/sweetalert2.min.css">

        <!--TOASTR-->
        <link rel="stylesheet" href="js/plugins/toastr/build/toastr.min.css" type="text/css">
        
        <!--ALERTIFY CSS-->
        <link rel="stylesheet" href="../vendor/alertifyjs/css/alertify.min.css" type="text/css">
        <link rel="stylesheet" href="../vendor/alertifyjs/css/alertify.css" type="text/css">
        <link rel="stylesheet" href="../vendor/alertifyjs/css/themes/default.css" type="text/css">
        <link rel="stylesheet" href="../../vendor/alertifyjs/css/alertify.rtl.min.css" type="text/css">
        <link rel="stylesheet" href="../vendor/alertifyjs/css/themes/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../vendor/alertifyjs/css/themes/bootstrap.css" type="text/css">
        

   <?php
	       }//end of if
	?>
   
       
   
   
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

    <script src="js/jquery.js"></script>

