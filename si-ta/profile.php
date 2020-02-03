<?php
session_start();
include("functions.php");
if(isset($_POST['Submit'])){
    $oldpass=md5($_POST['opwd']);
    $username=$_SESSION['user'];
    $newpassword=md5($_POST['npwd']);
    $sql=mysqli_query($conn,"SELECT password FROM akun where password='$oldpass' && username='$username'");
    $num=mysqli_fetch_array($sql);
    if($num>0){
        $con=mysqli_query($conn,"update akun set password='$newpassword' where username='$username'");
        $_SESSION['pass']="Password Changed Successfully !!";
        header("Location: index.php");
    }else{
        $_SESSION['pass']="Old Password not match !!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <?= style_script()?>
    <script>
    $(document).ready(function() {
        $('#employee').DataTable();
    });
    </script>
    <title>Sistem Informasi Peminjaman Laboratorium</title>
    <style type="text/css"> 
            body{
                background-color: #000000;
                color: white;
            }
            #employee{
                color: white;
            }
        </style>
</head>
<body>
<p style="color:red;"><?php echo $_SESSION['pass'];?><?php echo $_SESSION['pass']="";?></p>
    <form name="chngpwd" action="" method="post" onSubmit="return valid();" id="employee">
    <table align="center" style="margin-top:250px">
        <tr height="50">
            <td>Old Password :</td>
                <td><input type="password" name="opwd" id="opwd" required></td>
            </tr>
            <tr height="50">
            <td>New Passowrd :</td>
                <td><input type="password" name="npwd" id="npwd" required></td>
            </tr>
            <tr height="50">
            <td>Confirm Password :</td>
                <td><input type="password" name="cpwd" id="cpwd" required></td>
            </tr>
            <tr>
            <td><a href="index.php" type="button" class="btn btn-warning">Back to login page</a></td>
            <td><input class="btn btn-primary" type="submit" name="Submit" value="Change Passowrd" /></td>
            </tr>
    </table>
</form></body>
</html>

