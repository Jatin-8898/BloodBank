<script>

<?php

    $notification_for  = "";        /*SETTING IT BLANK*/
    if(isset($_GET['op'])){

        $op = $_GET['op'];             /*GETTING THE DETAILS IE PAGE OP AND P*/
        $page = $_GET['page'];
        $p = $_GET['p'];


        switch($page){
            case "donors":
                $notification_for = "Donor";
                break;

            case "seekers":
                $notification_for = "Seeker";
                break;

            case "users":
                $notification_for = "User";
                break;

        }
    if($op == "ins" && $p=="success"){
        ?>
        
        toastr.options.closeButton = true;
        toastr.options.closeMethod = 'fadeOut';
        toastr.options.closeDuration = 300;
        toastr.options.closeEasing = 'swing';
        toastr.options.progressBar = true;
        toastr.options.showEasing = 'swing';
        toastr.options.hideEasing = 'linear';
        toastr.options.closeEasing = 'linear';
        toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';

    
        Command: toastr["success"]("<?php echo $notification_for; ?> Inserted Successfully ")
            toastr.options = {
              "debug": false,
              "newestOnTop": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }   
    
<?php    
    }else if($op == "edit" && $p == "success"){
        ?>
        
        toastr.options.closeButton = true;
        toastr.options.closeMethod = 'fadeOut';
        toastr.options.closeDuration = 300;
        toastr.options.closeEasing = 'swing';
        toastr.options.progressBar = true;
        toastr.options.closeHtml = '<button><i class="fa fa-close"></i></button>';
    
        Command: toastr["success"]("<?php echo $notification_for; ?> Updated Successfully ")
            toastr.options = {
              "debug": false,
              "newestOnTop": true,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }   
    <?php
        
        }//end of else

}
?>

</script>