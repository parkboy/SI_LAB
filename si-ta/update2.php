<?php include "functions.php";
session_start();

if($_SESSION['admin']==""){
    header("location:login.php?pesan=gagal");

}


    $pdo = pdo_connect();

    if(isset($_GET['id'])) {
        if(!empty($_POST)) {
            $name = $_POST['name'];
            $kelas = $_POST['kelas'];
            $lab = $_POST['lab'];
            $waktu = $_POST['waktu'];
            $selesai = $_POST['selesai'];
            $verifikasi = $_POST['verifikasi'];
            $stmt = $pdo->prepare('UPDATE izin SET name = ?, kelas = ?, lab = ?, waktu = ?, selesai = ?, verifikasi = ? WHERE id = ?');
            $stmt->execute([$name, $kelas, $lab, $waktu, $selesai, $verifikasi, $_GET['id']]);
            header('location:admin.php');
        }

        $stmt = $pdo->prepare('SELECT * FROM izin WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        $contact = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$contact){
            die('Contact doesnt exist!');
        }
    }else{
        die('No ID Specified');
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
    <title> Form Perizinan # <?=$contact['id']?></title>
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
<div class="container" style="margin-top:50px" id="employee">
    <div class="row">
        <div class="col-md-5 col-sm-12 col-xs-12">
        <div class="card border-dark">
            <div class="card-body bg-dark text-white">
            <h5> Update Contact # <?=$contact['id']?></h5>
                <form action="update2.php?id=<?=$contact['id']?>" method="post">
                <input class="form-control form-control-sm" placeholder="Type name" type="text" name="name" value="<?=$contact['name']?>" id="name" readonly value=""><br>
                <input class="form-control form-control-sm" placeholder="Kelas" type="text" name="kelas" value="<?=$contact['kelas']?>" id="kelas" readonly value=""><br>
                <input class="form-control form-control-sm" placeholder="Room" type="text" name="lab" value="<?=$contact['lab']?>" id="lab" readonly value=""><br>
                <input class="form-control form-control-sm" placeholder="Time" type="time" name="waktu" value="<?=$contact['waktu']?>" id="waktu" readonly value=""><br>
                <input class="form-control form-control-sm" placeholder="Time" type="time" name="selesai" value="<?=$contact['selesai']?>" id="selesai" readonly value=""><br>
                <select name="verifikasi">Verifikasi
                <option value="Diizinkan">Diizinkan</option>
                <option value="Tidak Diizinkan">Tidak Diizinkan</option>
                </select><br><br>
                <input class="btn btn-dark btn-sm" type="submit"value="Update">
                <a href="admin.php" type="button" class="btn btn-warning btn-sm">Cancel</a>
            </form>
        </div>
    </div>
    </div>
    <div class ="col-md-7 col-sm-12 col-xs-12"></div>
    </div>
</div>
</body>
</html>