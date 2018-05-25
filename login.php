<!DOCTYPE html>
<html lang="en">


<?php

    include_once("includes/header-login.php");      /*FOR HEADER OF THE LOGIN PAGE*/
?>

    
<?php

    session_start();
    include_once("includes/db.php");
    include_once("admin/functions.php");
    if(isset($_POST['login'])){

        $username = $_POST['user_name'];         //HERE THE NAME WILL GIVE WHICH IS GIVEN IN DIV OF SIDEBAR
        $password = $_POST['password'];         //HERE THE NAME WILL GIVE WHICH IS GIVEN IN DIV OF SIDEBAR
        
        
        $username = mysqli_real_escape_string($connection,$username);   //THIS WILL REMOVE THE '/'
        $password = mysqli_real_escape_string($connection,$password);   //THIS WILL REMOVE THE '/'

    
        $query = "SELECT * FROM users WHERE user_name = '$username' and token=''";   //ALWAYS FETCHH THE USERNAME NOT THE PASS
        
        $select_user_details = mysqli_query($connection,$query);
        confirmQuery($select_user_details);
        
        
        /*FOR MORE SECURE*/
        if(mysqli_num_rows($select_user_details) > 1){
            header("Location: index.php");    
        }
        
        
        if($row = mysqli_fetch_assoc($select_user_details)){
            $user_id = $row['user_id'];                         //GET THE USER ID FROM DB VERY IMP
            $db_username = $row['user_name'];
            $db_hashed_password = $row['user_password'];
            $db_role = $row['user_role'];                       //FOR ROLE WEN LOGGED IN SAFER SIDE
            
            
        }else{
            $db_password = "";          //so error nikal jayee intialised $db_password with blank
        }
        if(password_verify($password,$db_hashed_password) && $username === $db_username){  //ENTER ONLY WEN PASS N USER MATCH THAT ALSO ===
            
            $_SESSION['user_name'] = $db_username;
            $_SESSION['user_role'] = $db_role;
            $_SESSION['user_id'] = $user_id;
            
            header("Location: admin/");
            echo "<br>LOGGED IN SUCCESSFULY";
            
            
        }else{
            //die("USERNAME OR  PASSWORD IS NOT VALID");
            echo "<br>USERNAME OR PASSWORD IS INVALID!!!";
            header("Location: login.php");
        }
    }
?>

<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/login.jpg);">
				</div>

				<form class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<label for="user_name" class="label-input100">Username</label>						
						<input class="input100" type="text" name="user_name" id="user_name" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

                
					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<label for="password" class="label-input100">Password</label>
						<input class="input100" type="password" name="password" id="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

                    
					

                
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="login">
							Login
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