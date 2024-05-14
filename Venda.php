<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Venda</title>
    <link rel="stylesheet" href="telaVenda.css">
</head>

<body>

    <img src="_img/logo.png" alt="Logo" class="logo">

    <form id="formVenda">
        <label for="codigoPeca">Código da Peça:</label>
        <input type="text" id="codigoPeca" name="codigoPeca" onchange="preencherDadosPeca()" required>

        <label for="nomePeca">Nome da Peça:</label>
        <input type="text" id="nomePeca" name="nomePeca" required>

        <label for="valorVenda">Valor de Venda:</label>
        <input type="number" id="valorVenda" name="valorVenda" min="0" step="0.01" required>

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" min="1" required>

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" readonly>

        <button type="button" onclick="calcularTotal()">Calcular Total</button>
        <button type="button" onclick="venderPeca()">Vender</button> 
        <a href="lista_peca.php" class="back-button">Listagem de Peças</a>
    </form>

    <script>
        function preencherDadosPeca() {
            var codigoPeca = document.getElementById('codigoPeca').value;

            var xhr = new XMLHttpRequest();
            xhr.open("GET", "buscar_peca.php?codigo=" + codigoPeca, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var resposta = JSON.parse(xhr.responseText);
                    if (resposta.success) {
                       
                        document.getElementById('nomePeca').value = resposta.nomePeca;
                        document.getElementById('valorVenda').value = resposta.valorVenda;
                    } else {
                        alert(resposta.message); 
                    }
                }
            };
            xhr.send();
        }

        function calcularTotal() {
            var valorVenda = parseFloat(document.getElementById('valorVenda').value);
            var quantidade = parseInt(document.getElementById('quantidade').value);
            var total = valorVenda * quantidade;
            document.getElementById('total').value = total.toFixed(2);
        }

        function venderPeca() {
            var codigoPeca = document.getElementById('codigoPeca').value;
            if (confirm("deseja vender esta peça?")) {
                window.location.href = "saida_peca.php?id=" + codigoPeca;
            }
        }
    </script>

</body>

</html>
