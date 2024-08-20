<?php require_once('config/constants.php');?>
<?php
if(isset($_GET['task_id']))
{
    $task_id=$_GET['task_id'];
    $sql="DELETE FROM tbl_tasks WHERE task_id=$task_id";
    $res=mysqli_query($conn,$sql);
    if($res) {
        $_SESSION['delete']="<div class='success'>Task Deleted Successfully.</div>";
        header('location:'.SITEURL);
    }
    else {
        $_SESSION['delete']="<div class='error'>Failed To Delete Task.</div>";
        header('location:'.SITEURL);
    }
}
else {
    header('location:'.SITEURL);
}

?>