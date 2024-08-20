<?php 

    include('config/constants.php'); 
    if(isset($_GET['list_id']))
    {
       
        $list_id = $_GET['list_id'];
        
        $sql = "SELECT * FROM tbl_lists WHERE list_id=$list_id";
        
      
        $res = mysqli_query($conn, $sql);
        
        
        if($res==true)
        {
           
            $row = mysqli_fetch_assoc($res); 
            
          
            $list_name = $row['list_name'];
            $list_description = $row['list_description'];
        }
        else
        {
            
            header('location:'.SITEURL.'manage-list.php');
        }
    }

?>




<html>

    <head>
        <title>Update List</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
    </head>
    
    <body>
        
        
        <div class="container">
        <?php include_once('partials/navbar.php')?>
       
        <h2>Update List Page</h2>
        
        <p>
            <?php 
             
                if(isset($_SESSION['update_fail']))
                {
                    echo $_SESSION['update_fail'];
                    unset($_SESSION['update_fail']);
                }
            ?>
        </p>
        
        <form method="POST" action="">
        
            <table class="tbl-half">
                <tr>
                    <td>List Name: </td>
                    <td><input type="text" name="list_name" value="<?php echo $list_name; ?>" required="required" /></td>
                </tr>
                
                <tr>
                    <td>List Description: </td>
                    <td>
                        <textarea name="list_description">
                            <?php echo $list_description; ?>
                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <td><input class=" btn-primary" type="submit" name="submit" value="UPDATE" /></td>
                </tr>
            </table>
            
        </form>
        
        </div>
        
    
    </body>

</html>


<?php 

    
    if(isset($_POST['submit']))
    {
        
     
        $list_name = $_POST['list_name'];
        $list_description = $_POST['list_description'];
        
     
        $sql2 = "UPDATE tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description' 
            WHERE list_id=$list_id
        ";
        
       
        $res2 = mysqli_query($conn, $sql2);
        
        
        if($res2==true)
        {
            $_SESSION['update'] = "<div class='success'>List Updated Successfully.</div>";
            header('location:'.SITEURL.'manage-list.php');
        }
        else
        {
            $_SESSION['update_fail'] = "<div class='error'>Failed to Update List</div>";
            header('location:'.SITEURL.'update-list.php?list_id='.$list_id);
        }
    }
?>
