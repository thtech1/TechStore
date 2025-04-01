<?php
// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos do formulário estão definidos
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "TechStore"; 

        // Conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname,3307);

        // Verifica se a conexão foi estabelecida com sucesso
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Recupera os valores do formulário
        $nomeEvent = $_POST["nomeEvent"];
        $dataEvent = $_POST["dataEvent"];
        $horarioEvent = $_POST["horarioEvent"];

        // ... Restante do código de inserção no banco de dados
    // Prepara e executa a query SQL para inserir o evento no banco de dados
    $sql = "INSERT INTO events (nomeEvent, dataEvent, horarioEvent) VALUES ('$nomeEvent', '$dataEvent', '$horarioEvent')";
    if ($conn->query($sql) === TRUE) {
        header("Location: Cadastroevento.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça: " . $conn->error;
    }
    // Fecha a conexão com o banco de dados
    $conn->close();
}

?>
