<!DOCTYPE html>
<html lang="en">
<head>
<title>OFFICE COLLABORATOR</title>
    <meta charset="UTF-8" content="shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="style.css">   
</head>
<body>
    <marquee style="margin-top:-80px;padding-bottom:40px;"><h1 style="font-size:30px;font-family:Verdana">Welcome to TailorSoft</h1></marquee>
    <br><h2 style="font-size:25px;font-family:Verdana;margin-left: 34%;">OFFICE COLLABORATOR</h2>
    <br>
    <div class="login-form" style="margin:auto;">
        <h2>LOGIN PANEL</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Email" name="AdminEmail">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="AdminPassword">
            </div>
            <button type="submit" name="signin">LOGIN</button>
        </form>
    </div>
</body>
</html>
<?php
    require("conn.php");
?>
<?php
if(isset($_POST['signin']))
{
    $query="SELECT * FROM `project`.`admin` WHERE `Email` ='$_POST[AdminEmail]' AND `password`='$_POST[AdminPassword]'";
 
    $result=mysqli_query($con,$query);
    // echo ("<script>console.log($result)</script>");
    echo (mysqli_num_rows($result));
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $row=mysqli_fetch_assoc($result);
        $_SESSION['AdminLoginId']=$row['Name'];
        header("location: Admin Panel.php");
        //echo "correct";
    }
    else
    {
        echo"<script>alert('Incorrect password');</script>";
        //echo "incorrect";
    }
}
if(isset($_POST['signin']))
{
    $query="SELECT * FROM `project`.`employee` WHERE `email` ='$_POST[AdminEmail]' AND `password`='$_POST[AdminPassword]'";
 
    $result=mysqli_query($con,$query);
    echo (mysqli_num_rows($result));
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['AdminLoginId']=$_POST['AdminEmail'];
        header("location: Employee Dashboard.php");
        //echo "correct";
    }
    else
    {
        echo"<script>alert('Incorrect password');</script>";
        //echo "incorrect";
    }
}

?>