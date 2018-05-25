<?php
    if(isset($_POST['create_donor'])){
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
        
        
        if($donor_blood_type == "" || !isset($donor_blood_type)){      //if blank it wil take o+ as default
            $donor_blood_type = "O+";
        }
        
        $donor_image = $_FILES['image']['name'];               //multi dimensional
        $donor_image_temp = $_FILES['image']['tmp_name'];       //temp name coz our browser internally gives name HENCE each img has 2 name
                
        move_uploaded_file($donor_image_temp,"images/users/$donor_image");//2 argu 1st temporary file name 2nd Paths of img to be uploaded

        $donor_address = $_POST['donor_address'];

        
    
        
        /*INSERTION CODE TO INSERT INTO DB  */
        $query = "INSERT INTO donors(donor_blood_type, donor_username, donor_fname, donor_lname, donor_age, donor_gender, donor_weight, donor_city, donor_email, donor_phone, donor_image, donor_address, created_at) VALUES ('$donor_blood_type', '$donor_username', '$donor_fname', '$donor_lname', '$donor_age', '$donor_gender', '$donor_weight', '$donor_city', '$donor_email', '$donor_phone', '$donor_image', '$donor_address', now())"; 
        
        
        $create_donor_query = mysqli_query($connection,$query);
        confirmQuery($create_donor_query);
        
        /*THIS IS USED FOR GETTING THE BLOOD ID OF THE INESRTED BLOOOD TYPE eg O+ ka id is 1*/
        $select_blood_id_query = "SELECT blood_id FROM blood_groups WHERE blood_type = '$donor_blood_type'";
        $blood_id_query =  mysqli_query($connection,$select_blood_id_query);
        confirmQuery($blood_id_query);
        
        if($row = mysqli_fetch_assoc($blood_id_query)){  //bring the row
            $caught_blood_id =  $row['blood_id'];
            echo "CAUGHT";
            echo $caught_blood_id;
        }
        
        
        /*NOW FROM THIS CAUGHT ID WE WILL INSERT +1 IN STOCK*/
        $check_blood_id_query = "SELECT * FROM blood_stock WHERE blood_id = '$caught_blood_id'";
        $checkquery = mysqli_query($connection,$check_blood_id_query);
            
            /*WEN THE STOCK IS NOT PRESENT IE IT IT INITIALLY 0*/
            if(!mysqli_num_rows($checkquery)>0){
               echo "INSERTING FIRST TIME NOW IN BLOOD STOCK TABLE";
                $blood_stock = 1;
                $query = "INSERT INTO blood_stock(blood_id, blood_stock) VALUES('$caught_blood_id', '$blood_stock')";
                $insert_query =  mysqli_query($connection,$query);
                confirmQuery($insert_query);
                echo "SUCCESSFULLLY INSERTED";
                
            }else{
                
                echo "if ALREADY PRESENT Get the Current Stock First";
                $query = "SELECT * FROM blood_stock WHERE blood_id = '$caught_blood_id'";
                $fetch_stock_query =  mysqli_query($connection,$query);
                confirmQuery($fetch_stock_query);
            
                if($row = mysqli_fetch_assoc($fetch_stock_query)){
                    $count_stock = $row['blood_stock']; 
                }
                $count_stock++;
                echo "UPDATING THE TABLE";
                $query = "UPDATE blood_stock SET blood_stock = '$count_stock' WHERE blood_id = '$caught_blood_id'";
                $update_query =  mysqli_query($connection,$query);
                confirmQuery($update_query);
                echo "SUCCESSFULLLY UPDATED";
    
            }
        
        header("Location:donors.php?op=ins&p=success&page=donors");
    }    
?>




<form id="addDonor" action="" method="post" enctype="multipart/form-data">
        <!--enc type is multipart/form-data for uploading data (too)-->
        <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->



        <div class="form-group">
            <label for="donor_blood_type">Donor Blood Type</label>
            <select class="form-control" name="donor_blood_type" id="donor_blood_type">
               <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
        </select>
        </div>

        <div class="form-group">
            <label for="donor_username">Donor Username</label>
            <input type="text" class="form-control" name="donor_username" id="donor_username">
        </div>

        <div class="form-group">
            <label for="donor_fname">Donor First Name</label>
            <input type="text" class="form-control" name="donor_fname" id="donor_fname">
        </div>


        <div class="form-group">
            <label for="donor_lname">Donor Last Name</label>
            <input type="text" class="form-control" name="donor_lname" id="donor_lname">
        </div>


        <div class="form-group">
            <label for="donor_age">Donor Age</label>
            <input type="number" class="form-control" name="donor_age" id="donor_age" required
            min="18" data-bv-greaterthan-inclusive="true" data-bv-greaterthan-message="The age must be greater than or equal to 18 years"
            max="70" data-bv-lessthan-inclusive="false" data-bv-lessthan-message="The age must be less than 70 years">
        </div>


        <div class="form-group">
            <label for="donor_gender">Donor Gender</label>
            <select name="donor_gender" id="donor_gender" class="form-control">
            <option value="Male" selected>Male</option><!--value is capital M coz in db its Male therfore case sensitive-->
            <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
            <label for="donor_weight">Donor Weight</label>
            <input type="number" class="form-control" name="donor_weight" id="donor_weight" required
            min="50" data-bv-greaterthan-inclusive="true" data-bv-greaterthan-message="The Weight must be greater than or equal to 50 KG"
            max="150" data-bv-lessthan-inclusive="false" data-bv-lessthan-message="The Weight must be less than 150 KG">
        </div>


        <div class="form-group">
            <label for="donor_city">Donor City</label>
            <input type="text" class="form-control" name="donor_city" id="donor_city">
        </div>



        <div class="form-group">
            <label for="donor_email">Donor Email</label>
            <input type="email" class="form-control" name="donor_email" id="donor_email">
        </div>


        <div class="form-group">
            <label for="donor_phone">Donor Phone</label>
            <input type="number" class="form-control" name="donor_phone" id="donor_phone">
        </div>


        <div class="form-group">
            <label for="donor_image">Donor Image</label>
            <input type="file" class="form-control" name="image" id="donor_image">
        </div>


        <div class="form-group">
            <label for="donor_address">Donor Address</label>
            <textarea class="form-control" name="donor_address" id="donor_address" cols="30" rows="10"></textarea>
        </div>



        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_donor" value="Add Donor">
        </div>

    </form>
