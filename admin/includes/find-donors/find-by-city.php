<!--ADD Blood Group Type FORM-->
    <div class="col-xs-6">
      <h3>Find  A Donor in City</h3>


       <?
            findDonorCity();        /*CALL TO A FUNCTION*/
        ?>
       
       
        <form action="" method="post">
           
            <div class="form-group">
                <input type="text" class="form-control" name="text_search_city">
            </div>
               
            
            <div class="form-group">
                <input class="btn btn-success" type="submit" name="btn_search_city" value="Search by City">
            </div>
        </form>
    </div>

    <!--END OF ADD Blood Group TypeFORM-->