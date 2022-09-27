<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    exit(0);
}

$idProduto = $_POST['idProduto'];
$idPedido = $_SESSION['idPedido'];

$quantidade = $_POST['quantidade'];

if ($quantidade > 0) {
    mysqli_query($conexao, "UPDATE itemPedido SET quantidade = $quantidade WHERE idPedido = $idPedido AND idProduto = $idProduto");
}
elseif ($quantidade == 0) {
    mysqli_query($conexao, "DELETE FROM itemPedido WHERE idPedido = $idPedido AND idProduto = $idProduto");
}

echo "<script>window.location.href = '../telas/carrinho.php';</script>";