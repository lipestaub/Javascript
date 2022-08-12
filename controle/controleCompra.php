<?php

include "../conexao/conectar.php";

$idProduto = $_GET['p'];
    
echo $idProduto;

echo "<script>window.location.href = '../index.php';</script>";