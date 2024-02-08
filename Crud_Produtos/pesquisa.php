<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesquisa de Produtos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

  <?php 
  include "conexao.php";

  $pesquisa = isset($_POST['busca']) ? $_POST['busca'] : '';

  $sql = "SELECT * FROM produtos WHERE nome_produto LIKE '%$pesquisa%'";

  $dados = mysqli_query($conn, $sql);

  if (!$dados) {
    die('Erro na consulta: ' . mysqli_error($conn));
  }
  ?>

  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Pesquisa de Produtos</h1>

        <nav class="navbar bg-body-tertiary">
          <div class="container-fluid">
            <form class="d-flex" role="search" action="pesquisa.php" method="POST">
              <input class="form-control me-2" type="search" placeholder="Nome" aria-label="busca" name="busca" autofocus>
              <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </form>
          </div>
        </nav>

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nome</th>
              <th scope="col">Descrição</th>
              <th scope="col">Preço</th>
            </tr>
          </thead>
          <tbody>

            <?php 
            while($linha = mysqli_fetch_assoc($dados)){

              $cod_produto = $linha['cod_produto'];
              $nome_produto = $linha['nome_produto'];
              $descricao_produto = $linha['descricao_produto'];
              $preco_produto = $linha['preco_produto'];

              echo "<tr>
              <th scope='row'>$nome_produto</th>
              <td>$descricao_produto</td>
              <td>$preco_produto</td>

              <td width='150px'>
              <a href='cadastro_edit.php?id=$cod_produto' class='btn btn-success btn-sm'>Editar</a>
              <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#modal_confirma' onclick=\"pegar_dados($cod_produto, '$nome_produto')\">Excluir</a>
              </td>

              </tr>";
            }
            ?>

          </tbody>
        </table>

        <a href="index.php" class="btn btn-primary">Voltar</a>

      </div>
    </div>
  </div>


  <div class="modal fade" id="modal_confirma" tabindex="-1" aria-labelledby="modal_confirmaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modal_confirmaLabel">Confirmação de exclusão</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="excluir_script.php" method="POST">
            <p>Deseja realmente excluir? <b id="nome_produto">Nome do Produto</b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
          <input type="hidden" name="nome_produto" id="nome_produto1" value="">
          <input type="hidden" name="id" id="cod_produto" value="">
          <button type="submit" class="btn btn-danger" value="Sim">Sim</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    function pegar_dados(id, nome){
      document.getElementById('nome_produto').innerHTML = nome;
      document.getElementById('nome_produto1').value = nome;
      document.getElementById('cod_produto').value = id;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
