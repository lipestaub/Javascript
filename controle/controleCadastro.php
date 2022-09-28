<?php

include "../conexao/conectar.php";

$operacao = trim($_POST['operacao']);

if ($operacao == "cadastroCliente") {

    foreach ($_POST as $key=>$value) {
        if ((strlen(trim($value))) == 0) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if ($camposVazios != null && !empty($camposVazios)) {
        echo "<script>alert('Preencha corretamente o(s) campo(s): " . $camposVazios . "!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
    }
    else {
        $camposInvalidos = "";
        $numeroErros = 0;

        $perfil = 0;
        $nome = trim($_POST['nome']);
        $documento = trim($_POST['documento']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        if (strlen($nome) < 3) {
            $camposInvalidos .= "\\nO nome deve ter no mínimo 3 caracteres!";
            $numeroErros += 1;
        }

        if (strlen($documento) != 11) {
            $camposInvalidos .= "\\nO CPF deve ter 11 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($telefone) < 9) {
            $camposInvalidos .= "\\nO telefone deve ter no mínimo 9 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($senha) < 6) {
            $camposInvalidos .= "\\nA senha deve ter no mínimo 6 caracteres!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE email='$email'")) > 0) {
            $camposInvalidos .= "\\nO e-mail $email já está cadastrado!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE documento='$documento'")) > 0) {
            $camposInvalidos .= "\\nO CPF $documento já está cadastrado!";
            $numeroErros += 1;
        }

        if ($numeroErros > 0) {
            echo "<script>alert('Foram identificados " . $numeroErros . " erro(s):\\n" . $camposInvalidos . "'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
        }
        else {
            $query = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) ";
            $query .= "VALUES ('$nome', '$documento', '$telefone', '$email', '$senha', $perfil)";

            $insert = mysqli_query($conexao, $query);
            
            if ($insert) {
                echo "<script>alert('" . $nome . ", seu cadastro foi efetuado com sucesso!'); window.location.href = '../telas/login.php';</script>";
            }
            else {
                echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/autoCadastroCliente.php';</script>";
            }
        }

    }
}
elseif ($operacao == "cadastroPessoas") {
    foreach ($_POST as $key=>$value) {
        if ((strlen(trim($value))) == 0) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if ($camposVazios != null && !empty($camposVazios)) {
        echo "<script>alert('Preencha corretamente o(s) campo(s): " . $camposVazios . "!'); window.location.href = '../telas/cadastroPessoas.php';</script>";
    }
    else {
        $camposInvalidos = "";
        $numeroErros = 0;

        $perfil = trim($_POST['perfil']) == 2 ? 0 : trim($_POST['perfil']);
        $nome = trim($_POST['nome']);
        $documento = trim($_POST['documento']);
        $telefone = trim($_POST['telefone']);
        $email = trim($_POST['email']);
        $senha = trim($_POST['senha']);

        if (strlen($nome) < 3) {
            $camposInvalidos .= "\\nO nome deve ter no mínimo 3 caracteres!";
            $numeroErros += 1;
        }

        if (strlen($documento) != 11) {
            $camposInvalidos .= "\\nO CPF deve ter 11 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($telefone) < 9) {
            $camposInvalidos .= "\\nO telefone deve ter no mínimo 9 dígitos!";
            $numeroErros += 1;
        }

        if (strlen($senha) < 6) {
            $camposInvalidos .= "\\nA senha deve ter no mínimo 6 caracteres!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE email='$email'")) > 0) {
            $camposInvalidos .= "\\nO e-mail '$email' já está cadastrado!";
            $numeroErros += 1;
        }

        if (mysqli_num_rows(mysqli_query($conexao, "SELECT id FROM pessoa WHERE documento='$documento'")) > 0) {
            $camposInvalidos .= "\\nO CPF $documento já está cadastrado!";
            $numeroErros += 1;
        }

        if ($numeroErros > 0) {
            echo "<script>alert('Foram identificados " . $numeroErros . " erro(s):\\n" . $camposInvalidos . "'); window.location.href = '../telas/cadastroPessoas.php';</script>";
        }
        else {
            $query = "INSERT INTO pessoa (nome, documento, telefone, email, senha, perfil) ";
            $query .= "VALUES ('$nome', '$documento', '$telefone', '$email', '$senha', $perfil)";

            $insert = mysqli_query($conexao, $query);
            
            if ($insert) {
                echo "<script>alert('O cadastro de " . $nome . " foi efetuado com sucesso!'); window.location.href = '../telas/cadastroPessoas.php';</script>";
            }
            else {
                echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/cadastroPessoas.php';</script>";
            }
        }

    }
}
elseif ($operacao == "cadastroProdutos") {
    foreach ($_POST as $key=>$value) {
        if ((strlen(trim($value))) == 0) {
            $camposVazios .= "$key, ";
        }
    }

    $camposVazios = substr($camposVazios, 0, -2);

    if ($camposVazios != null && !empty($camposVazios)) {
        echo "<script>alert('Preencha corretamente o(s) campo(s): " . $camposVazios . "!'); window.location.href = '../telas/cadastroProdutos.php';</script>";
    }
    else {
        $camposInvalidos = "";
        $numeroErros = 0;

        $descricao = trim($_POST['descricao']);
        $preco = (float) number_format((float) str_replace(" ", "", $_POST['preco']), 4, ".", "");
        $quantidade = (float) number_format((float) trim($_POST['quantidade']), 3, ".", "");

        if (strlen($descricao) < 2) {
            $camposInvalidos .= "\\nA descrição deve ter no mínimo 2 caracteres!";
            $numeroErros += 1;
        }

        if ($preco <= 0) {
            $camposInvalidos .= "\\nO preco deve ser maior que R$ 0,00!";
            $numeroErros += 1;
        }

        if ($numeroErros > 0) {
            echo "<script>alert('Foram identificados " . $numeroErros . " erro(s):\\n" . $camposInvalidos . "'); window.location.href = '../telas/cadastroProdutos.php';</script>";
        }
        else {
            if (empty($_FILES['imagem']['full_path'])) {
                $caminhoImagem = "";
            }
            else {
                $idProduto = mysqli_fetch_row(mysqli_query($conexao, "SELECT MAX(id) FROM produto"))[0] + 1;
                $caminho = "../imagens/produtos/" . $idProduto . "/";
                $caminho_tmp = $_FILES['imagem']['tmp_name'];

                $imgExtension = explode(".", $_FILES['imagem']['name'])[1];
                $nome_arquivo = "img" . 1 . "." . $imgExtension;

                $caminhoImagem = $caminho . $nome_arquivo;

                if (!is_dir($caminho)) {
                    mkdir($caminho, 0777);
                }
        
                if (!move_uploaded_file($caminho_tmp, $caminhoImagem)) {
                    echo "<script>alert('Erro ao fazer upload!');</script>";
                }
            }

            $query = "INSERT INTO produto (descricao, preco, estoque, caminhoImagem) ";
            $query .= "VALUES ('$descricao', $preco, $quantidade, '$caminhoImagem')";

            $insert = mysqli_query($conexao, $query);
            
            if ($insert) {
                echo "<script>alert('O produto " . $descricao . " foi cadastrado com sucesso!'); window.location.href = '../telas/cadastroProdutos.php';</script>";
            }
            else {
                echo "<script>alert('Algo deu errado!'); window.location.href = '../telas/cadastroProdutos.php';</script>";
            }
        }
    }
}