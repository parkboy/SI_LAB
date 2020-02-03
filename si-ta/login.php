<!DOCTYPE html>
<html>
<?php include 'functions.php' ;
session_start();
?>
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
<title>Sistem Informasi Perizinan Laboratorium</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<style type="text/css">
       body {
         background-image: url('download.jpg');
         height: 100%;
         color: white;
         }
        </style>
       <?php
       if (isset($_POST['username'])){
       $username = stripslashes($_REQUEST['username']);
       $username = mysqli_real_escape_string($conn,$username);
       $password = stripslashes($_REQUEST['password']);
       $password = mysqli_real_escape_string($conn,$password);
       $query = "SELECT * FROM `akun` WHERE username='$username'and password='".md5($password)."'";
       $result = mysqli_query($conn,$query) or die(mysql_error());
       $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['level'] = $level;
        header("Location: cek_login.php");
         }else{
        echo "<div class='form'>
        <h3>Username/password is incorrect.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
       }
       }else{
       ?>
<div class="container" style="margin-top:160px">
       <center>
       <font size="7" face="billabong">SISTEM INFORMASI LABORATORIUM</font><br>
       <font size="4" face="tahoma">Sistem Informasi ini digunakan untuk perizinan untuk menggunakan fasilitas yang ada pada Laboratorium</font><br><br>
              <div class="col-md-5 col-sm-12 col-xs-12">       
                     <div class="form-group">
                     <form action="cek_login.php" method="post" name="login">
                            <input class="form-control form-control-lg" type="text" name="username" placeholder="Username" required /><br>
                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Password" required /><br>
                            <input class="btn btn-light btn-lg" type="submit" value="Login" />
                     </form><br>
       </center>
</div>
<?php } ?>
</body>
</html>