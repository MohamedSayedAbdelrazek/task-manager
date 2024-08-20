<?php 

include('config/constants.php');

?>

<html>
    <head>
        <title>Manage Lists</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
    </head>
    
    <body>
        
        <div class="container">
            <?php require_once('partials/navbar.php'); ?>
        <h2>Manage Lists Page</h2>
</br>
        <p>
            <?php 
            
               
                if(isset($_SESSION['add']))
                {
                    
                    echo $_SESSION['add'];
                    echo "</br>"; echo "</br>";
                    unset($_SESSION['add']);
                }
                
             
                
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    echo "</br>"; echo "</br>";
                    unset($_SESSION['delete']);
                }
                
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    echo "</br>"; echo "</br>";
                    unset($_SESSION['update']);
                }
                
               
            
            
            ?>
        </p>
        
        <!-- Table to display lists starts here -->
        <div class="all-lists">
            
            <a class="btn-primary" href="<?php echo SITEURL; ?>add-list.php">Add List</a>
            </br></br>
            <table class="tbl-half">
                <tr>
                    <th>S.N.</th>
                    <th>List Name</th>
                    <th>Actions</th>
                </tr>
                
                
                <?php 
                
                   
                    
                  
                    $sql = "SELECT * FROM tbl_lists";
                    
                   
                    $res = mysqli_query($conn, $sql);
                    
                  
                    if($res==true)
                    {
                        
                        $count_rows = mysqli_num_rows($res);
                        
                        
                        $sn = 1;
                        
                       
                        if($count_rows>0)
                        {
                           
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                               
                                $list_id = $row['list_id'];
                                $list_name = $row['list_name'];
                                ?>
                                
                                <tr>
                                    <td><?php echo $sn++; ?>. </td>
                                    <td><?php echo $list_name; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>update-list.php?list_id=<?php echo $list_id; ?>" class="btn-primary">Update</a> 
                                        <a href="<?php echo SITEURL; ?>delete-list.php?list_id=<?php echo $list_id; ?>" class="btn-secondary">Delete</a>
                                    </td>
                                </tr>
                                
                                <?php
                                
                            }
                            
                            
                        }
                        else
                        {
                            //No Data in Database
                            ?>
                            
                            <tr>
                                <td colspan="3">No List Added Yet.</td>
                            </tr>
                            
                            <?php
                        }
                    }
                
                ?>
                
                
            </table>
        </div>
        <!-- Table to display lists ends here -->
        </div>
    </body>
</html>