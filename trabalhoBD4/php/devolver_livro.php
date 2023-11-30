<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
        echo "Wasn't able to connect";
    }

    if (isset($_POST["devolver"])){
        $query = "SELECT id FROM usuarios WHERE email = '{$_SESSION["email"]}'";
        $result = pg_query($dbconn, $query);
        $row = pg_fetch_row($result);
        $devolver = "DELETE FROM usuario_livro WHERE usuario_id = {$row[0]} AND livro_id = {$_POST["id"]}";
        $result = pg_query($dbconn, $devolver);
        $voltarpracasa = "UPDATE livros set quant = (quant + 1) WHERE id = {$_POST["id"]}";
        $result = pg_query($dbconn, $voltarpracasa);
        header("Location: http://localhost:8080/../main.php");
    }


?>