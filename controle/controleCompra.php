<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil'])) {
    echo "<script>alert('Você precisa estar logado para acessar esta página!'); window.location.href = '../telas/login.php';</script>";

}

$idProduto = $_GET['p'];
    
echo $idProduto;

// echo "<script>window.location.href = '../index.php';</script>";