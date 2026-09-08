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

$sql = "DELETE FROM produtos WHERE code_prod = $id";

if ($conexao->query($sql) === TRUE) {

    header("Location: listar_produto.php");
    exit;

} else {

    echo "Erro ao excluir: " . $conexao->error;

}

$conexao->close();

?>