<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    exit(0);
}

$data = time();

$idPessoa = $_SESSION['id'];
$idPedido = $_SESSION['idPedido'];

mysqli_query($conexao, "UPDATE pedido SET status = 1 WHERE idPedido = $idPedido");

$query = "SELECT idProduto, quantidade FROM itemPedido WHERE idPedido = $idPedido";
$select = mysqli_query($conexao, $query);

while ($dados = mysqli_fetch_assoc($select)) {
    $i += 1;

    $arrayProdutos[$i]['idProduto'] = $dados['idProduto'];
    $arrayProdutos[$i]['quantidade'] = $dados['quantidade'];
}

for ($i = 1; $i <= mysqli_num_rows($select); $i++) {
    $idProduto = $arrayProdutos[$i]['idProduto'];
    $quantidade = $arrayProdutos[$i]['quantidade'];

    mysqli_query($conexao, "UPDATE produto SET estoque = estoque - $quantidade WHERE id = $idProduto");

    mysqli_query($conexao, "INSERT INTO movimentacao (data, tipo, documento, idPessoa, idProduto, quantidade) VALUES ($data, 'S', $idPedido, $idPessoa, $idProduto, $quantidade)");
}

unset($_SESSION['idPedido']);

echo "<script>window.location.href = '../telas/carrinho.php';</script>";