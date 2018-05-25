            <!--AVAILABLE & INSERTED CATEGORIES-->
                <div class="col-xs-12">
                    <table class="table table-bordered table-hover table-striped">
                        <tr class="info">
                            <th>ID</th>
                            <th>Blood Group Type</th>
                            <th>Stock</th>
                        </tr>
                        <tbody>
    <?php   
            $query = "SELECT * FROM blood_stock";  
            $select_all_blood_stocks_query = mysqli_query($connection,$query);        //it will keep alll the rows

            while($row = mysqli_fetch_assoc($select_all_blood_stocks_query)){         
                echo "<tr>";
                
                $blood_stock_id = $row['blood_stock_id'];
                $blood_id = $row['blood_id'];         //this is used fot getting the id from db
                $blood_stock = $row['blood_stock'];
                
                /************************
                USED TO PUT THE BLOOD GROUP TYPE INSTEAD OF THE ID
                **************************/
                $query = "SELECT * FROM blood_groups WHERE blood_id = $blood_id";  
                    $select_all_blood_query = mysqli_query($connection,$query); //it will keep alll the rows

                    confirmQuery($select_all_blood_query);
                    if($row = mysqli_fetch_assoc($select_all_blood_query)){  
                        $blood_id_type = $row['blood_type'];
                    }
                
                
                
                echo "<td>$blood_stock_id</td>";                
                echo "<td>$blood_id_type</td>";                
                echo "<td>$blood_stock</td>";
                
                echo"</tr>";
            }

    ?>
                        </tbody>
                    </table>
                </div>