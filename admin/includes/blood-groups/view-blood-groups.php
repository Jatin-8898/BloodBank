            <!--AVAILABLE & INSERTED CATEGORIES-->
        <div class="col-xs-12">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>ID</th>
                    <th>Blood Group Type</th>
                    <th>Edit</th>
                </tr>
                <tbody>
        <?php   
            $query = "SELECT * FROM blood_groups";  
            $select_all_blood_groups_query = mysqli_query($connection,$query);        //it will keep alll the rows
            while($row = mysqli_fetch_assoc($select_all_blood_groups_query)){         
                echo "<tr>";
                $blood_id = $row['blood_id'];
                $blood_type = $row['blood_type'];         //this is used fot getting the title from db
                echo "<td>$blood_id</td>";
                echo "<td>$blood_type</td>";
               
                echo "<td><a class='btn btn-primary edit-tooltip' data-toggle='tooltip' title='Edit' href = 'blood-groups.php?edit=$blood_id'><span class = 'fa fa-pencil'></a></td>";
                echo"</tr>";
            }

            if(isset($_GET['delete'])){
                $delete_id = $_GET['delete'];
                $query = "DELETE FROM blood_groups WHERE blood_id = $delete_id";
                $delete_query = mysqli_query($connection,$query);
                header("Location: blood-groups.php");

            }                
        ?>

                    </tbody>
                </table>
            </div>

                       
                      
