<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if (isset($_POST["submit"])){
                        
            $connect = " UPDATE usuarios
            SET nome = '{$_POST['nome']}', email = '{$_POST['email']}', tipo = '{$_POST['tipo']}'
            WHERE id = '{$_POST['id']}'";
            $result = pg_query($dbconn, $connect);
            header("Location: http://localhost:8080/usertable.php");
        }
?>