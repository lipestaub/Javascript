<?php

include "../conexao/conectar.php";

$operacao = trim($_POST['operacao']);

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
        echo "<script>alert('Preencha os campos $camposVazios!'); window.location.href = '../telas/autoCadastroCliente.php'</script>";
    }
    else {
        $nome = $_POST['nome'];
        $documento = $_POST['documento'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    }


    //$sql = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) VALUES ($nome, $dpcumento, $telefone, $email, $senha, $perfil)";
}