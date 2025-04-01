<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TechStore";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


$codigoPeca = $_GET['codigo'];


$sql = "SELECT nome_peca, valor_venda FROM pecas WHERE id = $codigoPeca";
$result = $conn->query($sql);

if ($result !== false && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array("success" => true, "nomePeca" => $row["nome_peca"], "valorVenda" => $row["valor_venda"]);
} else {
    $response = array("success" => false, "message" => "Peça não encontrada.");
}


$conn->close();


header('Content-Type: application/json');
echo json_encode($response);
?>