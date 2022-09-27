<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../imagens/carrinho.ico">
    <title>Azamon</title>
</head>

<?php
session_start();

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    exit(0);
}
?>

<menu>
    <a href="../index.php">Home</a>
    <a href="carrinho.php">Meu Carrinho</a>
    <a href="buscaProdutos.php">Buscar Produtos</a>
    <a href="cadastroProdutos.php">Cadastrar Produtos</a>
    <a href="cadastroPessoas.php">Cadastrar Pessoas</a>
    <a href="controleEstoque.php">Controle de estoque</a>
    <a href="../controle/controleLogout.php">Sair</a>
</menu>

<body>
    <br>
    <h3>Cadastro pessoas</h3>
    <form action="../controle/controleCadastro.php" method="post">
        Nome:
        <br>
        <input type="text" name="nome" id="nome">
        <br>
        <br>
        CPF:
        <br>
        <input type="text" name="documento" id="documento">
        <br>
        <br>
        Telefone:
        <br>
        <input type="text" name="telefone" id="telefone">
        <br>
        <br>
        E-mail:
        <br>
        <input type="email" name="email" id="email">
        <br>
        <br>
        Senha:
        <br>
        <input type="password" name="senha" id="senha">
        <br>
        <br>
        Perfil:
        <br>
        <select name="perfil" id="perfil">
            <option value="0">Selecione...</option>
            <option value="1">Funcion&aacute;rio</option>
            <option value="2">Cliente</option>
        </select>
        <br>
        <br>
        <input type="hidden" name="operacao" id="operacao" value="cadastroPessoas">
        <input class="button" type="submit" value="Cadastrar">
    </form>
</body>
</html>