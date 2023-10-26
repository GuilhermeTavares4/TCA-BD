<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type='text/css' href='../style/style.css'>
    <link rel="stylesheet" type='text/css' href='../style/index.css'>
</head>
<body>
<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=biblioteca user=postgres password=postgres");

    if (!$dbconn) {
    echo "Wasn't able to connect";
    }

?>
    <h1>Biblioteca</h1>

    <div class='form-box-1'>
        <div class='form-box-2'>
            <form action="" method="post">
                <label for="user">Usuário:</label>
                <input type="text" name="user" id="user" placeholder='Insira o email' autofocus required>
                <br/>
                <label for="senha" >Senha:</label>
                <input type="password" name="senha" placeholder='Digite sua senha'>
                <br/>
                <input type="submit" name="submit" value="Entrar">
            </form>
            
            <a href="./criar_conta.php">Não possui conta? Cadastre-se aqui</a><br/>
        </div>
    </div>


</body>
</html>