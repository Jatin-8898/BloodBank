<?php 

/*FUNCTION FOR CONFIRM QUERY*/
function confirmQuery($result){
    global $connection;                 ///this we have to tell php that $connection is now globa
    
    if(!$result){
        die("QUERY FAILED :" .mysqli_error($connection));
    }
}

/*FUNCTION FOR ADD CATEGORY*/
function addBloodGroup(){
    
    global $connection;      //this we have to tell php that $connection is now global bt scope is in this () only
    
    if(isset($_POST['submit'])){
        $input_blood_type = $_POST['blood_type'];
        
        if($input_blood_type == "" || empty($input_blood_type)){
            echo "Please insert Blood Type and then try";
        }else{
            
            $query = "SELECT blood_type FROM blood_groups WHERE blood_type = '$input_blood_type'";
            $checkquery = mysqli_query($connection,$query);
            
            if(mysqli_num_rows($checkquery)>0){
               echo "ALREADY PRESENT"; 
            }else{
                
            $query = "INSERT INTO blood_groups(blood_type) VALUES ('$input_blood_type')"; 
            $add_blood_group_query = mysqli_query($connection,$query);

            if(!$add_blood_group_query){
                die('QUERY FAILED' .mysqli_error($connection));
            }
                header("Location: blood-groups.php");    
            }
        }
    }
}


/*FUNCTION FOR EDIT CATEGORY*/
function editBloodGroup(){
    
    global $connection;                     //this we have to tell php that $connection is now global
        
    if(isset($_POST['edit_submit'])){           //on btn click if some value is der
        $input_blood_type = $_POST['blood_type']; 
        $input_blood_id = $_GET['edit'];          //this will bring eg edit=5 using get from url 

        if($input_blood_type == "" || empty($input_blood_type)){
            echo "Please insert Blood Type  and then try";
        }else{

            $query = "UPDATE blood_groups SET blood_type = '$input_blood_type' WHERE blood_id = $input_blood_id";

            $update_blood_group_query = mysqli_query($connection,$query);

            if(!$update_blood_group_query){
                die('QUERY FAILED' .mysqli_error($connection));
            }
            header("Location: blood-groups.php");
        }
    }
}






/*FUNCTION FOR FETCHING THE CATEGORY FOR EDITING*/
function fetchBloodTypeForEdit(){
    
    global $connection;

    if(isset($_GET['edit'])){
        $edit_blood_id = $_GET['edit'];           
        $query = "SELECT * FROM blood_groups WHERE blood_id = $edit_blood_id";  //this will bring the selected id

        $edit_blood_group_query = mysqli_query($connection,$query);//make ResultSet 
        if($row = mysqli_fetch_assoc($edit_blood_group_query)){  //bring the row
            return $row['blood_type'];
        }
    }
}
/*function fetchBloodStockForEdit(){
    
    global $connection;

    if(isset($_GET['edit'])){
        $edit_blood_id = $_GET['edit'];           
        $query = "SELECT * FROM blood_groups WHERE blood_id = $edit_blood_id";  //this will bring the selected id

        $edit_blood_group_query = mysqli_query($connection,$query);//make ResultSet 
        if($row = mysqli_fetch_assoc($edit_blood_group_query)){  //bring the row
            return $row['blood_stock'];
        }
    }
}*/






/*FUNCTION FOR SEARCH CITY*/
function findDonorCity(){
    
    global $connection;      //this we have to tell php that $connection is now global bt scope is in this () only
    
    if(isset($_POST['btn_search_city'])){
        $text_search_city = $_POST['text_search_city'];

        if($text_search_city == "" || empty($text_search_city)){
            echo "Please Enter the City  and then try";
        }else{
            
            $query = "SELECT * FROM donors WHERE donor_city = '$text_search_city'";
            $checkquery = mysqli_query($connection,$query);
            
           
            
            if(!mysqli_num_rows($checkquery)>0){
               echo "City Not Present in the DB"; 
            }else{
            
                //echo "WORKNIG";
                
                if(!$checkquery){
                    die('QUERY FAILED' .mysqli_error($connection));
                }else{
                        
                    return $text_search_city;
                    
                    //include_once("includes/find-donors/view-search-results.php");
                } 
             
            }
        }
    }
}






/*FUNCTION FOR SEARCH BY BLOOD GROUP*/
function findDonorBloodType(){
    
    global $connection;      //this we have to tell php that $connection is now global bt scope is in this () only
    
    if(isset($_POST['search_blood_type'])){
        $text_blood_type = $_POST['text_blood_type'];

        if($text_blood_type == "" || empty($text_blood_type)){
            echo "Please Enter the Blood Group and then try";
        }else{
            
            $query = "SELECT * FROM donors WHERE donor_blood_type = '$text_blood_type'";
            $checkquery = mysqli_query($connection,$query);
            
            
            if(!mysqli_num_rows($checkquery)>0){
               //echo "Blood Group is Not Present in the DB"; 
                echo "NO SUCH CITY IS AVAILABLE";
            }else{
            
                //echo "WORKNIG";
                
                if(!$checkquery){
                    die('QUERY FAILED' .mysqli_error($connection));
                }else{
                        
                    return $text_blood_type;
                    
                    //include_once("includes/find-donors/view-search-results.php");
                } 
             
            }
        }
    }
}











function fetchBloodID(){
 /*******************************************************
        FOR INCREMENTING THE COUNT IN BLOOD STOCK BY +1
        *********************************************************/
        echo "TESTIG INCREMENT";
        $select_blood_id_query = "SELECT blood_id FROM blood_groups WHERE blood_type = '$donor_blood_type'";
        $blood_id_query =  mysqli_query($connection,$select_blood_id_query);
        confirmQuery($blood_id_query);
    
        if($row = mysqli_fetch_assoc($blood_id_query)){  //bring the row
            return $row['blood_id'];
            echo "NICE";
        }
        //$select_current_stock_query = "SELECT * FROM blood_stock WHERE " 
        
        //$query = "UPDATE blood_stock SET blood_stock = "
}




/*FUNCTION FOR VALIDATING FORM DATA*/
function validateFormData($formData){
        $formData = trim(stripslashes(htmlspecialchars($formData)));    
        return $formData;
}



function checkUser(){
    
/*IF NOT PROPER USER IT SHOULD REDIRECT TO LOGIN PAGE HERE ITS INDEX.php*/
        if(!isset($_SESSION['user_name'])){
            die("<h2 style = 'color:white'> You have not Logged In,Please Login from  <a href = '../login.php'>here</a></h2>");
            
        }else{
            
            $username = $_SESSION['user_name']; 
            return $username;
        }
}
?>
