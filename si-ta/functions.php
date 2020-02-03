<?php

    function pdo_connect(){
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'sisteminformasi';
        try{
            return new PDO( 'mysql:host=' . $DATABASE_HOST . 
            ';dbname=' . $DATABASE_NAME , $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception){
            die ('Failed to connect to database!');
        }
    }

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db   = 'sisteminformasi';
    
    $conn = mysqli_connect($host,$user, $pass);
    mysqli_select_db($conn, $db);
    

function style_script(){
    return'<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTablesbootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"</script>
    <script src="https://cdn.jsdelivr.net/npm/pooper.js@1.16.0/dist/umd/popper.min.js"</script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js.bootstrap.min.js"</script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"</script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"</script>';
}

?>