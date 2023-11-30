<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if(isset($_POST["X"])){
        $id = $_POST['id'];
        $query = "SELECT livro_id FROM usuario_livro WHERE usuario_id = {$_POST['id']}";
        $result = pg_query($dbconn, $query);
        while ($row = pg_fetch_row($result)) {
            $querysegundarodada = "UPDATE livros SET quant = (quant + 1) WHERE id = {$row[0]}";
            $resulte = pg_query($dbconn, $querysegundarodada);
        }
        $connect = "DELETE FROM usuarios WHERE usuarios.id = {$id}";
        $result = pg_query($dbconn, $connect);
        header("Location: http://localhost:8080/mostrar_usuarios.php");
    }
?>