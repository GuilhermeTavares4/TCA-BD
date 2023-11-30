<?php
    session_start();
    if (!isset($_SESSION["email"])){
        header("Location: http://localhost:8080/index.php");
    }
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");
    if (!$dbconn) {
    echo "Wasn't able to connect";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type='text/css' href='../style/style.css'>
    <link rel="stylesheet" type='text/css' href='../style/main.css'>
    <title>Document</title>
</head>
<body>
    <h1>Livros para alugar :)</h1>
    <a href="./main.php"><div class='voltar'><</div></a>
    
    <div class='form-box-1'>
        <div class='form-box-2'>
            <form action='./pesquisar_livros.php' method='post'>
                <input type='text' name='pesquisa_por_txt' placeholder='Pesquise um título aqui'>
                <input type='submit' name='submit_txt' value='O--'>
                <input type='submit' name='org_data' value='Organizar por data de lançamento'>
                <input type='submit' name='mostrar_todos' value='Mostrar todos'>
            </form>
            
            <?php
            
                $query = "SELECT * FROM livros";
                if(isset($_POST["submit_txt"])) {
                    $query = "SELECT count(*) FROM livros where titulo LIKE '%{$_POST['pesquisa_por_txt']}%'";
                    $result = pg_query($dbconn, $query);
                    $row = pg_fetch_row($result);
                    if ($row[0] == 0) {
                        echo "Nenhum livro corresponde à pesquisa";
                    }

                    $query = "SELECT * FROM livros where titulo LIKE '%{$_POST['pesquisa_por_txt']}%'";
                }
                if (isset($_POST["org_data"])) {
                    $query = "SELECT * FROM livros ORDER BY ano DESC";
                }
                $result = pg_query($dbconn, $query);
                while ($row = pg_fetch_row($result)) {
                    echo "
                    <div class='livro'>
                        <img src='{$row[3]}'>
                        <div class='info'>
                            <h2>{$row[2]}</h2>
                            <p>Autor: {$row[1]}</p>
                            <p>Ano de publicação: {$row[4]}</p>
                            <p>Editora: {$row[5]}</p>
                            <p>Quantidade: {$row[6]}</p>
                            <div id='coisaEspecifica'>
                            <form action='./php/alugar_livro.php' method='post'>
                                <input type='hidden' name='id' value={$row[0]}>
                                <input type='submit' name='alugar' value='Alugar' ";
                                
                    if($row[6] == 0) {
                        echo "disabled";
                    }
                    echo "
                        >
                            </form>";

                            if($_SESSION['tipo'] == 1) {
                                echo "
                                <form action='./php/del_livro.php' method='post'>
                                    <input type='hidden' name='id' value={$row[0]}>
                                    <input type='submit' name='excluir' value='Excluir livro'>
                                </form>";
                            }
                    echo "
                        </div>
                        </div>
                    </div>
                    <hr>";
                }
            ?>
        </div>
    </div>

</body>
</html>