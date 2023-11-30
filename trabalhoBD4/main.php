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
    <?php echo "<p>Usuário <b>{$_SESSION['nome']}</b> logado</p>";?>
    <h1>Livros Alugados</h1>
    <div class="container">
        <nav>
            <a href="./pesquisar_livros.php" class="nav-bttn">Pesquisar livros</a>
            <?php
                if ($_SESSION["tipo"] == 1){
                    echo "
                        <a href='./mostrar_usuarios.php' class='nav-bttn'>Ver usuários</a>
                        <a href='./adicionar_livro.php' class='nav-bttn'>Adicionar um livro</a>
                    ";
                }
            ?>
            <a href="./php/logout.php" class="nav-bttn">Log out</a>
        </nav>
        <div class='form-box-1'>
            <div class='form-box-2'>
                <?php
                    $query = "select count(*) from livros 
                    join usuario_livro on livros.id = usuario_livro.livro_id 
                    join usuarios on usuarios.id = usuario_livro.usuario_id 
                    where usuarios.email = '{$_SESSION["email"]}'";
                    $result = pg_query($dbconn, $query);
                    $row = pg_fetch_row($result);
                    if ($row[0] == 0) {
                        echo "<p class='center-text'>Você não tem livros alugados<p/>";
                    }
                    else{
                        $query = "select * from livros 
                        join usuario_livro on livros.id = usuario_livro.livro_id 
                        join usuarios on usuarios.id = usuario_livro.usuario_id 
                        where usuarios.email = '{$_SESSION["email"]}'";
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
                                    <form action='./php/devolver_livro.php' method='post'>
                                        <input type='hidden' name='id' value={$row[0]}>
                                        <input type='submit' name='devolver' value='Devolver livro'>
                                    </form>
                                </div>
                            </div>
                            <hr>";
                        }
                    }              
                ?>
            </div>
        </div>
    </div>

</body>
</html>