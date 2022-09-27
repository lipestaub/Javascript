<?php

include "../conexao/conectar.php";

session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    exit(0);
}

foreach ($_POST as $key=>$value) {
    if ((strlen(trim($value))) == 0) {
        $camposVazios .= "$key, ";
    }
}

$camposVazios = substr($camposVazios, 0, -2);

if ($camposVazios != null && !empty($camposVazios)) {
    echo "<script>alert('Preencha corretamente o(s) campo(s): " . $camposVazios . "!'); window.location.href = '../telas/editarProduto.php?=p=$idProduto';</script>";
}
else {
    $camposInvalidos = "";
    $numeroErros = 0;

    $idProduto = $_POST['idProduto'];
    $descricao = trim($_POST['descricao']);
    $preco = (float) number_format((float) str_replace(" ", "", $_POST['preco']), 3, ".", "");
    $estoque = (float) number_format((float) trim($_POST['estoque']), 3, ".", "");

    if (strlen($descricao) < 2) {
        $camposInvalidos .= "\\nA descrição deve ter no mínimo 2 caracteres!";
        $numeroErros += 1;
    }

    if ($preco <= 0) {
        $camposInvalidos .= "\\nO preco deve ser maior que R$ 0,00!";
        $numeroErros += 1;
    }

    if ($numeroErros > 0) {
        echo "<script>alert('Foram identificados " . $numeroErros . " erro(s):\\n" . $camposInvalidos . "'); window.location.href = '../telas/editarProduto.php?p=$idProduto';</script>";
    }
    else {
        $update = mysqli_query($conexao, "UPDATE produto SET descricao = '$descricao', preco = $preco, estoque = $estoque WHERE id = $idProduto");
        
        if ($update) {
            echo "<script>alert('O produto " . $descricao . " foi editado com sucesso!'); window.location.href = '../index.php';</script>";
        }
        else {
            echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/editarProduto.php?=p=$idProduto';</script>";
        }
    }
}