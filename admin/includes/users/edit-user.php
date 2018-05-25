
<?php
if(isset($_POST['edit_user_btn'])){
        
    if(isset($_GET['edit_id'])){
        
        $user_id = $_GET['edit_id'];           //getting the post_id from url

        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        //$user_password = $_POST['user_password'];
        //$user_password_confirm = $_POST['user_password_confirm'];
        $user_image = $_FILES['user_image']['name'];               
        $user_image_temp = $_FILES['user_image']['tmp_name'];     

        
//        if(empty($user_password || empty($user_password_confirm))){
//            echo "PASSWORD FIELDS CANT BE EMPTY";
//        }            
        
        if(empty($user_image)){
                $image_query = "SELECT * from users WHERE user_id = '$user_id'";       
                $select_image_query = mysqli_query($connection,$image_query);  

                if($row = mysqli_fetch_assoc($select_image_query)){          
                    $user_image = $row['user_image'];
                }
        }else{
                move_uploaded_file($user_image_temp,"images/users/$user_image");
            }
            
            $query = "UPDATE users SET ";        //update query
            $query .= "user_name = '$user_name', ";
          //  $query .= "user_password = '$user_password', ";
            $query .= "user_firstname = '$user_firstname', ";
            $query .= "user_lastname = '$user_lastname', ";
            $query .= "user_email = '$user_email', ";
            $query .= "user_image = '$user_image', ";
            $query .= "user_role = '$user_role' ";      //no comma here
            $query .= "WHERE user_id = $user_id";

            $update_user_query = mysqli_query($connection,$query);

            confirmQuery($update_user_query);   //call to a () & passing $create_post_query
            header("Location: users.php?op=edit&p=success&page=users");
    }    

}
?>



<?php

    if(isset($_GET['edit_id'])){       //query string ie the param passed in url
        $edit_user_id = $_GET['edit_id'];
        
        $query = "SELECT * FROM users WHERE user_id = $edit_user_id";
        $edit_user_query = mysqli_query($connection,$query);
        
        if($row = mysqli_fetch_assoc($edit_user_query)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];
            $user_password = $row['user_password'];

        }
    }
?>

  
    
    
<!--the only change is that value is putted rest is copy paste from add post-->
<form action="" method="post" enctype="multipart/form-data">          <!--for img to be updated--> 
    <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->
    
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input value="<?php echo $user_firstname;?>" type="text" class="form-control" name="user_firstname" id="first_name">
    </div>
    
    
    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input value="<?php echo $user_lastname;?>" type="text" class="form-control" name="user_lastname" id="last_name">
        
    </div>
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input value="<?php echo $user_email;?>" type="text" class="form-control" name="user_email" id="email">
        
    </div>
    
    <div class="form-group">
        <label for="role">Role</label>
        <select class="form-control" name="user_role" id="role">
            <option value="admin" <?php if($user_role == "admin") echo "selected"; ?>>Admin</option>
        </select>
    </div>
    
    
    <div class="form-group">
        <label for="username">User Name</label>
        <input value="<?php echo $user_name;?>" type="text" class="form-control" name="user_name" id="username">
    </div>
    
    
    
    <div class="form-group">
        <label for="">Current Image</label>
        <img src="images/users/<?php echo $user_image;?>"  width="100px" class="img-responsive" alt=""><!--to bring img from db which is inserted-->
        </div>
        
    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" class="form-control" name="user_image" id="image">
    </div>
    
    <hr>
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user_btn" value="UPDATE USER">
    </div>

</form>




