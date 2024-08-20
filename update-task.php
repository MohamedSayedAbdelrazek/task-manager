
<?php

 include_once('config/constants.php');
 if(!(isset($_GET['task_id'])))
 {
    header('location:'.SITEURL);
 }
 else
 {
    $task_id=$_GET['task_id'];
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        <?php include_once('partials/navbar.php');?>
        <h2>Update Task</h2>
</br>
        <?php
        $sql="SELECT * FROM tbl_tasks WHERE task_id=$task_id";
        $res=mysqli_query($conn,$sql);
        if($res) {
            $count=mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $task_name=$row['task_name'];
                $task_description=$row['task_description'];
                $list_id=$row['list_id'];
                $priority=$row['priority'];
                $deadline=$row['deadline'];
                ?>
                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Task Name : </td>
                            <td><input type="text" name="task_name" value="<?php echo $task_name;?>"></td>
                        </tr>
                        <tr>
                            <td>Task Description : </td>
                            <td>  <textarea name="task_description"><?php echo $task_description;?></textarea></td>
                        </tr>
                        <tr>
                            <td>List Name : </td>
                            <td>
                            <select name="list_id">
                                <?php
                                $sql2="SELECT * FROM tbl_lists";
                                $res2=mysqli_query($conn,$sql2);
                                if($res2){
                                    $count=mysqli_num_rows($res2);
                                    if($count>0) {
                                       while($row=mysqli_fetch_assoc($res2)) {
                                        ?>
                                        <option <?php if($row['list_id']==$list_id) {echo "selected";}?> value="<?php echo $row['list_id'];?>"><?php echo $row['list_name'];?></option>
                                        <?php
                                       }
                                    }
                                    else {
                                       ?>
                                        <option value="0">None</option>
                                       <?php
                                    }
                                }
                                ?>
                            </select>
                            </td>
                        </tr>
                        <tr> 
                            <td>Priority : </td>
                            <td>
                                <select name="priority">
                                    <option value="high"<?php if($priority=='high'){echo "selected";}?>>High</option>
                                    <option value="medium"<?php if($priority=='medium'){echo "selected";}?>>Medium</option>
                                    <option value="low" <?php if($priority=='low'){echo "selected";}?>>Low</option>
                                </select>
                            </td>
                        </tr>
                        <tr><td>Deadline : </td> <td><input type="date" name="deadline" value="<?php echo $deadline;?>"></td></tr>
                        <tr><td><input type="submit" value="submit" class="btn-primary" name="submit"></td></tr>
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

                    $sql3="UPDATE tbl_tasks SET 
                    task_name='$task_name',
                    task_description='$task_description',
                    list_id='$list_id',
                    priority='$priority',
                    deadline='$deadline'
                     WHERE task_id = '$task_id'";

                    $res3=mysqli_query($conn,$sql3);

                    if($res3) {
                        $_SESSION['update']="<div class='success'>Task Updated Successfully.</div>";
                        header('location:'.SITEURL);
                    }
                    else {
                        $_SESSION['update']="<div class='error'>Failed To Update Task.</div>";
                        header('location:'.SITEURL.'update-task.php');
                    }
                }
                ?>
                <?php
            }
            else {
                header('location:'.SITEURL);
            }
        }
        else {
            header('location:'.SITEURL);
        }
        ?>
    </div>
</body>
</html>