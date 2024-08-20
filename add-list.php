<?php 
    include('config/constants.php');
?>

<html>
    <head>
        <title>Add List</title>
        <link rel="stylesheet" href="<?php echo SITEURL; ?>css/style.css" />
    </head>
    
    <body>
        
        <div class="container">
            <?php include ('partials/navbar.php')?>
            <h2>Add List Page</h2>
        <p>
        <?php 
        
            
            if(isset($_SESSION['add_fail']))
            {
                
                echo $_SESSION['add_fail'];
               
                unset($_SESSION['add_fail']);
            }
        
        ?>
        </p>
        
       
        <form method="POST" action="">
            
            <table class="tbl-half">
                <tr>
                    <td>List Name: </td>
                    <td><input type="text" name="list_name" placeholder="Type list name here" required="required" /></td>
                </tr>
                <tr>
                    <td>List Description: </td>
                    <td><textarea name="list_description" placeholder="Type List Description Here"></textarea></td>
                </tr>
                
                <tr>
                    <td><input class="btn-primary btn-lg" type="submit" name="submit" value="SAVE" /></td>
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
        
        
        
        $sql = "INSERT INTO tbl_lists SET 
            list_name = '$list_name',
            list_description = '$list_description'
        ";
        
        
        $res = mysqli_query($conn, $sql);
        
       
        if($res==true)
        {
           
            $_SESSION['add'] = "<div class='success'>List Added Successfully.</div>";
            
          
            header('location:'.SITEURL.'manage-list.php');
            
            
        }
        else
        {
           
            $_SESSION['add_fail'] = "<div class='error'>Failed to Add List</div>";
            header('location:'.SITEURL.'add-list.php');
        }
        
    }

?>
