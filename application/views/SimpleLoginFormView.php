<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo $title ?>
    </title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url();?>assets/css/SimpleFormCSS.css" />
</head>
<body>
<div id = "wrapper">
    <h3>Enter the system</h3>
    <p>It is necesarry to login in Your account in order to access the product database</p>
    <div class = "register-form-wrapper">
        <p>ARE YOU NEW? REGISTER</p>
        <form method = "post" action = "<?php echo base_url();?>BasicShopController/RegInsertIntoDB">
            <input type="text" name = "userName" placeholder = "User name"
                   required = "true" pattern = "[A-Za-z0-9_]+" title = "Letters, numbers and _" />
            <input type = "email" name = "email" placeholder = "Email" required = "true"
                   pattern = "[A-Za-z0-9_]+@[A-Za-z.]{2,5}\.[A-Za-z.]{2,5}"/>
            <input type = "password" name = "pass" required = "true" pattern = "[A-Za-z0-9_]+"
                   title = "Letters, numbers and _" placeholder = "Password"/>
            <input type = "password" name = "passConfirm" required = "true" pattern = "[A-Za-z0-9_]+"
                   title = "Letters, numbers and _" placeholder = "Confirm Password"/>
            <input type = "submit" value = "Register" class = "register-submit" />
        </form>
    </div>
    <div class = "login-form-wrapper">
        <p>ALREADY REGISTERED? LOGIN</p>
        <form method = "post" action = "<?php echo base_url();?>BasicShopController/login">
            <input type = "text" placeholder = "User Name" name = "userNameLogin"
                   required = "true" pattern = "[A-Za-z0-9_]+" title = "Letters, numbers and _" />
            <input type = "password" name = "passLogin" required = "true" pattern = "[A-Za-z0-9_]+"
                   title = "Letters, numbers and _" placeholder = "Password"/>
            <input type = "checkbox" class = "remember-me"/>
            <p class = "remember-me-paragraph">Remember me?</p>
            <input type = "submit" value = "Login" class = "login-submit" />
        </form>
    </div>
</div>
</body>
</html>