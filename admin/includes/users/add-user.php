<?php
    if(isset($_POST['create_user'])){
        
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_password_confirm = $_POST['user_password_confirm'];

    
        if($user_role == "" || !isset($user_role)){      //if blank it wil take draft as default
            $user_role = "admin";
        }
        
        $user_image = $_FILES['user_image']['name'];               //multi dimensional
        $user_image_temp = $_FILES['user_image']['tmp_name'];       //temp name coz our browser internally gives name HENCE each img has 2 name
                
        
        
    
        $options = [
            'cost' => 10,       //this depends of server usually it should be between 7-13
            'salt' => mcrypt_create_iv(22,MCRYPT_DEV_URANDOM),  //this creates a randomised salt ie hashed password

        ];        

        $hashedpass =  password_hash("$user_password",PASSWORD_BCRYPT,$options);       //3 argu ie plain pass,technique,options
        echo $hashedpass;
        
        
        
        if($user_password === $user_password_confirm){          // false dega type bhi dekhta h woh eg 
            move_uploaded_file($user_image_temp,"images/users/$user_image");   //2 argu 1st temporary file name 2nd Paths of img to be uploaded
        
        $query = "INSERT INTO users(user_firstname, user_lastname, user_email, user_role, user_name, user_password, user_image) VALUES ('$user_firstname', '$user_lastname', '$user_email', '$user_role', '$user_name', '$hashedpass', '$user_image')";         
            
        if($user_firstname && $user_email){
            $create_user_query = mysqli_query($connection,$query);
            confirmQuery($create_user_query);
            header("Location: users.php?op=ins&p=success&page=users");

        }else{
            echo "NO BLANK ENTRIES ALLLOWED";
        }
        
    }else{
        echo "PASSWORD AND COFIRM PASSWORD DOES NOT MATCH";
    }
        
}//end of function
    
?>
  

<form id="addUser" action="" method="post" enctype="multipart/form-data">   
    <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->
    
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" name="user_firstname" id="first_name">
    </div>
    
    
    
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" id="last_name">
        
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email" id="email">
        
    </div>
    
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="user_role" id="role">
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    
    
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" name="user_name" id="username">
    </div>
    
    
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="user_password" id="password">
    </div>
    
    
    <div class="form-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" class="form-control" name="user_password_confirm" id="confirm_password">
    </div>
    
    
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" class="form-control" name="user_image" id="image">
    </div>
    
    <hr>
    

    
    <!--FOR DISPLAYING THE ERROR WE R MAKING A DIV-->
    <div class="form-group">
        <div class="col-md-9 col-md-offset-3">
            <div class="messages"></div>
        </div> 
    </div>

    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Create User">
    </div>
    
</form>