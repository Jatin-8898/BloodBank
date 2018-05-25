<?php 
    $donors_per_page = 2;
?>
        <!--VIEW ALL DONORS SECTION -->
         <div class="col-xs-12">
                    <!--FOR DIFFERENT TYPES OF SORTINGS-->
                    <form action="" method="post">
                    <table class="table table-bordered table-hover table-responsive">
                        
                   
                       
                       <!--FOR THE NORMAL COLUMNS TO BE DISPLAYED-->
                        <tr>
                            <th>ID</th>
                            <th>Blood Type</th>
                            <!--<th>UserName</th>-->
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
                    $limit_start = ($page * $donors_per_page) - $donors_per_page;
                    
                }             
                        
            $query = "SELECT * FROM donors WHERE deleted = 0";  
                        
            $total_donor_query = mysqli_query($connection, $query);
            $total_donor_count = mysqli_num_rows($total_donor_query);
            $query = "SELECT * FROM donors WHERE deleted = 0 LIMIT $limit_start, $donors_per_page";                        

            
            $select_all_donors_query = mysqli_query($connection,$query);    
        
                        
                        
            /*FOR COUNT VARIABLE TO ROUND OFF THE DONORS IF 3.5 THEN 4*/        
            $count = ceil($total_donor_count/$donors_per_page);
                        
            while($row = mysqli_fetch_assoc($select_all_donors_query)){   
                $donor_id = $row['donor_id'];
                
                $donor_blood_type = $row['donor_blood_type'];
                $donor_username = $row['donor_username'];

                $donor_fname = $row['donor_fname'];
                $donor_lname = $row['donor_lname'];
                $donor_age = $row['donor_age'];

                $donor_gender = $row['donor_gender'];
                $donor_weight = $row['donor_weight'];

                $donor_city = $row['donor_city'];
                $donor_email = $row['donor_email'];
                $donor_phone = $row['donor_phone'];
                
                $donor_image = $row['donor_image'];                
                $donor_address = $row['donor_address'];
                echo "<tr>";                                        //displaying al the details from the db in the tr ie table row
                
                    echo "<td>$donor_id</td>";
                    echo "<td>$donor_blood_type</td>";
                    /*echo "<td>$donor_username</td>";*/
                    echo "<td>$donor_fname</td>";
                    echo "<td>$donor_lname</td>";
                    echo "<td>$donor_age</td>";
                    echo "<td>$donor_gender</td>";
                    echo "<td>$donor_weight</td>";
                    echo "<td>$donor_city</td>";
                    echo "<td>$donor_email</td>";
                    echo "<td>$donor_phone</td>";

                    echo "<td><img class='img-responsive' src = 'images/users/$donor_image' height='100px' alt='post image'></td>";        //giving dynamic path for img
                    echo "<td>$donor_address</td>";
                
                    $donor_id = $row['donor_id'];
                    echo "<td><a data-toggle='tooltip' title='Delete' class='btn btn-danger del-tooltip remove' data-donor-id=$donor_id   ><span class = 'fa fa-times'></a></td>";
                
                
                    echo "<td><a data-toggle='tooltip' title='Edit' class='btn btn-primary edit-tooltip' href = 'donors.php?source=edit_donor&p_id=$donor_id'><span class = 'fa fa-pencil'></a></td>";
                
//                echo "<td><a class='btn btn-edit' title='test'></td>";
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
                                echo "<li><a class='active-page' href='donors.php?page=$i'>$i</a></li>"; //for active page css also we made

                            }else{
                                echo  "<li><a href='donors.php?page=$i'>$i</a></li>";
                            }
                        }    
                    ?>
                </ul> 
                    
                    
                    
             </form>    <!--END OF FORM TAG-->
            
            <?php
             
                if(isset($_GET['delete'])){
                    ///echo "<br>SUCCESSFULL DELETE<br>";
                    $delete_donor_id = $_GET['delete'];
                    $current_date = date("Y-m-d h:i:sa");
                    
                    $query = "UPDATE donors SET deleted = 1, deleted_at = '$current_date' WHERE donor_id = {$delete_donor_id}";
                    $delete_query = mysqli_query($connection,$query);
                    confirmQuery($delete_query);
                    header("Location: donors.php");
                }
             
             ?>
             
             
             
            
                </div>
         <!--END OF VIEW ALL DONORS SECTION -->
                                   