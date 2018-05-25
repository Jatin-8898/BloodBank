
<?php 
    $users_per_page = 3;
?>

        
<!--VIEW ALL POSTS SECTION -->
         <div class="col-xs-12">
                    <table class="table table-bordered table-hover table-responsive">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Image</th>
                            
                            
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
                    $limit_start = ($page * $users_per_page) - $users_per_page;
                    
                }            
                    
                    
            $query = "SELECT * FROM users";  
                    
                
            $total_user_query = mysqli_query($connection, $query);
            $total_user_count = mysqli_num_rows($total_user_query);
            $query = "SELECT * FROM users LIMIT $limit_start, $users_per_page";                        

            
            $select_all_users_query = mysqli_query($connection,$query);    
        
                        
            /*FOR COUNT VARIABLE TO ROUND OFF THE USERS IF 3.5 THEN 4*/        
                $count = ceil($total_user_count/$users_per_page);
                        
                
            while($row = mysqli_fetch_assoc($select_all_users_query)){   
                $user_id = $row['user_id'];                         //fetching the detail from the db row
                $user_name = $row['user_name'];                 //n putting it in variable
                $user_firstname = $row['user_firstname'];                   //note variable name should be same as in db
                $user_lastname = $row['user_lastname'];       //thanks
                $user_email = $row['user_email'];
                $user_role = $row['user_role'];
                $user_image = $row['user_image'];


                echo "<tr>";                                        //displaying al the details from the db in the tr ie table row
                echo "<td>$user_id</td>";
                echo "<td>$user_name</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>$user_role</td>";
                echo "<td><img src='images/users/$user_image' class='img-rounded img-responsive' width='80px'</td>";
                
                 
    
                echo "<td><a data-toggle='tooltip' title='Delete' class='btn btn-danger del-tooltip' href = 'users.php?delete=$user_id'><span class = 'fa fa-trash'></span></a></td>";
                echo "<td><a class='btn btn-primary edit-tooltip' data-toggle='tooltip' title='Edit' href = 'users.php?source=edit_user&edit_id=$user_id'><span class = 'fa fa-pencil'></span></a></td>";

                
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
                                echo "<li><a class='active-page' href='users.php?page=$i'>$i</a></li>"; //for active page css also we made

                            }else{
                                echo  "<li><a href='users.php?page=$i'>$i</a></li>";
                            }
                        }    
                    ?>
                </ul>        
                    
                    
                    
            <!--CODE TO MAKE ADMIN-->        
            <?php
                if(isset($_GET['make_admin'])){
                    $make_admin_id = $_GET['make_admin'];
                    $query = "UPDATE users SET user_role='admin' WHERE user_id=$make_admin_id";
                    
                    $make_admin_query = mysqli_query($connection,$query);
                    confirmQuery($make_admin_query);
                    header("Location: users.php");
                }
             ?>        
            
            
            <!--CODE TO DELETE-->        
            <?php
                if(isset($_GET['delete'])){
                    $delete_user_id = $_GET['delete'];
            
                    /*DELETE QUERY*/
                    $query = "DELETE FROM users WHERE user_id = {$delete_user_id}";
                    $delete_query = mysqli_query($connection,$query);
                    confirmQuery($delete_query);
                    header("Location: users.php");
                }
             ?>
              
              
               
               
               
                </div>
                <!--END OF VIEW ALL POSTS SECTION -->
                                   
