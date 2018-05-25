<!--VIEW ALL DONORS SECTION -->

         <div class="col-xs-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>ID</th>
                            <th>Blood Type</th>
                            <th>UserName</th>
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
                        </tr>
                    <tbody>

        <?php   
            $query = "SELECT * FROM donors WHERE donor_blood_type = '$text_blood_type'";  
            $select_all_donors_query = mysqli_query($connection,$query);    
                        
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
                    echo "<td>$donor_username</td>";
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
                
                    
                echo "</tr>";
            }      
    ?>
                    </tbody>
                    </table>
                    
    
        