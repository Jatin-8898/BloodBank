<?php 
    $seekers_per_page = 2;
?>
    <!--VIEW ALL seeker SECTION -->
         <div class="col-xs-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <!--FOR THE NORMAL COLUMNS TO BE DISPLAYED-->
                        <tr>
                        
                            <th>ID</th>
                            <th>Blood Type</th>
<!--                            <th>UserName</th>-->
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Weight</th>
                            <th>City</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Address</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    <tbody>
        <?php   
                 if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    
                }else{
                    $page=1;
                    
                }
                if($page=="" || $page == 1){
                    $limit_start = 0;
                    
                }else{
                    $limit_start = ($page * $seekers_per_page) - $seekers_per_page;
                    
                } 
                        
            $query = "SELECT * FROM seekers WHERE deleted = 0";  
                        
            $total_donor_query = mysqli_query($connection, $query);
            $total_donor_count = mysqli_num_rows($total_donor_query);
            $query = "SELECT * FROM seekers WHERE deleted = 0 LIMIT $limit_start, $seekers_per_page";                        
            $select_all_seekers_query = mysqli_query($connection,$query);    
        
                        
                        
            /*FOR COUNT VARIABLE TO ROUND OFF THE DONORS IF 3.5 THEN 4*/        
            $count = ceil($total_donor_count/$seekers_per_page);            
                        
                        
                        
                        
                        
                        
                        
            while($row = mysqli_fetch_assoc($select_all_seekers_query)){   
                 $seeker_id = $row['seeker_id'];
                
                $seeker_blood_type = $row['seeker_blood_type'];
                $seeker_username = $row['seeker_username'];

                $seeker_fname = $row['seeker_fname'];
                $seeker_lname = $row['seeker_lname'];
                $seeker_age = $row['seeker_age'];

                $seeker_gender = $row['seeker_gender'];
                $seeker_weight = $row['seeker_weight'];

                $seeker_city = $row['seeker_city'];
                $seeker_email = $row['seeker_email'];
                $seeker_phone = $row['seeker_phone'];
                
                $seeker_image = $row['seeker_image'];                
                $seeker_address = $row['seeker_address'];
                

                echo "<tr>";                                        //displaying al the details from the db in the tr ie table row

                
                echo "<td>$seeker_id</td>";
                echo "<td>$seeker_blood_type</td>";
                /*echo "<td>$seeker_username</td>";*/
                echo "<td>$seeker_fname</td>";
                echo "<td>$seeker_lname</td>";
                echo "<td>$seeker_age</td>";
                echo "<td>$seeker_gender</td>";
                echo "<td>$seeker_weight</td>";
                echo "<td>$seeker_city</td>";
                echo "<td>$seeker_email</td>";
                echo "<td>$seeker_phone</td>";

                echo "<td><img class='img-responsive' src = 'images/users/$seeker_image' height='100px' alt='post image'></td>";//giving dynamic path for img
                echo "<td>$seeker_address</td>";

                echo "<td><a data-toggle='tooltip' title='Delete' class='btn btn-danger del-tooltip remove-seeker' data-seeker-id=$seeker_id ><span class = 'fa fa-times'></a></td>";
                
                echo "<td><a data-toggle='tooltip' title='Edit' class='btn btn-primary edit-tooltip' href = 'seekers.php?source=edit_seeker&p_id=$seeker_id'><span class = 'fa fa-pencil'></a></td>";
            echo "</tr>";
            }      
    ?>
                    </tbody>
                    </table>
                    <!--FOR DISPLAYING PAGINATION-->        
                <ul class="pager">
                    <?php
                        for($i=1;$i<=$count;$i++){    //just a simppple for looop
                            if($i == $page){
                                echo "<li><a class='active-page' href='seekers.php?page=$i'>$i</a></li>"; //for active page css also we made

                            }else{
                                echo  "<li><a href='seekers.php?page=$i'>$i</a></li>";
                            }
                        }    
                    ?>
                </ul> 
            <?php
             
                if(isset($_GET['delete'])){
                    $delete_seeker_id = $_GET['delete'];
                    $query = "DELETE FROM seekers WHERE seeker_id = {$delete_seeker_id}";
                    $delete_query = mysqli_query($connection,$query);
                    confirmQuery($delete_query);
                    header("Location: seekers.php");
                }
             
             ?>
                </div>
         <!--END OF VIEW ALL seekerS SECTION -->
                                   