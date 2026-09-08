<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Cadastro de Produtos</h1>

        <form action="cadastro_produto.php" method="POST">

            <label>Nome do Produto:</label>
            <input type="text" name="nome_prod" placeholder="Digite o nome do produto" required>

            <label>Categoria do Produto:</label>
            <select name="cat_prod" required>
                <option value="eletronico">Eletrônico</option>
                <option value="vestuario">Vestuário</option>
                <option value="decoracao">Decoração</option>
            </select>

            <label>Quantidade:</label>
            <input type="number" name="quant_prod" placeholder="Digite a quantidade do produto" required>

            <label>Valor do Produto:</label>
            <input type="number" name="valor_prod" step="0.01" placeholder="Digite o preço do produto" required>

            <button type="submit">Cadastrar</button>

        </form>

        <a href="listar_produto.php" class="lista">Lista de Produtos</a>
    </div>

</body>
</html>