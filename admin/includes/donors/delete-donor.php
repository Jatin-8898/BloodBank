<?php

include_once("../../../includes/db.php");       /*SINCE IT IS IN DONORS DIRECTORY SO 3 level bacck it goes*/

include_once("../../functions.php");

/*************************************************************************************************************
$_REQUEST TAKE 3 stuffs ie FROM get,post and cookies it is a super global variable
**************************************************************************************/
if(isset($_REQUEST['donor_id'])){
    echo "ENTERED IN DELETE DONOR PAGE";
    $donor_id = $_REQUEST['donor_id'];
    echo $donor_id; /*FOR DEBUGGING*/
    
    deleteDonor($donor_id);/*CALL TO A FUNCTION*/
    
}


function deleteDonor($donor_id){
    
    global $connection;
    
    $deleted_at = date("Y-m-d h:i:sa");
        
    $query = "UPDATE donors SET deleted = 1, deleted_at = '$deleted_at' WHERE donor_id = '$donor_id'";
    if(!$delete_query = mysqli_query($connection, $query)){
        echo "SOME ISSUE HERE";
    }
    confirmQuery($delete_query);
    
    /***************FOR GETTING THE BLOOD TYPE EG 0+ , A+ *************************/
    $select_blood_type_query = "SELECT donor_blood_type FROM donors WHERE donor_id = '$donor_id'";
    $blood_type_query =  mysqli_query($connection,$select_blood_type_query);
        confirmQuery($blood_type_query);
    
    if($row = mysqli_fetch_assoc($blood_type_query)){  //bring the row
            $caught_blood_type =  $row['donor_blood_type'];
            echo "CAUGHT";
            echo $caught_blood_type;
        }
    
    /*THIS IS USED FOR GETTING THE BLOOD ID OF THE INESRTED BLOOOD TYPE eg O+ ka id is 1*/
        $select_blood_id_query = "SELECT blood_id FROM blood_groups WHERE blood_type = '$caught_blood_type'";
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
               echo "NOTHING TO DO HERE";

                
            }else{
                
                echo "if ALREADY PRESENT Get the Current Stock First";
                $query = "SELECT * FROM blood_stock WHERE blood_id = '$caught_blood_id'";
                $fetch_stock_query =  mysqli_query($connection,$query);
                confirmQuery($fetch_stock_query);
            
                if($row = mysqli_fetch_assoc($fetch_stock_query)){
                    $count_stock = $row['blood_stock']; 
                }
                $count_stock--;
                echo "UPDATING THE TABLE";
                $query = "UPDATE blood_stock SET blood_stock = '$count_stock' WHERE blood_id = '$caught_blood_id'";
                $update_query =  mysqli_query($connection,$query);
                confirmQuery($update_query);
                echo "SUCCESSFULLLY UPDATED";
    
            }
        echo "SUCCESSFUL DELETE";
    
        header("Location: donors.php");
        
    }

    
    
    
    
?>