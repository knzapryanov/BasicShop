<!DOCTYPE html>
<html>
<head>
    <title>
        FormData
    </title>
    <style>
        input{
            display: block;
            margin-top: 5px;
        }
        span{

        }
    </style>
</head>
<body>
    <form method="post" action="<?php echo base_url()?>FormDataController/submitData">
        <input type="text" name="name" placeholder="Name.."/>
        <input type="text" name="age" placeholder="Age.."/>
        <input type="radio" name="gender" value="male" style="display: inline">Male<br>
        <input type="radio" name="gender" value="female" style="display: inline">Female
        <input type="submit" value="Submit"/>
    </form>
</body>
</html>