<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro Script</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>Cadastro</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <?php
      include "conexao.php";

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome_produto = $_POST['nome_produto'];
        $descricao_produto = $_POST['descricao_produto'];
        $preco_produto = $_POST['preco_produto'];

        $sql = "INSERT INTO produtos(nome_produto, descricao_produto, preco_produto) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $nome_produto, $descricao_produto, $preco_produto);

        if (mysqli_stmt_execute($stmt)) {
          mensagem("$nome_produto cadastrado com sucesso!", 'success');
        } else {
          mensagem("$nome_produto não foi cadastrado!", 'danger');
        }

        mysqli_stmt_close($stmt);
      }
      ?>
      <a href="cadastro.php" class="btn btn-primary">Voltar</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
