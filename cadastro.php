<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Peça</title>
  <link rel="stylesheet" href="cadastro_pecas.css">
</head>

<body>
  <div class="login-box">
  <img src="_img/logo.png" alt="Logo" class="logo">
    <h2>Cadastro de Peças</h2>
    <form action="salvar_peca.php" method="POST">
      <div class="user-box">
        <input type="text" name="nome_peca" required="">
        <label>Nome da Peça</label>
      </div>
      <div class="user-box">
        <input type="text" name="fornecedor" required="">
        <label>Fornecedor</label>
      </div>
      <div class="user-box">
        <input type="number" step="0.01" name="valor_compra" required="">
        <label>Valor de Compra</label>
      </div>
      <div class="user-box">
        <input type="number" step="0.01" name="valor_venda" required="">
        <label>Valor de Venda</label>
      </div>
      <div class="user-box">
        <input type="number" name="quantidade" required="">
        <label>Quantidade</label>
      </div>
      <button type="submit" class="login-button">Cadastrar Peça</button>
    </form>
    <a href="lista_peca.php" class="back-button">Listagem de Peças</a>
    <a href="index.php" class="back-button">Voltar</a>
  </div>
  
</body>

</html>
