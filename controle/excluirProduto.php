<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    exit(0);
}

$idProduto = $_GET['p'];
$idPedido = $_SESSION['idPedido'];

mysqli_query($conexao, "DELETE FROM itemPedido WHERE idPedido = $idPedido AND idProduto = $idProduto");

echo "<script>window.location.href = '../telas/carrinho.php';</script>";