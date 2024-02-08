<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Cadastro de Produtos</h1>
                <form action="cadastro_script.php" method="POST">
                    <div class="form-group">
                        <label for="nome_produto">Nome </label>
                        <input type="text" class="form-control" id="nome_produto" name="nome_produto" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao_produto">Descrição</label>
                        <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" required>
                    </div>
                    <div class="form-group">
                        <label for="preco_produto">Preço</label>
                        <input type="number" class="form-control" id="preco_produto" name="preco_produto" required min="0" step="0.01">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Cadastrar">
                        <a href="index.php" class="btn btn-primary">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
