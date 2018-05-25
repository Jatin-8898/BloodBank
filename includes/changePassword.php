
<!DOCTYPE html>
<html lang="en">


<head>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/blog-home.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>


<?php
    session_start();
    $session = session_id();
    $title = "CHANGE PASSWORD";
    $username = $_SESSION['user_name'];
        include_once("../includes/db.php");
        include_once("../includes/header.php");            //bring once if & already brought wont bring
        include_once("../admin/functions.php");
    $check_user = checkUser();

    
    
    if(isset($_POST['change_password'])){
        
        $current_password = $_POST['current_password'];                 //GETTING THIS FROM THE FORM WHICH IS BELOW
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        
        //CLEANING ALL INPUTS
        $current_password = mysqli_real_escape_string($connection, $current_password);
        $new_password = mysqli_real_escape_string($connection, $new_password);
        $confirm_password = mysqli_real_escape_string($connection, $confirm_password);
        
        
        /*USED FOR GETTING THE OLD PASS FROM DB*/
        $query = "SELECT * FROM users WHERE user_name = '$username'";
        $username_check_query = mysqli_query($connection,$query);
            confirmQuery($username_check_query);
        
        if($row = mysqli_fetch_assoc($username_check_query)){
            $current_user_password = $row['user_password'];     //THIS IS THE PASS STORED IN DB
        
            if(password_verify($current_password,$current_user_password)){  //CHECKING IF THE DB PASS N THE FORM PASS MATCHES
                echo "PASSWORDS MATCH WITH THE DB PASSWORD";
                
                if($new_password === $confirm_password){

                    $options = [
                        'cost' => 10,       //this depends of server usually it should be between 7-13
                        'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),  //this creates a randomised salt ie hashed password

                    ];        

                $hashedpass =  password_hash("$new_password",PASSWORD_BCRYPT,$options);       //3 argu ie plain pass,technique,options
                echo "<br>NEW PASS IS:$hashedpass<br>";

                /*UPDATING THE NEW PASSWORD IN THE DB*/
                $query = "UPDATE users SET user_password = '$hashedpass' WHERE user_name = '$username'";
                $update_new_pass_query = mysqli_query($connection,$query);
                confirmQuery($update_new_pass_query);
                    echo "<br>PASSWORD CHANGED SUCCESSFULLY";

                }else{
                    echo "THE ENTERED PASSWORD DOESNT MATCH";

                }
                
            }else{
                echo "<br>PLEASE TRY AGAIN";
            }
        }
        
        
        
        
            

/*        
        --------------------
        $string = 'Hello world.';
            $hash = Hash::make($string);

            if (Hash::check($string, $hash)) {
                 The passwords match...            
        -------------------------
        
        
        /* FOR DEBUGGING THIS IS A GOOD PRACTICE TO ECHO ALL THE INPUTS TAKEN */
        //echo $username ." " .  $old_password. " " . $new_password . " " . $confirm_password;
        
    }
?>

    <body>
            <!-- Page Content -->
            <div class="container" >

                <div class="row" >

                    <div class="col-md-6 col-md-offset-3">
                        <form action="" method="POST" role="form">
                            <legend>Change Password</legend>
                        
                            
                            <div class="form-group">
                                <label for="old_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" placeholder="Enter the old password"  name="current_password">
                            </div>

                           
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="password" class="form-control" id="new_password" placeholder="Please provide a Strong password"  name="new_password">
                            </div>
                           
                             
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" placeholder="Please re-enter the password"  name="confirm_password">
                            </div>


                            <button name="change_password" type="submit" class="btn btn-lg btn-success">Change Password</button>
                        </form>

                    </div>

                </div>
                <!-- /.row -->

                <hr>

        <?php
            include_once("footer.php");
        ?>
            </div>
            <!-- /.container -->

            <!-- jQuery -->
            <script src="js/jquery.js"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="js/bootstrap.min.js"></script>

    </body>

</html>
