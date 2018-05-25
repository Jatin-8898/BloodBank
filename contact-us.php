<?php
    ob_start(); //this should be the first line n it clears the buffer wen it crosses 4096 or it has sent the page 
    include_once("includes/db.php");
    include_once("includes/header.php");
    include_once("admin/functions.php");
?>

   
   
<?php
    if(isset($_POST['submit_btn'])){
    
       
    
        
    echo  "CAME HERE";
    
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'From: Admin <enquiry@BloodBankManagement.com>' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $to = $_POST['emailid'];
    $subject = $_POST['subject'];
    
    $body = $_POST['comments'];
    
    $sentStatus = mail($to, $subject, $body, $headers);
        
    if(!$sentStatus){
        echo $error_get_last()['message'];
        
    }else{
        echo "SENT";
        $query = "INSERT INTO enquiry(enquiry_subject, enquiry_email, enquiry_message) VALUES ('$subject', '$to', '$body')"; 
        
        $enquiry_query = mysqli_query($connection,$query);
        confirmQuery($enquiry_query); 
        
    }
    //header("Location:index.php");
}
?>
   









<form action="" method="POST" role="form">
    <div class="row">
      
       <div class="col-md-6">
        <div class="form-group">
          <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" required="required">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      
      <div class="col-md-6">
        <div class="form-group">
          <input type="email" name="emailid" id="emailid" class="form-control" placeholder="Email" required="required">
          <p class="help-block text-danger"></p>
        </div>
      </div>
      
    </div>
    
    <div class="form-group">
      <textarea name="comments" id="comments" class="form-control" rows="4" placeholder="Message/Comments" required></textarea>
      <p class="help-block text-danger"></p>
    </div>
    
    <div id="success"></div>
    <button type="submit" class="btn btn-default" name="submit_btn" id="submit">
        Send Message
    </button>
    
</form>