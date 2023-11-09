<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conta</title>
    <link rel="stylesheet" type='text/css' href='../style/style.css'>
    <link rel="stylesheet" type='text/css' href='../style/criar_conta.css'>
</head>
<body>
    <h1>Biblioteca</h1>
    <a href="./index.php"><div class='voltar'><</div></a>

    <?php
        $id = $_POST["id"];
    ?>

    <div class="form-box-1">
        <div class="form-box-2">
            <form action="../php/editar_usuario.php" method="post">
            <input type='hidden' id='inputHidden' name='remove' value='$id'>
                <div class='form-container'>
                    <label for="nome">Nome Completo:</label>
                    <input type="text" name="nome" placeholder='Nome Sobrenome' autofocus required><br>
                </div>
                <hr>
                <div class='form-container'>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder='exemplo@email.com' pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required><br>
                </div>
                <div class='form-container' id="radio">
                    <label for="tipo">Tipo:</label>
                    <div id="radioinputs">
                        <div>
                            <input type="radio" name="tipo" id="userinput" value="0" required>
                            <label for="userinput">Usuário</label>
                        </div>
                        <div>
                            <input type="radio" name="tipo" id="admininput" value="1" required>
                            <label for="admininput">Admin</label>
                        </div>
                    </div><br>
                </div>
                <input type="submit" name="submit" value="Salvar alterações">
            </form>
        </div>
    </div>

</body>
</html>