<?php 
    include('config/constants.php');
    //Get the listid from URL
    
    $list_id_url = $_GET['list_id'];
?>

<html>
    <head>
        <title>Task Manager</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
    </head>
    
    <body>
        
        <div class="container">
        
        <?php require_once('partials/navbar.php'); ?>
       
           
            
            
            
            <table class="tbl-full">
            
                <tr>
                    <th>S.N.</th>
                    <th>Task Name</th>
                    <th>Priority</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
                
                <?php 
                
                   
                    $sql = "SELECT * FROM tbl_tasks WHERE list_id=$list_id_url";
                    
                    //Execute Query
                    $res = mysqli_query($conn, $sql);
                    
                    if($res==true)
                    {
                        
                        $count_rows = mysqli_num_rows($res);
                        
                        if($count_rows>0)
                        {
                            
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $task_id = $row['task_id'];
                                $task_name = $row['task_name'];
                                $priority = $row['priority'];
                                $deadline = $row['deadline'];
                                ?>
                                
                                <tr>
                                    <td>1. </td>
                                    <td><?php echo $task_name; ?></td>
                                    <td><?php echo $priority; ?></td>
                                    <td><?php echo $deadline; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL; ?>update-task.php?task_id=<?php echo $task_id; ?>" class="btn-primary">Update </a>
                                    
                                    <a href="<?php echo SITEURL; ?>delete-task.php?task_id=<?php echo $task_id; ?>" class="btn-secondary">Delete</a>
                                    </td>
                                </tr>
                                
                                <?php
                            }
                        }
                        else
                        {
                           
                            ?>
                            
                            <tr>
                                <td colspan="5"><div class='error'>No Tasks added on this list.</div></td>
                            </tr>
                            
                            <?php
                        }
                    }
                ?>
                
                
            
            </table>
        
       
        
        </div>
    </body>
    
</html>