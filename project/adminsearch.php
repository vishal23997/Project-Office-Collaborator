<?php
session_start();
if(!isset($_SESSION['AdminLoginId']))
{
     header("Location: login panel.php");
}
?>
<?php 
error_reporting(0);
require_once("conn.php");
if(isset($_POST['search']))
{
    
    $str=mysqli_real_escape_string($con,$_POST['str']);
    $sql="select name,email,desg,manager,allocated from employee where email='$str'";
    $result=mysqli_query($con,$sql);
   
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        div.header{
            display:flex;
            font-family:poppins;
            justify-content:space-between;
            align-items:center;
            padding: 15px 60px;
            background-color: darkseagreen;
        }
        div.header button{
            background-color: revert;
            font-size: 16px;
            font-weight: 550;
            padding: 14px 22px;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>Search</title>
</head>
<body>
    <div class="header">
        <h1 style="font-size:32px;">Admin Dashboard - <?php echo $_SESSION['AdminLoginId']?></h1>
        <form method="POST" action="Admin Panel.php">
            <button style="margin-left:500px;background-color:#e9e9e9;" name="update" ><i class="fas fa-backward"></i> BACK</button>
        </form>
            <form method="POST" action="login panel.php">
            <button name="logout"><i class="fas fa-sign-out-alt"></i> LOGOUT</button>
        </form>
    </div>
    <h2 style="font-size: 1.5rem;text-align: center;">Find Employee by their Details</h2>
    <form method="POST">
    <div class="srch" style="text-align: center;">
        <label style="padding: 10px;font-size: 20px;font-weight: 600;">Search by Email : </label>
        <input type="textbox" name="str" required/>
        <input type="submit" name="search" value="SEARCH"/>
    </div>
    </form>
    <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-5">
                        <table class="table table-bordered">
                            <tr style="background-color:lightgreen">
                                <td> Employee Name </td>
                                <td> Email </td>
                                <td> Designation </td>
                                <td> Manager </td>
                                <td> Project Allocated </td>
                                <td>  </td>
                                <td>  </td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result) )
                                    {
                                        $userName = $row['name'];
                                        $userEmail = $row['email'];
                                        $userDesg = $row['desg'];
                                        $userManager = $row['manager'];
                                        $userAllocated = $row['allocated'];
                            ?>
                                    <tr>
                                        <td><?php echo $userName ?></td>
                                        <td><?php echo $userEmail ?></td>
                                        <td><?php echo $userDesg ?></td>
                                        <td><?php echo $userManager ?></td>
                                        <td><?php echo $userAllocated ?></td>
                                        <td><a href="edit.php?GetEmail=<?php echo $userEmail ?>">Update</a></td>
                                        
                                        <td><a href="delete.php?Del=<?php echo $userEmail ?>">Delete</a></td>
                                    </tr>
                                            
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <form action="Admin Panel.php" >
        <div style="    margin-left: 50%;
    margin-top: 2%;"><button class="btn btn-primary" name="back">BACK</button></div>
                                </form>         -->
    <!-- <?php
    if(isset($_POST['logout']))
    {
        session_destroy();
        echo"<script>window.location.href=window.location.origin+'/project/login%20panel.php';</script>";
       // header("Location:login panel.php");
    }
    ?> -->
</body>
</html>
