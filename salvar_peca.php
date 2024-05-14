
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    var_dump($_POST);
 
   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "automotivo";
    
    $nome_peca = $_POST["nome_peca"];
    $fornecedor = $_POST["fornecedor"];
    $valor_compra = $_POST["valor_compra"];
    $valor_venda = $_POST["valor_venda"];
    $quantidade = $_POST["quantidade"];

    $conn = new mysqli($servername, $username, $password, $dbname,3307);

   
    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

  
    $sql = "INSERT INTO pecas (nome_peca, fornecedor, valor_compra, valor_venda, quantidade) VALUES ('$nome_peca',
     '$fornecedor', '$valor_compra', '$valor_venda', '$quantidade')";
    if ($conn->query($sql) === TRUE) {
     
        header("Location: cadastro.php");
        exit();
    } else {
        echo "Erro ao cadastrar peça: " . $conn->error;
    }
    
   
    $conn->close();
}

?>
