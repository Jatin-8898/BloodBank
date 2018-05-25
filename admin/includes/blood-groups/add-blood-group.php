<!--ADD Blood Group Type FORM-->
    <div class="col-xs-6">
      <h3>Add Blood Group</h3>


        <?php
                addBloodGroup();      //call to a func    
        ?>
        <form action="" method="post">
           
            <div class="form-group">
                <label for="blood_type">Blood Group Type</label>
                <select name="blood_type" class="form-control" id="blood_type">
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
                <input class="btn btn-primary" type="submit" name="submit" value="Add Blood Type">
            </div>
        </form>
    </div>

    <!--END OF ADD Blood Group TypeFORM-->