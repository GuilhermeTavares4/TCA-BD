<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
        echo "Wasn't able to connect";
    }
    
    if (isset($_POST["alugar"])){
        $query = "SELECT id FROM usuarios WHERE email = '{$_SESSION["email"]}'";
        $result = pg_query($dbconn, $query);
        $row = pg_fetch_row($result);
        $verificacao = "SELECT COUNT(usuario_id) FROM usuario_livro 
        WHERE livro_id = {$_POST["id"]} AND usuario_id = {$row[0]}";
        $result = pg_query($dbconn, $verificacao);
        $qnt = pg_fetch_row($result);
        if ($qnt[0] == 0) { 
            $alugar = "INSERT INTO usuario_livro (usuario_id, livro_id) VALUES ({$row[0]}, {$_POST["id"]})";
            $result = pg_query($dbconn, $alugar);
            $remover = "UPDATE livros set quant = (quant - 1) WHERE id = {$_POST["id"]}";
            $result = pg_query($dbconn, $remover);
        }
        header("Location: http://localhost:8080/../pesquisar_livros.php");
    }


    ?>