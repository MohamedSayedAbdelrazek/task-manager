<nav>
        <h1 class="h1fornav">Task Manager</h1>
            <ul class="none">
                <li><a href="index.php">Home</a></li>
                <li><a href="list-task.php?list_id=1">To Do</a></li>
                <li><a href="list-task.php?list_id=2">Doing</a></li>
                <li><a href="list-task.php?list_id=3">Done</a></li>
                <li><a href="list-task.php?list_id=7">Shopping</a></li>
                <li><a href="manage-list.php">Manage Lists</a></li>
            </ul>
            <?php
            if(isset($need_button)):
                ?>
                </br></br>
                  <a href="<?php echo SITEURL;?>add-task.php" class="btn-primary"><?php echo $button_name;?></a>
                <?php
                endif;
            ?>
          
</br></br>
</nav>