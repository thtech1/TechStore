<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TechStore";

//conectar para o sql local//


$conn = new mysqli($servername, $username, $password, $dbname,3307);


if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
   
    $sql = "DELETE FROM pecas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    
    if ($stmt) {
        
        $stmt->bind_param("i", $id);
        
   
        if ($stmt->execute()) {
            echo "Peça vendida com sucesso!";
        } else {
            echo "Erro ao vender a peça: " . $conn->error;
        }
        
        
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }
    
    
    header("Location: lista_peca.php");
    exit();
} else {
    echo "ID da peça não fornecido.";
}


$conn->close();
?>
