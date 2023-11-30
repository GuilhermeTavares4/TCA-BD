<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Livros</title>
    <link rel="stylesheet" type='text/css' href='../style/style.css'>
    <link rel="stylesheet" type='text/css' href='../style/criar_conta.css'>
</head>
<body>
    <h1>Biblioteca</h1>
    <a href="./main.php"><div class='voltar'><</div></a>


    <div class="form-box-1">
        <div class="form-box-2">
            <form action="./php/inserir_livro.php" method="post" enctype="multipart/form-data">
                <div class='form-container'>
                    <label for="nome">Titulo:</label>
                    <input type="text" name="titulo" placeholder='titulo' autofocus required><br>
                </div>
                <hr>
                <div class='form-container'>
                    <label for="text">Autores:</label>
                    <input type="text" name="autores" placeholder='fulano' required><br>
                </div>
                <div class='form-container'>
                    <label for="ano">Ano de lançamento:</label>
                    <input type="number" name="ano" placeholder='xxxx' required><br>
                </div>
                <hr>
                <div class='form-container'>
                    <label for="editora">Editora:</label>
                    <input type="text" name="editora" placeholder='editora' required><br>
                </div>
                <div class='form-container'>
                    <label for="quant">Quantidade:</label>
                    <input type="number" name="quant" placeholder='xx' required><br>
                </div>
                <div class='form-container'>
                    <label for="fileToUpload">Imagem:</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                </div>
                <input type="submit" name="submit" value="Registrar">
            </form>
        </div>
    </div>

</body>
</html>