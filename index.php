<?php require_once('config/constants.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Task Manager</title>
   
</head>
<body>
    <div class="container">
        <?php
         require_once('partials/navbar.php');
        ?>
        <h2>Manage Tasks Page</h2>
        </br>
        <a href="add-task.php" class="btn-primary">Add task</a>
        <br><br>
        <?php
        if (isset( $_SESSION['add']))
        {
            echo  $_SESSION['add'];
            unset ( $_SESSION['add']);
        }        
        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }
        if(isset($_SESSION['update'])) {
            echo  $_SESSION['update'];
            unset( $_SESSION['update']);
        }
        ?>
        </br>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Task Name</th>
                <th>Priority</th>
                <th>Deadline</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql="SELECT * FROM tbl_tasks";
            $res=mysqli_query($conn,$sql);
            if($res) :
                $count=mysqli_num_rows($res);
                if($count>0):
                    $sn=1;
                    while($row=mysqli_fetch_assoc($res)):
                        $task_id=$row['task_id'];
                        $task_name=$row['task_name'];
                        $priority=$row['priority'];
                        $deadline=$row['deadline'];
                        ?>
                        <tr>
                            <td><?php echo $sn++;?></td>
                            <td><?php echo $task_name;?></td>
                            <td><?php echo $priority?></td>
                            <td><?php echo $deadline;?></td>
                            <td>
                                <a href="<?php echo SITEURL;?>update-task.php?task_id=<?php echo $task_id;?>" class="btn-primary">Update</a>
                                <a href="<?php echo SITEURL;?>delete-task.php?task_id=<?php echo $task_id;?>" class="btn-secondary">Delete</a>
                            </td>
                        </tr>
                        <?php
                    endwhile;
                else:
                    ?>
                    <tr>
                        <td colsapan="4"><div class="error">Tasks Not Found.</div></td>
                    </tr>
                    <?php
                endif;
            else : 
                header('location:'.SITEURL);
                endif;
            ?>
        </table>
    </div>
</body>
</html>