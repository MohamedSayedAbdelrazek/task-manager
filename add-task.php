<?php require_once('config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="container">
      
        <h1 class="h1fornav">task manager</h1>
        
        <a href="<?php echo SITEURL;?>index.php" class="btn-secondary">Home</a>
</br>
        <h3>Add Task Page</h3>
        <?php
        if (isset( $_SESSION['add']))
        {
            echo  $_SESSION['add'];
            unset ( $_SESSION['add']);
        }        
        ?>
      <form method="POST">
      <table class="tbl-half">
            <tr>
                <td>Task Name: </td>
                <td><input type="text" name="task_name" placeholder="Type your Task Name" required="required"></td>
            </tr>
            <tr>
                <td>Task Description: </td>
                <td><textarea name="task_description" placeholder="Type Task Description"></textarea></td>
            </tr>
            <tr>
                <td>Select List: </td>
                <td>
                   <select name="list_id">
                    <?php
                    $sql='SELECT * FROM tbl_lists';
                    $res=mysqli_query($conn,$sql);

                    if($res==true):
                        $count=mysqli_num_rows($res);
                        if($count>0):
                            while($row=mysqli_fetch_assoc($res)):
                                $list_id = $row['list_id'];
                                $list_name = $row['list_name'];
                                ?>
                                <option value="<?php echo $list_id;?>"> <?php echo $list_name;?></option>
                                <?php
                            endwhile;
                        else:
                            //Display None as option
                            ?>
                            <option value="0">None</option>
                            <?php
                            endif;
                   else:
                    header('location:'.SITEURL.'index.php');
                    endif;
                    ?>
                   </select>
                </td>
            </tr>
            <tr>
                <td>Priority: </td>
                <td>
                    <select name="priority">
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                </select>
            </td>
            </tr>
            <tr>
                <td>Deadline</td>
                <td><input type="date" name="deadline"></td>
        </tr>
        <tr><td><input type="submit" value="Save" class="btn-primary" name="submit"></td></tr>
       </table>
      </form>
      <?php
      if(isset($_POST['submit']))
      {
        $task_name=$_POST['task_name'];
        $task_description=$_POST['task_description'];
        $list_id=$_POST['list_id'];
        $priority=$_POST['priority'];
        $deadline=$_POST['deadline'];

        $sql2="INSERT INTO tbl_tasks SET 
        task_name='$task_name',
        task_description='$task_description',
        list_id='$list_id',
        priority='$priority',
        deadline='$deadline'";

        $res2=mysqli_query($conn,$sql2);

        if($res2==true){
            $_SESSION['add']='<div class="success">Task Added Successfully.</div>';
            //Redirect to Homepage
            header('location:'.SITEURL);
        }
        else {
            $_SESSION['add']="<div class='error'>Failed To Add Task.</div>";
            header('location:'.SITEURL.'add-task.php');
        }
      }
      ?>
    </div>
</body>
</html>