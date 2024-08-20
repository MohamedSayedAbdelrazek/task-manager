<?php include_once('config/constants.php');?>
<?php
if(isset($_GET['list_id'])):
    $list_id=$_GET['list_id'];
$sql="DELETE FROM tbl_lists WHERE list_id=$list_id";
$res=mysqli_query($conn,$sql);
if($res):
    $_SESSION['delete']="<div class='success'>List Deleted Successfully.</div>";
    header('location:'.SITEURL.'manage-list.php');
else:
    $_SESSION['delete']="<div class='error'>Failed To Delete List.</div>";
    header('location:'.SITEURL.'manage-list.php');
endif;
else:
    header('location:'.SITEURL.'manage-list.php');
endif;
?>