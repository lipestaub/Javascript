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
    <h3>Cadastro produtos</h3>
    <form action="../controle/controleCadastro.php" method="post">
        Descri&ccedil;&atilde;o:
        <br>
        <input type="text" name="descricao" id="descricao">
        <br>
        <br>
        Pre&ccedil;o:
        <br>
        <input type="text" name="preco" id="preco">
        <br>
        <br>
        Quantidade:
        <br>
        <input type="number" min="0" value="0" name="quantidade" id="quantidade">
        <br>
        <br>
        <input type="hidden" name="operacao" id="operacao" value="cadastroProdutos">
        <input class="button" type="submit" value="Cadastrar">
    </form>
</body>
</html>