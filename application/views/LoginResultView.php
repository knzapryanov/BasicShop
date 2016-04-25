<?php
/*if($isCurrentUserRegistered){
    echo 'Login successful!';
    echo '<br>';
    echo 'Enjoy this great website! HAHAHAHAHAHahhahah it\'s a trap.';
}*/
if($isUserNameRegistered == false && $isPasswordRight){
    echo 'Wrong Username!';
    ?>
    <br>
    <a href="<?php echo base_url() ?>">Return to start page.</a>
    <?php
}
elseif($isUserNameRegistered && $isPasswordRight == false){
    echo 'Wrong password!';
    ?>
    <br>
    <a href="<?php echo base_url() ?>">Return to start page.</a>
    <?php
}
elseif($isUserNameRegistered == false && $isPasswordRight == false){
    echo 'Wrong Username and Password!';
    ?>
    <br>
    <a href="<?php echo base_url() ?>">Return to start page.</a>
    <?php
}
?>