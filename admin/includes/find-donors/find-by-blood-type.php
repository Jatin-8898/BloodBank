<!--ADD Blood Group Type FORM-->
    <div class="col-xs-6">
      <h3>Find  A Donor According to Blood Group</h3>


       <?
            findDonorBloodType();        /*CALL TO A FUNCTION*/
        
        ?>
        <form action="" method="post">
           
            <div class="form-group">
                <input type="text" class="form-control" name="text_blood_type">
            </div>
               
            
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="search_blood_type" value="Search by Blood Type">
            </div>
        </form>
    </div>

    <!--END OF ADD Blood Group TypeFORM-->