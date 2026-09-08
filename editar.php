<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "estabelecimento";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$id = $_GET["id"];

$sql = "SELECT * FROM produtos WHERE code_prod = $id";
$resultado = $conexao->query($sql);

if ($resultado->num_rows == 0) {
    die("Produto não encontrado.");
}

$produtos = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">

        <h1>Editar Produto</h1>

        <form action="editar.php?id=<?php echo $produtos["code_prod"]; ?>" method="POST">

            <label for="nome_prod">Nome do Produto:</label>

            <input
                type="text"
                id="nome_prod"
                name="nome_prod"
                value="<?php echo $produtos["nome_prod"]; ?>"
                required
            >

            <label for="cat_prod">Categoria do Produto:</label>

            <select id="cat_prod" name="cat_prod" required>

                <option value="eletronico"
                    <?php if ($produtos["cat_prod"] == "eletronico") echo "selected"; ?>>
                    Eletrônico
                </option>

                <option value="vestuario"
                    <?php if ($produtos["cat_prod"] == "vestuario") echo "selected"; ?>>
                    Vestuário
                </option>

                <option value="decoracao"
                    <?php if ($produtos["cat_prod"] == "decoracao") echo "selected"; ?>>
                    Decoração
                </option>

            </select>

            <label for="quant_prod">Quantidade:</label>

            <input
                type="number"
                id="quant_prod"
                name="quant_prod"
                value="<?php echo $produtos["quant_prod"]; ?>"
                required
            >

            <label for="valor_prod">Valor do Produto:</label>

            <input
                type="number"
                id="valor_prod"
                name="valor_prod"
                step="0.01"
                value="<?php echo $produtos["valor_prod"]; ?>"
                required
            >

            <button type="submit" name="editar">
                Salvar Alterações
            </button>

        </form>

        <a href="listar_produto.php" class="lista">
            Voltar para Lista
        </a>

    </div>

</body>

</html>

<?php

if (isset($_POST["editar"])) {

    $nome = $_POST["nome_prod"];
    $categoria = $_POST["cat_prod"];
    $quantidade = $_POST["quant_prod"];
    $valor = $_POST["valor_prod"];

    $sql = "UPDATE produtos SET
            nome_prod = '$nome',
            cat_prod = '$categoria',
            quant_prod = '$quantidade',
            valor_prod = '$valor'
            WHERE code_prod = $id";

    if ($conexao->query($sql) === TRUE) {

        header("Location: listar_produto.php");
        exit;

    } else {

        echo "Erro ao editar: " . $conexao->error;

    }
}

$conexao->close();

?>