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
<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");

    if (!$dbconn) {
    echo "Wasn't able to connect";
    };

    if (!empty($_POST['remove'])) {
        $remove = $_POST['remove'];
        pg_query($dbconn, "DELETE FROM Items WHERE item_id = $remove");
    }

?>
    <h1>Usuários</h1>
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
            $result = pg_query($dbconn, "SELECT id, nome, email, tipo FROM usuarios");
            while ($row = pg_fetch_row($result)) { echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>
                            <form action='./editar_usuarios.php' method='post' class='delete-form'>
                                <input type='hidden' id='inputHidden' name='editar' value='$row[0]'>
                                    <button type='submit' class='button'>editar</button>
                            </form>
                        </td>
                        <td>
                            <form action='./mostrar_usuarios.php' method='post' class='remove-form'>
                                <input type='hidden' id='inputHidden' name='remove' value='$row[0]'>
                                    <button type='submit' class='button'>X</button>
                            </form>
                        </td>
                    </tr>"; }?>
            }
        
    </table>


</body>
</html>