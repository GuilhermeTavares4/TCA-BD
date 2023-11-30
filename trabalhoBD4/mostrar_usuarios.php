<?php
    session_start();
    if (!isset($_SESSION["email"]) || $_SESSION["tipo"] == 0){
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
    <title>Login</title>
    <link rel="stylesheet" type='text/css' href='./style/style.css'>
    <link rel="stylesheet" type='text/css' href='./style/index.css'>
    <link rel="stylesheet" href="/style/usertable.css">
</head>
<body>

    <h1>Usuários</h1>
    <a href="./main.php"><div class='voltar'><</div></a>
    <table class="user-table">
        <tr>
            <th>id</th>
            <th>e-mail</th>
            <th>name</th>
            <th>tipo</th>
            <th>editar</th>
            <th>excluir</th>
        </tr>
        <?php
            $result = pg_query($dbconn, "SELECT id, nome, email, tipo FROM usuarios ORDER BY id ASC");
            while ($row = pg_fetch_row($result)) { echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>
                            <form action='./editar_usuarios.php' method='post' class='delete-form'>
                                <input type='hidden' id='inputHidden' name='id' value='$row[0]'>
                                <input type='submit' name='editar' class='button edd' value='Editar'>
                            </form>
                        </td>
                        <td>
                            <form action='./php/excluir_usuario.php' method='post' class='remove-form'>
                                <input type='hidden' id='inputHidden' name='id' value='$row[0]'>
                                <input type='submit' name='X' class='button' value='X'>
                            </form>
                        </td>
                    </tr>"; }?>
        
    </table>


</body>
</html>