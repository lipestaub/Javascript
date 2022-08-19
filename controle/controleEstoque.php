<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    exit(0);
}

ini_set('display_errors', true); error_reporting(E_ALL);

$idPessoa = $_SESSION['id'];

$data = time();
$tipo = "E";

$documento = $_POST['documento'];
$idProduto = $_POST['produto'];
$quantidade = $_POST['quantidade'];

if (empty(str_replace(" ", "", $documento)) || $idProduto == 0) {
    echo "<script>alert('Os campos documento e produto devem ser preeenchidos corretamente!'); window.location.href = '../telas/controleEstoque.php';</script>";
}
else {
    mysqli_query($conexao, "INSERT INTO movimentacao (data, tipo, documento, idPessoa, idProduto, quantidade) VALUES($data, '$tipo', $documento, $idPessoa, $idProduto, $quantidade)");
    mysqli_query($conexao, "UPDATE produto SET estoque = estoque + $quantidade WHERE id = $idProduto");

    echo "<script>alert('Sucesso!'); window.location.href = '../telas/controleEstoque.php';</script>";
}