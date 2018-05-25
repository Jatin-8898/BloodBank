
<?php
if(isset($_POST['edit_seeker'])){
        
    if(isset($_GET['p_id'])){
        
       $seeker_id = $_GET['p_id'];           //getting the seeker_id from url

        $seeker_blood_type = $_POST['seeker_blood_type'];
        $seeker_username = $_POST['seeker_username'];
        
        $seeker_fname = $_POST['seeker_fname'];
        $seeker_lname = $_POST['seeker_lname'];
        $seeker_age = $_POST['seeker_age'];
        
        $seeker_gender = $_POST['seeker_gender'];
        $seeker_weight = $_POST['seeker_weight'];

        $seeker_city = $_POST['seeker_city'];
        $seeker_email = $_POST['seeker_email'];
        $seeker_phone = $_POST['seeker_phone'];
        

        $seeker_image = $_FILES['image']['name'];               //multi dimensional
        $seeker_image_temp = $_FILES['image']['tmp_name'];       //temp name coz our browser internally gives name HENCE each img has 2 name
        
        
        //THIS HELPS TO RETAIN THE IMAGE & below is for avoiding broken img wen edit is clicked without chnaging the img
        if(empty($seeker_image)){
            $image_query = "SELECT * from seekers WHERE seeker_id = '$seeker_id'";       
            $select_image_query = mysqli_query($connection,$image_query);//query connection p fire karega & will return all rows this will                                                                 hold rows that is returned by mysqli_query,* returns ResultSet
            if($row = mysqli_fetch_assoc($select_image_query)){          //row is one dimensional array
                $seeker_image = $row['seeker_image'];
            }
        }

        
        $seeker_address = $_POST['seeker_address'];
        move_uploaded_file($seeker_image_temp,"images/users/$seeker_image");//2 argu 1st temporary file name 2nd Paths of img to be uploaded

        $updated_date = date("Y-m-d h:i:sa");
        //echo $updated_date;       IT IS WORKING
        
        $query = "UPDATE seekers SET ";        //update query
        $query .= "seeker_blood_type = '$seeker_blood_type', ";
        $query .= "seeker_username = '$seeker_username', ";
        $query .= "seeker_fname = '$seeker_fname', ";
        $query .= "seeker_lname = '$seeker_lname', ";

        $query .= "seeker_age = '$seeker_age', ";
        $query .= "seeker_gender = '$seeker_gender', ";
        $query .= "seeker_weight = '$seeker_weight', ";
        $query .= "seeker_city = '$seeker_city', ";
        $query .= "seeker_email = '$seeker_email', ";
        $query .= "seeker_phone = '$seeker_phone', ";
        $query .= "seeker_image = '$seeker_image', ";
        $query .= "seeker_address = '$seeker_address', ";
        $query .= "updated_at = '$updated_date' ";
        

        $query .= "WHERE seeker_id = $seeker_id";

        $update_seeker_query = mysqli_query($connection,$query);
        confirmQuery($update_seeker_query);               //call to a () & passing $create_seeker_query
        
        header("Location:seekers.php?op=edit&p=success&page=seekers");
    }
    
}
?>


        
        
        
        
        
        
<?php

        if(isset($_GET['p_id'])){       //query string ie the param passed in url
            $edit_seeker_id = $_GET['p_id'];

            $query = "SELECT * FROM seekers WHERE seeker_id = $edit_seeker_id";
            $edit_seeker_query = mysqli_query($connection,$query);

            if($row = mysqli_fetch_assoc($edit_seeker_query)){
                
                $seeker_blood_type = $row['seeker_blood_type'];
                $seeker_username = $row['seeker_username'];

                $seeker_fname = $row['seeker_fname'];
                $seeker_lname = $row['seeker_lname'];
                $seeker_age = $row['seeker_age'];

                $seeker_gender = $row['seeker_gender'];
                $seeker_weight = $row['seeker_weight'];

                $seeker_city = $row['seeker_city'];
                $seeker_email = $row['seeker_email'];
                $seeker_phone = $row['seeker_phone'];
                
                $seeker_image = $row['seeker_image'];                
                $seeker_address = $row['seeker_address'];
            }
        }
