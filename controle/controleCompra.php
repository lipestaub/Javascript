<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    echo '<script>alert("Você precisa estar logado para acessar esta página!"); window.location.href = "../telas/login.php";</script>';
}

$idProduto = $_GET['p'];

if (!isset($_SESSION['idPedido'])) {
    $resposta = mysqli_query($conexao, "SELECT MAX(id) FROM pedido");

    while ($dados = mysqli_fetch_array($resposta)) {
        $idPedido = $dados[0];
    }

    if (is_null($idPedido)) {
        $idPedido = 1;
    }
    else {
        $idPedido++;
    }

    $idPessoa = $_SESSION['id'];
    $data = time();

    mysqli_query($conexao, "INSERT INTO pedido (idPedido, idPessoa, data, status) VALUES ($idPedido, $idPessoa, $data, 0)");

    $_SESSION['idPedido'] = $idPedido;
}
else {
    $idPedido = $_SESSION['idPedido'];
}

if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM itemPedido WHERE idPedido = $idPedido AND idProduto = $idProduto")) <= 0) {
    mysqli_query($conexao, "INSERT INTO itemPedido (idPedido, idProduto, quantidade) VALUES ($idPedido, $idProduto, 1)");
}
else {
    mysqli_query($conexao, "UPDATE itemPedido SET quantidade = quantidade + 1 WHERE idPedido = $idPedido AND idProduto = $idProduto");
}

echo "<script>window.location.href = '../index.php';</script>";