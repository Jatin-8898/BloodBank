
<?php
if(isset($_POST['edit_donor'])){
        
    if(isset($_GET['p_id'])){
        
        $donor_id = $_GET['p_id'];           //getting the donor_id from url

        $donor_blood_type = $_POST['donor_blood_type'];
        $donor_username = $_POST['donor_username'];
        
        $donor_fname = $_POST['donor_fname'];
        $donor_lname = $_POST['donor_lname'];
        $donor_age = $_POST['donor_age'];
        
        $donor_gender = $_POST['donor_gender'];
        $donor_weight = $_POST['donor_weight'];

        $donor_city = $_POST['donor_city'];
        $donor_email = $_POST['donor_email'];
        $donor_phone = $_POST['donor_phone'];
        

        $donor_image = $_FILES['image']['name'];               //multi dimensional
        $donor_image_temp = $_FILES['image']['tmp_name'];       //temp name coz our browser internally gives name HENCE each img has 2 name
        
        
        //THIS HELPS TO RETAIN THE IMAGE & below is for avoiding broken img wen edit is clicked without chnaging the img
        if(empty($donor_image)){
            $image_query = "SELECT * from donors WHERE donor_id = '$donor_id'";       
            $select_image_query = mysqli_query($connection,$image_query);//query connection p fire karega & will return all rows this will                                                                 hold rows that is returned by mysqli_query,* returns ResultSet
            if($row = mysqli_fetch_assoc($select_image_query)){          //row is one dimensional array
                $donor_image = $row['donor_image'];
            }
        }

        
        $donor_address = $_POST['donor_address'];
        move_uploaded_file($donor_image_temp,"images/users/$donor_image");//2 argu 1st temporary file name 2nd Paths of img to be uploaded

        $updated_date = date("Y-m-d h:i:sa");
        //echo $updated_date;       IT IS WORKING
        
        $query = "UPDATE donors SET ";        //update query
        $query .= "donor_blood_type = '$donor_blood_type', ";
        $query .= "donor_username = '$donor_username', ";
        $query .= "donor_fname = '$donor_fname', ";
        $query .= "donor_lname = '$donor_lname', ";

        $query .= "donor_age = '$donor_age', ";
        $query .= "donor_gender = '$donor_gender', ";
        $query .= "donor_weight = '$donor_weight', ";
        $query .= "donor_city = '$donor_city', ";
        $query .= "donor_email = '$donor_email', ";
        $query .= "donor_phone = '$donor_phone', ";
        $query .= "donor_image = '$donor_image', ";
        $query .= "donor_address = '$donor_address', ";
        $query .= "updated_at = '$updated_date' ";
        

        $query .= "WHERE donor_id = $donor_id";

        $update_donor_query = mysqli_query($connection,$query);
        confirmQuery($update_donor_query);               //call to a () & passing $create_donor_query
        
        header("Location:donors.php?op=edit&p=success&page=donors");
    }
    
}
?>



        

        

        
        
        
        
        
        
<?php

        if(isset($_GET['p_id'])){       //query string ie the param passed in url
            $edit_donor_id = $_GET['p_id'];

            $query = "SELECT * FROM donors WHERE donor_id = $edit_donor_id";
            $edit_donor_query = mysqli_query($connection,$query);

            if($row = mysqli_fetch_assoc($edit_donor_query)){
                
                $donor_blood_type = $row['donor_blood_type'];
                $donor_username = $row['donor_username'];

                $donor_fname = $row['donor_fname'];
                $donor_lname = $row['donor_lname'];
                $donor_age = $row['donor_age'];

                $donor_gender = $row['donor_gender'];
                $donor_weight = $row['donor_weight'];

                $donor_city = $row['donor_city'];
                $donor_email = $row['donor_email'];
                $donor_phone = $row['donor_phone'];
                
                $donor_image = $row['donor_image'];                
                $donor_address = $row['donor_address'];
            }
        }
?>
  
  
  
  
  
