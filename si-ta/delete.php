<?php 

    include "functions.php";
    $pdo = pdo_connect();

    if (isset($_GET['id'])){
        $stmt = $pdo->prepare('DELETE FROM izin WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        header("location:admin.php");
    } else {
        die ('No ID specified!');
    }
?>