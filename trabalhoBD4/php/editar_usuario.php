<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if (isset($_POST["submit"])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $tipo = $_POST['tipo'];
        $id = $_POST['id'];
        $connect = " UPDATE usuarios
        SET nome = '{$nome}', email = '{$email}', tipo = {$tipo}
        WHERE usuarios.id = {$id}";
        $result = pg_query($dbconn, $connect);
        header("Location: http://localhost:8080/mostrar_usuarios.php");
    }
?>