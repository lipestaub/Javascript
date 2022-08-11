<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="icon" href="../recursos/carrinho.ico">
    <title>Azamon</title>
</head>

<?php
    session_start();

    if (isset($_SESSION['perfil'])) {
    ?>
        <script>alert("Você já está cadastrado!"); window.location.href = '../index.php';</script>
    <?php
    }
?>

<menu>
    <a href="../index.php">Home</a>
    <a href="login.php">Entrar</a>
    <a href="carrinho.php">Meu Carrinho</a>
    <a href="buscaProdutos.php">Buscar Produtos</a>
    <a href="../controle/controleLogout.php">Sair</a>
</menu>

<body>
    <form action="../controle/controleCRUD.php" method="post">
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
        <input type="hidden" name="operacao" id="operacao" value="cadastroCliente">
        <input class="button" type="submit" value="Cadastrar">
    </form>
</body>
</html>