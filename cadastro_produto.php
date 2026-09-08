<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estabelecimento";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$nome = $_POST["nome_prod"];
$categoria = $_POST["cat_prod"];
$quantidade = $_POST["quant_prod"];
$valor = $_POST["valor_prod"];

$sql = "INSERT INTO produto 
        (nome_prod, cat_prod, quant_prod, valor_prod, status_prod)
        VALUES 
        ('$nome', '$categoria', '$quantidade', '$valor', 'ativo')";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container sucesso">

        <?php if ($conexao->query($sql) === TRUE) { ?>

            <h1>Produto cadastrado!</h1>

            <p class="mensagem">
                O produto foi cadastrado com sucesso.
            </p>

            <a href="index.php" class="lista">
                Cadastrar outro produto
            </a>

            <a href="listar_produto.php" class="lista">
                Ver lista de produtos
            </a>

        <?php } else { ?>

            <h1>Erro ao cadastrar</h1>

            <p class="mensagem">
                <?php echo $conexao->error; ?>
            </p>

            <a href="index.php" class="lista">
                Voltar ao cadastro
            </a>

        <?php } ?>

    </div>

</body>

</html>

<?php

$conexao->close();

?>