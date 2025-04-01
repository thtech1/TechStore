<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Evento</title>
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <div class="login-box">
    <h2>Cadastro de Eventos</h2>
    <img src="_img/logo.png" alt="Logo" class="logo">
    <form action="salvar_evento.php" method="POST">
      <div class="user-box">
        <input type="text" name="nomeEvent" required="">
        <label>Nome do Evento</label>
      </div>
      <div class="user-box">
        <input type="date" name="dataEvent" required="">
        <label>Data do Evento</label>
      </div>
      <div class="user-box">
        <input type="time" name="horarioEvent" required="">
        <label>Horário do Evento</label>
      </div>
      <button type="submit" class="login-button">Cadastrar Evento</button>
    </form>
    <a href="index.php" class="back-button">Voltar </a>
    <a href="calendario.php" class="back-button">Ir para o Calendário</a>
  </div>

</body>

</html>
