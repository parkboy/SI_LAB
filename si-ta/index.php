<?php include "functions.php";
session_start();

if($_SESSION['user']==""){
    header("location:login.php?pesan=gagal");
}
?>
<!DOCTYPE html>
<html lang="en">
<html>
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
            #main {
                background-image: url('pb.png');
                background-position: center;
                background-repeat: no-repeat;
                height: 100px;
                
            }
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
    <?php
    $pdo = pdo_connect();
    $stmt = $pdo->prepare('SELECT * FROM izin');
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
 <div id="main"></div>
<div class="container"style="margin-top:5px">
<center>
<h2>Dashboard Peminjaman Laboratorium</h2>
<a type="button" class="btn btn-warning" href="profile.php">Ganti Password</a>
<a type="button" class="btn btn-primary" href="create.php" class="create-contact">Form Pinjam Laboratorium</a>
<a type="button" class="btn btn-danger" href='logout.php'>Log Out</a>
</center>
<br><br>
<div class="row">
<div class="col">
<table class="table table-stripped table-over" id="employee">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Kelas</th>
            <th>Laboratorium</th>
            <th>Waktu Peminjaman</th>
            <th>Selesai</th>
            <th>Created</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>
    </tbocdy>
        <?php foreach ($contacts as $contact): ?>
        <tr>
            <td><?=$contact['id']?></td>
            <td><?=$contact['name']?></td>
            <td><?=$contact['kelas']?></td>
            <td><?=$contact['lab']?></td>
            <td><?=$contact['waktu']?></td>
            <td><?=$contact['selesai']?></td>
            <td><?=$contact['created']?></td>
            <td><?=$contact['verifikasi']?></td>
            <td class="actions">
                <a type="button"
                class="btn btn-sm btn-outline btn-success edit"
                href="update.php?id=<?=$contact['id']?>" class="edit">edit</a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <tr>
        <th>#</th>
            <th>Name</th>
            <th>Kelas</th>
            <th>Laboratorium</th>
            <th>Waktu Peminjaman</th>
            <th>Selesai</th>
            <th>Created</th>
            <th>Status</th>
            <th></th>
        </tr>
        </tfoot>
</table>
</div>
</div>
</div>
</body>
</html>
