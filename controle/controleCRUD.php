<?php

include "../conexao/conectar.php";

$operacao = trim($_POST['operacao']);

/*
if (isset($_POST['operacao'])) {
    $operacao = trim($_POST['operacao']);
}

if (empty($operacao)) {
    header("Location: ../telas/erro.php");
    exit;
}
*/

if ($operacao == "cadastroCliente") {    
    foreach ($_POST as $key=>$value) {
        if (empty(trim($value))) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if (isset($camposVazios) && ($camposVazios != null && !empty($camposVazios))) {
        echo "<script>alert('Preencha corretamente os campos ' . $camposVazios . '!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
    }
    else {
        $camposInvalidos = "";
        $numeroErros = 0;

        if (strlen(trim($_POST['nome'])) < 3) {
            $camposInvalidos .= "O nome deve ter no mínimo 3 caracteres!\n";
            $numeroErros += 1;
        }

        if (strlen(trim($_POST['documento'])) != 11) {
            $camposInvalidos .= "O CPF deve ter 11 dígitos!\n";
            $numeroErros += 1;
        }

        if (strlen(trim($_POST['telefone'])) < 9) {
            $camposInvalidos .= "O telefone deve ter no mínimo 9 dígitos!\n";
            $numeroErros += 1;
        }

        if (strlen(trim($_POST['senha'])) < 6) {
            $camposInvalidos .= "A senha deve ter no mínimo 6 caracteres!\n";
            $numeroErros += 1;
        }

        if ($numeroErros > 0) {
            echo "<script>alert('Foram identificados ' . $numeroErros . ' erros:\n' . $camposInvalidos . '); window.location.href = '../telas/autoCadastroCliente.php';</script>";
        }
        else {
            $perfil = 0;
            $nome = trim($_POST['nome']);
            $documento = trim($_POST['documento']);
            $telefone = trim($_POST['telefone']);
            $email = trim($_POST['email']);
            $senha = trim($_POST['senha']);

            $query = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) ";
            $query .= "VALUES ('$nome', '$documento', '$telefone', '$email', '$senha', $perfil)";

            $insert = mysqli_query($conexao, $query);
            
            if ($insert) {
                echo "<script>alert(' . $nome . ', seu cadastro foi efetuado com sucesso!'); window.location.href = '../index.php';</script>";
            }
            else {
                echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
            }
        }

    }
}