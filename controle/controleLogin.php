<?php

include "../conexao/conectar.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$resposta = mysqli_query($conexao, "SELECT id, nome, perfil FROM pessoa WHERE email='$email' AND senha='$senha'");

if (mysqli_num_rows($resposta) > 0) {
    session_start();
    
    $arrayResposta = mysqli_fetch_row($resposta);

    $idPessoa = (int) $arrayResposta[0];
    $nomePesssoa = $arrayResposta[1];
    $perfilPessoa = (int) $arrayResposta[2];   

    $_SESSION['id'] = $idPessoa;
    $_SESSION['nome'] = $nomePesssoa;
    $_SESSION['perfil'] = $perfilPessoa;

    echo "<script>window.location.href = '../index.php';</script>";
}
else {
    echo "<script>window.location.href = '../telas/login.php';</script>";
}