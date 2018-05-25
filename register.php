<!DOCTYPE html>
<html lang="en">


<?php

    $title = "Register Yourself";
    include_once("includes/header-login.php");      /*FOR HEADER OF THE LOGIN PAGE*/
    include_once("includes/db.php");
    include_once("admin/functions.php");

    if($connection){
        //echo "CONEECTION SUCCESS";
    }
    
    
        if(isset($_POST['register'])){
        //echo "hello";
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        
        //CLEANING ALL INPUTS
        $username = mysqli_real_escape_string($connection, $username);
        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $password = mysqli_real_escape_string($connection, $password);
        $email = mysqli_real_escape_string($connection, $email);
        
        $query = "SELECT * FROM users WHERE user_name = '$username'";
        $checkusername = mysqli_query($connection,$query);
        
        if($row  = mysqli_fetch_assoc($checkusername)){
            echo "USER ALREADY EXIST";
            
        }else{
            
            //echo "VALID<br>";
            $options = [
                'cost' => 10,       
                'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),  

            ];        

                $hashedpass =  password_hash("$password",PASSWORD_BCRYPT,$options);       
                            
                $query = "INSERT INTO users (user_name, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('$username', '$hashedpass', '$firstname', '$lastname', '$email', 'admin')";
            
                $insert_user_query = mysqli_query($connection,$query);
                confirmQuery($insert_user_query);
                echo "USER REGISTERED SUCCESSFULLY";
            
            }
        
    }//End of isset

?>



<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/login.jpg);">
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="First Name is required">
						<label for="firstname" class="label-input100">First Name</label>
						<input class="input100" type="text" name="firstname" id="firstname" placeholder="Enter First Name">
						<span class="focus-input100"></span>
					</div>

					
                    <div class="wrap-input100 validate-input m-b-26" data-validate="First Name is required">
						<label for="lastname" class="label-input100">Last Name</label>
						<input class="input100" type="text" name="lastname" id="lastname" placeholder="Enter Last Name">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-26" data-validate="First Name is required">
						<label for="email" class="label-input100">Email ID</label>
						<input class="input100" type="email" name="email" id="email" placeholder="Enter your Email">
						<span class="focus-input100"></span>
					</div>

					
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<label for="username" class="label-input100">Username</label>
						<input class="input100" type="text" name="username" id="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

                
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<label for="password" class="label-input100">Password</label>
						<input class="input100" type="password" name="password" id="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
        
                
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register" type="submit">
							Submit
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

<script src="vendor/animsition/js/animsition.min.js"></script>

<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/select2/select2.min.js"></script>

<script src="vendor/daterangepicker/moment.min.js"></script>
<script src="vendor/daterangepicker/daterangepicker.js"></script>
<script src="vendor/countdowntime/countdowntime.js"></script>
<script src="js/main.js"></script>


</body>
</html>