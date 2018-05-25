 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">JATIN</a>
            </div>
            
            
            
            
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">  
               <li>
                   <a href="#">HOME SITE</a>
               </li>              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo "$username"?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a href="../includes/changePassword.php"><i class="fa fa-edit"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            
            
            
            
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    
            
              
                        
                            
                    <li <?php if($page == "donors") echo "class='active'";?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-users"></i>  Donors <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="donors.php">View All Donors</a>
                            </li>
                            <li>
                                <a href="donors.php?source=add_donor"> Add Donors</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li <?php if($page == "blood-groups") echo "class='active'";?>>
                        <a href="blood-groups.php"><i class="fa fa-heart"></i> Blood Groups</a>
                    </li>

                    <li <?php if($page == "blood-stocks") echo "class='active'";?>>
                        <a href="blood-stocks.php"><i class="fa fa-check"></i> Blood Stock</a>
                    </li>
                   
                    
                       
                    <li <?php if($page == "blood-camp") echo "class='active'";?>>
                        <a href="blood-camp.php"><i class="fa fa-university"></i>  Blood Camp</a>
                    </li>
                    
                    
                    <li <?php if($page == "find-donors") echo "class='active'";?>>
                        <a href="find-donors.php"><i class="fa fa-user"></i> Find the Donors</a>
                    </li>
                    
                    
            
                    <li <?php if($page == "seeker") echo "class='active'";?>>
                   <a href="javascript:;" data-toggle="collapse" data-target="#demo3"><i class="fa fa-fw fa-arrows-v"></i> Seeker<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo3" class="collapse">
                            <li>
                                <a href="seekers.php">View All Seeker</a>
                            </li>
                            <li>
                                <a href="seekers.php?source=add_seeker">Add Seeker</a>
                            </li>
                        </ul>
                    </li>  
                
                     <li <?php if($page == "users") echo "class='active'";?>>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-user"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo4" class="collapse">
                            <li>
                                <a href="users.php">View All User</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user"> Add User</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="contact.php"><i class="fa fa-phone"></i> Contact us</a>
                    </li>


                                
                    </ul>
            </div>
        </nav>
