<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if(isset($_POST["excluir"])){
        $id = $_POST['id'];
        $connect = "DELETE FROM livros WHERE id = {$id}";
        $result = pg_query($dbconn, $connect);
        header("Location: http://localhost:8080/pesquisar_livros.php");
    }
?>