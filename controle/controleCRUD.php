<?php

include "../conexao/conectar.php";

if (isset($_POST['nome']) && isset($_POST['documento']) && isset($_POST['telefone']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['operacao'])) {
    $nome = $_POST['nome'];
    $documento = $_POST['documento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $operacao = $_POST['operacao'];
}
else {
    
}

if ($operacao == "cadastroCliente") {
    $perfil = 0;

/*    foreach ($_POST as $value) {
        if ()
    }*/

    //$sql = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) VALUES ($nome, $dpcumento, $telefone, $email, $senha, $perfil)";
}
else {
    echo "AAAAAAAAAAAAAAAAa";
}