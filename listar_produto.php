<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estabelecimento";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$sql = "SELECT * FROM produtos";
$resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <h1>Lista de Produtos</h1>

    <a href="index.php" class="lista">Cadastrar Produto</a>

    <br>

    <?php

    if ($resultado->num_rows > 0) { 

        while ($produto = $resultado->fetch_assoc()) {

            echo "<p><strong>Código:</strong> " . $produto["code_prod"] . "</p>";
            echo "<p><strong>Nome:</strong> " . $produto["nome_prod"] . "</p>";
            echo "<p><strong>Categoria:</strong> " . $produto["cat_prod"] . "</p>";
            echo "<p><strong>Quantidade:</strong> " . $produto["quant_prod"] . "</p>";
            echo "<p><strong>Valor:</strong> R$ " . $produto["valor_prod"] . "</p>";
            echo "<p><strong>Status:</strong> " . $produto["status_prod"] . "</p>";

            echo "<a href='editar.php?id=" . $produto["code_prod"] . "'>Editar</a> | ";
            echo "<a href='excluir.php?id=" . $produto["code_prod"] . "'>Excluir</a> | ";
            echo "<a href='inativar.php?id=" . $produto["code_prod"] . "'>Inativar</a>";

            echo "<hr>";
        }

    } else {

        echo "<p>Nenhum produto cadastrado.</p>";

    }

    $conexao->close();

    ?>

</div>

</body>
</html>