<form id="editDonor" action="" method="post" enctype="multipart/form-data">   
   <!--enc type is multipart/form-data for uploading data (too)-->
    <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->
    
    
    <div class="form-group">
        <label for="donor_blood_type">Donor Blood Type</label>
            <select class="form-control" name="donor_blood_type" id="donor_blood_type">
                    <option value="O+" <?php if($donor_blood_type == "O+") echo "selected"; ?>>O+</option>
                    <option value="O-" <?php if($donor_blood_type == "O-") echo "selected"; ?>>O-</option>
                    <option value="A+" <?php if($donor_blood_type == "A+") echo "selected"; ?>>A+</option>
                    <option value="A-" <?php if($donor_blood_type == "A-") echo "selected"; ?>>A-</option>
                    <option value="B+" <?php if($donor_blood_type == "B+") echo "selected"; ?>>B+</option>
                    <option value="B-" <?php if($donor_blood_type == "B-") echo "selected"; ?>>B-</option>
                    <option value="AB+" <?php if($donor_blood_type == "AB+") echo "selected"; ?>>AB+</option>
                    <option value="AB-" <?php if($donor_blood_type == "AB-") echo "selected"; ?>>AB-</option>
            </select>
    </div>
    
    <div class="form-group">
        <label for="donor_username">Donor Username</label>
        <input value="<?php echo $donor_username;?>" type="text" class="form-control" name="donor_username" id="donor_username">
    </div>
    
    <div class="form-group">
        <label for="donor_fname">Donor First Name</label>
        <input value="<?php echo $donor_fname;?>" type="text" class="form-control" name="donor_fname" id="donor_fname">
    </div>

    
    <div class="form-group">
        <label for="donor_lname">Donor Last Name</label>
        <input value="<?php echo $donor_lname;?>" type="text" class="form-control" name="donor_lname" id="donor_lname">
    </div>

   <div class="form-group">
        <label for="donor_age">Donor Age</label>
        <input value="<?php echo $donor_age;?>" type="number" class="form-control" name="donor_age" id="donor_age">
    </div>
    
    <div class="form-group">
        <label for="donor_gender">Donor Gender</label>
         <select name="donor_gender" id="donor_gender" class="form-control">
            <!--value is capital M coz in db its Male therfore case sensitive-->
            <option value="Male" <?php if($donor_gender == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($donor_gender == "Female") echo "selected"; ?>>Female</option>
        </select>
    </div>
    
    
     <div class="form-group">
        <label for="donor_weight">Donor Weight</label>
        <input value="<?php echo $donor_weight;?>" type="number" class="form-control" name="donor_weight" id="donor_weight">
    </div>
     
     
    <div class="form-group">
        <label for="donor_city">Donor City</label>
        <input value="<?php echo $donor_city;?>" type="text" class="form-control" name="donor_city" id="donor_city">
    </div>
    
    
    
    <div class="form-group">
        <label for="donor_email">Donor Email</label>
        <input value="<?php echo $donor_email;?>" type="email" class="form-control" name="donor_email" id="donor_email">
    </div>
    

    <div class="form-group">
        <label for="donor_phone">Donor Phone</label>
        <input value="<?php echo $donor_phone;?>" type="number" class="form-control" name="donor_phone" id="donor_phone">
    </div>

    
    
       
   
   <div class="form-group">
    <label for="">Current Image</label>
    <img src="images/users/<?php echo $donor_image;?>"  width="200px" class="img-responsive"alt=""> 
    <!--to bring img from db which is inserted-->
    </div>
    <div class="form-group">
        <label for="donor_image">Donor Image</label>
        <input type="file" class="form-control" name="image" id="donor_image">        
    </div>   
   
   
    <div class="form-group">
        <label for="donor_address">Donor Address</label>
        <textarea class="form-control" name="donor_address" id="donor_address" cols="30" rows="10"><?php echo $donor_address;?></textarea> 
    </div>
    
    
    
    
    <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_donor" value="Edit Donor Details">
    </div>
    
</form>


