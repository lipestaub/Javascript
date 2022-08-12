<?php

include "../conexao/conectar.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$resposta = mysqli_query($conexao, "SELECT id, perfil FROM pessoa WHERE email='$email' AND senha='$senha'");

if (mysqli_num_rows($resposta) > 0) {
    session_start();
    
    $arrayResposta = mysqli_fetch_row($resposta);

    $idPessoa = (int) $arrayResposta[0];
    $perfilPessoa = (int) $arrayResposta[1];   

    $_SESSION['id'] = $idPessoa;
    $_SESSION['perfil'] = $perfilPessoa;

    echo "<script>window.location.href = '../index.php';</script>";
}
else {
    echo "<script>window.location.href = '../telas/login.php';</script>";
}