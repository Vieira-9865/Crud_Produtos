<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php 
    include "conexao.php";

    $id = $_GET['id'] ?? '';
    $sql2 = "SELECT * FROM produtos WHERE cod_produto = $id";

    $dados = mysqli_query($conn, $sql2);
    $linha = mysqli_fetch_assoc($dados);
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1>Editar</h1>
            <form action="edit_script.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail">Nome</label>
                    <input type="text" class="form-control" name="nome_produto" required value="<?php echo $linha['nome_produto']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Descrição</label>
                    <input type="text" class="form-control" name="descricao_produto" required value="<?php echo $linha['descricao_produto']; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail">Preço</label>
                    <input type="text" class="form-control" name="preco_produto" required value="<?php echo $linha['preco_produto']; ?>">
                </div>
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Salvar Alterações">
                    <input type="hidden" name="id" value="<?php echo $linha['cod_produto']; ?>">
                    <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
