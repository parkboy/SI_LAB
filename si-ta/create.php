<?php include "functions.php";
session_start();

if($_SESSION['user']==""){
    header("location:login.php?pesan=gagal");
}
    $pdo = pdo_connect();

    if(!empty($_POST)){
        $name = $_POST['name'];
        $kelas = $_POST['kelas'];
        $lab = $_POST['lab'];
        $waktu = $_POST['waktu'];
        $selesai = $_POST['selesai'];
        $created = date('Y-m-d H:i:s');
        $verifikasi = $_POST['verifikasi'];
        $stmt = $pdo->prepare('INSERT INTO izin VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute([$id,$name, $kelas, $lab, $waktu, $selesai, $created, $verifikasi]);
        header("location:index.php");
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
    <title>Form Perizinan Peminjaman Laboratorium</title>
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
            <div class="col-md5 col-sm-12 col-xs-12">
                <div class="card border-dark">
                    <div class="card-body bg-dark text-white">
                        <h5 class="card-title">Form Perizinan Peminjaman Laboratorium</h5>
                        <form actiton="create.php" method="post">
                            <input class="form-control form-control-sm" placeholder="Type name" type="text" name="name" id="name" required><br>
                            <select name="kelas">
                    <option value="IV RKS NEXUS">IV RKS NEXUS</option>
                    <option value="IV RKS PYTHON">IV RKS PYTHON</option>
                    <option value="IV RPKK ELEKTRON">IV RPKK ELEKTRON</option>
                    <option value="IV RPLK">IV RPLK</option>
                    <option value="IV RSK">IV RSK</option>
                    <option value="III RKS BLUE">III RKS BLUE</option>
                    <option value="III RKS RED">III RKS RED</option>
                    <option value="III RPKK NEUTRON">III RPKK NEUTRON</option>
                    <option value="III RPKK PROTON">III RPKK PROTON</option>
                    <option value="III RPLK">III RPLK</option>
                    <option value="III RSK">III RSK</option>
                    <option value="II RKS ROUTE">II RKS ROUTE</option>
                    <option value="II RKS TRACE">II RKS TRACE</option>
                    <option value="II RPKK QUANTUM">II RPKK QUANTUM</option>
                    <option value="II RPLK">II RPLK</option>
                    <option value="II RSK">II RSK</option>
                    <option value="I A">I A</option>
                    <option value="I B">I B</option>
                    <option value="I C">I C</option>
                    <option value="I D">I D</option>
                    <option value="I E">I E</option>
                    </select>
                <select name="lab">
                <option value="Lab Komputer Dalam">Lab Komputer Dalam</option>
                <option value="Lab Komputer Luar">Lab Komputer Luar</option>
                <option value="Lab Bahasa">Lab Bahasa</option>
                <option value="Lab Sandi">Lab Sandi</option>
                <option value="Lab Elektro">Lab Elektro</option>
                </select>
                <select name="waktu">
                <option value="08:00">08:00</option>
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                </select>
                <select name="selesai">
                <option value="08:30">08:30</option>
                <option value="09:00">09:00</option>
                <option value="09:30">09:30</option>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
                <option value="14:30">14:30</option>
                <option value="15:00">15:00</option>
                <option value="15:30">15:30</option>
                <option value="16:00">16:00</option>
                <option value="20:00">20:00</option>
                <option value="20:30">20:30</option>
                <option value="21:00">21:00</option>
                <option value="21:30">21:30</option>
                <option value="22:00">22:00</option>
                </select><br><br>
                        <input class="form-control form-control-sm" placeholder="Waiting Verification" type="text" name="verifikasi" id="verifikasi" readonly value="" /><br>
                        <input class="btn btn-primary btn-sm" type="submit"value="Create">
                        <a href="index.php" type="button" class="btn btn-warning btn-sm">Cancel</a>
                        </form>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12"></div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
