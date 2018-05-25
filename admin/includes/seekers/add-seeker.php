<?php
    if(isset($_POST['create_seeker'])){
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
        
        
        if($seeker_blood_type == "" || !isset($seeker_blood_type)){      //if blank it wil take o+ as default
            $seeker_blood_type = "O+";
        }
        
        $seeker_image = $_FILES['image']['name'];               //multi dimensional
        $seeker_image_temp = $_FILES['image']['tmp_name'];       //temp name coz our browser internally gives name HENCE each img has 2 name
                
        move_uploaded_file($seeker_image_temp,"images/users/$seeker_image");//2 argu 1st temporary file name 2nd Paths of img to be uploaded

        $seeker_address = $_POST['seeker_address'];
        
        $taken = 1;
        
        /*INSERTION CODE TO INSERT INTO DB  */
        $query = "INSERT INTO seekers(seeker_blood_type, seeker_username, seeker_fname, seeker_lname, seeker_age, seeker_gender, seeker_weight, seeker_city, seeker_email, seeker_phone, seeker_image, seeker_address, taken, created_at) VALUES ('$seeker_blood_type', '$seeker_username', '$seeker_fname', '$seeker_lname', '$seeker_age', '$seeker_gender', '$seeker_weight', '$seeker_city', '$seeker_email', '$seeker_phone', '$seeker_image', '$seeker_address', '$taken', now())"; 
        //even in INT it requires ' '
        
        $create_seeker_query = mysqli_query($connection,$query);
        confirmQuery($create_seeker_query);
        
         /*THIS IS USED FOR GETTING THE BLOOD ID OF THE INESRTED BLOOOD TYPE */
        $select_blood_id_query = "SELECT blood_id FROM blood_groups WHERE blood_type = '$seeker_blood_type'";
        $blood_id_query =  mysqli_query($connection,$select_blood_id_query);
        confirmQuery($blood_id_query);
        
        if($row = mysqli_fetch_assoc($blood_id_query)){  //bring the row
            $caught_blood_id =  $row['blood_id'];
            //echo "CAUGHT ";
            //echo $caught_blood_id;
        }
        
        /*NOW FROM THIS CAUGHT ID WE WILL DECREMENT -1 IN STOCK*/
        $check_blood_id_query = "SELECT * FROM blood_stock WHERE blood_id = '$caught_blood_id'";
        $checkquery = mysqli_query($connection,$check_blood_id_query);
            
            /*WEN THE STOCK IS NOT PRESENT*/
            if(!mysqli_num_rows($checkquery)>0){
               echo "NO BLOOD TYPE FOUND IN THE DB";
               
                
            }else{
                
                //echo "Get the Current Stock First";
                $query = "SELECT * FROM blood_stock WHERE blood_id = '$caught_blood_id'";
                $fetch_stock_query =  mysqli_query($connection,$query);
                confirmQuery($fetch_stock_query);
            
                if($row = mysqli_fetch_assoc($fetch_stock_query)){
                    $decrement_stock = $row['blood_stock']; 
                }
                
                /*IF BLOOD  STOCK IS 0 DONT ALLOW THE SEEKER TO TAKE THE BLOOD*/
                if($decrement_stock == 0){
                    $taken = 0;
                    
                    $query = "UPDATE seekers SET taken = '$taken' WHERE seeker_username = '$seeker_username'";
                    $update_query =  mysqli_query($connection,$query);
                    confirmQuery($update_query);
                    echo "<br>NOT ADDED IN THE DB AS TAKEN = 1<br>";
                    
                    die("<br>SORRY STOCK IS ALREADY 0 CANT GIVE BLOOD TO SEEKER!<br>");
                }else{
                    
                $decrement_stock--;
                //echo "UPDATING THE TABLE";
                $query = "UPDATE blood_stock SET blood_stock = '$decrement_stock' WHERE blood_id = '$caught_blood_id'";
                $update_query =  mysqli_query($connection,$query);
                confirmQuery($update_query);
                echo "SUCCESSFULLLY UPDATED";
    
                }//end of else
            }
        
        
        
        header("Location:seekers.php?op=ins&p=success&page=seekers");
    }    
?>
  




    <form id="addSeeker" action="" method="post" enctype="multipart/form-data">
        <!--enc type is multipart/form-data for uploading data (too)-->
        <!--encryption type means data ko chhod ke kuch rahega aur files ko divide kkrat h parts mei especially for image-->



        <div class="form-group">
            <label for="seeker_blood_type">Seeker Blood Type</label>
            <select class="form-control" name="seeker_blood_type" id="seeker_blood_type">
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
            <label for="seeker_username">Seeker Username</label>
            <input type="text" class="form-control" name="seeker_username" id="seeker_username">
        </div>

        <div class="form-group">
            <label for="seeker_fname">Seeker First Name</label>
            <input type="text" class="form-control" name="seeker_fname" id="seeker_fname">
        </div>


        <div class="form-group">
            <label for="seeker_lname">Seeker Last Name</label>
            <input type="text" class="form-control" name="seeker_lname" id="seeker_lname">
        </div>


        <div class="form-group">
            <label for="seeker_age">Seeker Age</label>
            <input type="number" class="form-control" name="seeker_age" id="seeker_age">
        </div>


        <div class="form-group">
            <label for="seeker_gender">Seeker Gender</label>
            <select name="seeker_gender" id="seeker_gender" class="form-control">
            <option value="Male" selected>Male</option>        <!--value is capital M coz in db its Male therfore case sensitive-->
            <option value="Female">Female</option>
        </select>
        </div>

        <div class="form-group">
            <label for="seeker_weight">Seeker Weight</label>
            <input type="number" class="form-control" name="seeker_weight" id="seeker_weight">
        </div>


        <div class="form-group">
            <label for="seeker_city">Seeker City</label>
            <input type="text" class="form-control" name="seeker_city" id="seeker_city">
        </div>



        <div class="form-group">
            <label for="seeker_email">Seeker Email</label>
            <input type="email" class="form-control" name="seeker_email" id="seeker_email">
        </div>


        <div class="form-group">
            <label for="seeker_phone">Seeker Phone</label>
            <input type="number" class="form-control" name="seeker_phone" id="seeker_phone">
        </div>


        <div class="form-group">
            <label for="seeker_image">Seeker Image</label>
            <input type="file" class="form-control" name="image" id="seeker_image">
        </div>


        <div class="form-group">
            <label for="seeker_address">Seeker Address</label>
            <textarea class="form-control" name="seeker_address" id="seeker_address" cols="30" rows="10"></textarea>
        </div>



        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="create_seeker" value="Add Seeker">
        </div>

    </form>

