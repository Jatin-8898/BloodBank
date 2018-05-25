 <!--ADD of EDIT CATEGORY-->
    <div class="col-xs-6">

       <?php

        editBloodGroup();             //call to a func
        $edit_blood_type = fetchBloodTypeForEdit();      //call to a func
        $edit_blood_stock = fetchBloodStockForEdit();      //call to a func

        ?>

        <?php
            if(isset($edit_blood_type)){     //this is will be visible wen edit btn is pressed
        ?>        
        <h3>Edit Blood Group</h3>                    <!--this title will also come on page-->
            <form action="" method="post">
                
            <div class="form-group">
                
                <label for="blood_type">Blood Group Type</label>
                <select name="blood_type" class="form-control" id="blood_type">
                    <option value="O+" <?php if($edit_blood_type == "O+") echo "selected"; ?>>O+</option>
                    <option value="O-" <?php if($edit_blood_type == "O-") echo "selected"; ?>>O-</option>
                    <option value="A+" <?php if($edit_blood_type == "A+") echo "selected"; ?>>A+</option>
                    <option value="A-" <?php if($edit_blood_type == "A-") echo "selected"; ?>>A-</option>
                    <option value="B+" <?php if($edit_blood_type == "B+") echo "selected"; ?>>B+</option>
                    <option value="B-" <?php if($edit_blood_type == "B-") echo "selected"; ?>>B-</option>
                    <option value="AB+" <?php if($edit_blood_type == "AB+") echo "selected"; ?>>AB+</option>
                    <option value="AB-" <?php if($edit_blood_type == "AB-") echo "selected"; ?>>AB-</option>
                </select>
            </div>
               
            <div class="form-group">               
                <label for="blood_stock">Blood Stock</label>
                <input type="number" class="form-control" name="blood_stock" value="<?php echo $edit_blood_stock;?>">
            </div>
               
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_submit" value="Edit Blood Type">
                </div>
            </form>
        <?php
                }// end of if
        ?>
         
    </div>

    <!--END OF EDIT CATEGORY FORM-->