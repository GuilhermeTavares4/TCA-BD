<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

    if (isset($_POST["submit"])){
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $query = "INSERT INTO livros (autores, titulo, imagem, ano, editora, quant) VALUES
        ('{$_POST["autores"]}', '{$_POST["titulo"]}',  '{$target_file}',  {$_POST["ano"]}, '{$_POST["editora"]}', {$_POST["quant"]})";
        pg_query($dbconn, $query);
        header("Location: http://localhost:8080/main.php");
    }
?>