?>
  
  
  
  
  
<form id="editSeeker" action="" method="post" enctype="multipart/form-data">   
   <!--enc type is multipart/form-data for uploading data (too)-->
    <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->
    
    
    <div class="form-group">
        <label for="seeker_blood_type">seeker Blood Type</label>
            <select class="form-control" name="seeker_blood_type" id="seeker_blood_type">
                    <option value="O+" <?php if($seeker_blood_type == "O+") echo "selected"; ?>>O+</option>
                    <option value="O-" <?php if($seeker_blood_type == "O-") echo "selected"; ?>>O-</option>
                    <option value="A+" <?php if($seeker_blood_type == "A+") echo "selected"; ?>>A+</option>
                    <option value="A-" <?php if($seeker_blood_type == "A-") echo "selected"; ?>>A-</option>
                    <option value="B+" <?php if($seeker_blood_type == "B+") echo "selected"; ?>>B+</option>
                    <option value="B-" <?php if($seeker_blood_type == "B-") echo "selected"; ?>>B-</option>
                    <option value="AB+" <?php if($seeker_blood_type == "AB+") echo "selected"; ?>>AB+</option>
                    <option value="AB-" <?php if($seeker_blood_type == "AB-") echo "selected"; ?>>AB-</option>
            </select>
    </div>
    
    <div class="form-group">
        <label for="seeker_username">seeker Username</label>
        <input value="<?php echo $seeker_username;?>" type="text" class="form-control" name="seeker_username" id="seeker_username">
    </div>
    
    <div class="form-group">
        <label for="seeker_fname">seeker First Name</label>
        <input value="<?php echo $seeker_fname;?>" type="text" class="form-control" name="seeker_fname" id="seeker_fname">
    </div>

    
    <div class="form-group">
        <label for="seeker_lname">seeker Last Name</label>
        <input value="<?php echo $seeker_lname;?>" type="text" class="form-control" name="seeker_lname" id="seeker_lname">
    </div>

   <div class="form-group">
        <label for="seeker_age">seeker Age</label>
        <input value="<?php echo $seeker_age;?>" type="number" class="form-control" name="seeker_age" id="seeker_age">
    </div>
    
    <div class="form-group">
        <label for="seeker_gender">seeker Gender</label>
         <select name="seeker_gender" id="seeker_gender" class="form-control">
            <!--value is capital M coz in db its Male therfore case sensitive-->
            <option value="Male" <?php if($seeker_gender == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($seeker_gender == "Female") echo "selected"; ?>>Female</option>
        </select>
    </div>
    
    
     <div class="form-group">
        <label for="seeker_weight">seeker Weight</label>
        <input value="<?php echo $seeker_weight;?>" type="number" class="form-control" name="seeker_weight" id="seeker_weight">
    </div>
     
     
    <div class="form-group">
        <label for="seeker_city">seeker City</label>
        <input value="<?php echo $seeker_city;?>" type="text" class="form-control" name="seeker_city" id="seeker_city">
    </div>
    
    
    
    <div class="form-group">
        <label for="seeker_email">seeker Email</label>
        <input value="<?php echo $seeker_email;?>" type="email" class="form-control" name="seeker_email" id="seeker_email">
    </div>
    

    <div class="form-group">
        <label for="seeker_phone">seeker Phone</label>
        <input value="<?php echo $seeker_phone;?>" type="number" class="form-control" name="seeker_phone" id="seeker_phone">
    </div>

    
    
       
   
   <div class="form-group">
    <label for="">Current Image</label>
    <img src="images/users/<?php echo $seeker_image;?>"  width="200px" class="img-responsive"alt=""> 
    <!--to bring img from db which is inserted-->
    </div>
    <div class="form-group">
        <label for="seeker_image">seeker Image</label>
        <input type="file" class="form-control" name="image" id="seeker_image">        
    </div>   
   
   
    <div class="form-group">
        <label for="seeker_address">seeker Address</label>
        <textarea class="form-control" name="seeker_address" id="seeker_address" cols="30" rows="10"><?php echo $seeker_address;?></textarea> 
    </div>
    
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_seeker" value="Edit seeker Details">
    </div>
    
</form>



