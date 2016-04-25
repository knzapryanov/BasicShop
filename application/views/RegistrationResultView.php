<?php
    if($isUserNameTaken == true && $isEmailTaken == true){
        echo 'This user name is taken! Choose another one !';
        echo '<br>';
        echo 'This email is taken! Choose another one !';
        ?>
        <br>
        <a href="<?php echo base_url() ?>">Return to registration page.</a>
        <?php
    }
    elseif($isUserNameTaken == true && $isEmailTaken == false){
        echo 'This user name is taken! Choose another one !';
        ?>
        <br>
        <a href="<?php echo base_url() ?>">Return to registration page.</a>
        <?php
    }
    elseif($isUserNameTaken == false && $isEmailTaken == true){
        echo 'This email is taken! Choose another one !';
        ?>
        <br>
        <a href="<?php echo base_url() ?>">Return to registration page.</a>
        <?php
    }
    else{
        echo 'Successful registration !';
        ?>
        <br>
        <a href="<?php echo base_url() ?>">Return to registration page.</a>
        <?php
    }
?>