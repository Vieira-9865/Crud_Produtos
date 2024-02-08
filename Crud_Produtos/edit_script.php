<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nome_produto = $_POST['nome_produto'];
    $descricao_produto = $_POST['descricao_produto'];
    $preco_produto = $_POST['preco_produto'];

    $sql = "UPDATE produtos SET nome_produto=?, descricao_produto=?, preco_produto=? WHERE cod_produto=?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "sssi", $nome_produto, $descricao_produto, $preco_produto, $id);

    if (mysqli_stmt_execute($stmt)) {
        mensagem("$nome_produto atualizado com sucesso", 'success');
    } else {
        mensagem("$nome_produto não foi atualizado", 'danger');
    }

    mysqli_stmt_close($stmt);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Alteração Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <a href="pesquisa.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
