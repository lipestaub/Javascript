<?php

include "../conexao/conectar.php";

if (isset($_POST['operacao'])) {
    $operacao = trim($_POST['operacao']);
}

if (empty($operacao)) {
    header("Location: ../telas/erro.php");
    exit;
}

if ($operacao == "cadastroCliente") {   
    $perfil = 0;

    foreach ($_POST as $key=>$value) {
        if (empty(trim($value))) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if (isset($camposVazios) && ($camposVazios != null && !empty($camposVazios))) {
        
    }
    
    $nome = trim($_POST['nome']);
    $documento = trim($_POST['documento']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    //$sql = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) VALUES ($nome, $dpcumento, $telefone, $email, $senha, $perfil)";
}