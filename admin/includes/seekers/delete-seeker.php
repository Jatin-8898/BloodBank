<?php

include_once("../../../includes/db.php");       /*SINCE IT IS IN DONORS DIRECTORY SO 3 level bacck it goes*/

include_once("../../functions.php");

/*************************************************************************************************************
$_REQUEST TAKE 3 stuffs ie FROM get,post and cookies it is a super global variable
**************************************************************************************/
if(isset($_REQUEST['seeker_id'])){
    echo "ENTERED IN DELETE SEEKER PAGE";
    $seeker_id = $_REQUEST['seeker_id'];
    echo $seeker_id; /*FOR DEBUGGING*/
    
    deleteSeeker($seeker_id);/*CALL TO A FUNCTION*/
    
}


function deleteSeeker($seeker_id){
    
    global $connection;
    
    $deleted_at = date("Y-m-d h:i:sa");
        
    $query = "UPDATE seekers SET deleted = 1, deleted_at = '$deleted_at' WHERE seeker_id = '$seeker_id'";
    if(!$delete_query = mysqli_query($connection, $query)){
        echo "SOME ISSUE HERE";
    }
    confirmQuery($delete_query);
    
   
    echo "SUCCESSFUL DELETE";
    
    header("Location: seekers.php");
        
    }

    
    
    
    
?>