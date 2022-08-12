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
    <script>window.location.href = '../index.php';</script>
<?php
}
?>

<menu>
    <?php
    session_start();

    if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    ?>
        <a href="../index.php">Home</a>
        <a href="login.php">Entrar</a>
        <a href="autoCadastroCliente.php">Cadastre-se</a>
        <a href="carrinho.php">Meu Carrinho</a>
        <a href="buscaProdutos.php">Buscar Produtos</a>
        <a href="../controle/controleLogout.php">Sair</a>         
    <?php
    }
    elseif ($_SESSION['perfil'] == 1) {
    ?>
        <a href="../index.php">Home</a>
        <a href="carrinho.php">Meu Carrinho</a>
        <a href="buscaProdutos.php">Buscar Produtos</a>
        <a href="cadastroProdutos.php">Cadastrar Produtos</a>
        <a href="cadastroPessoas.php">Cadastrar Pessoas</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<body>
    <form action="../controle/controleLogin.php" method="post">
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
        <input class="button" type="submit" value="Entrar">
        <a href="http://localhost/telas/autoCadastroCliente.php">
            <input type="button" value="Cadastre-se"/>
        </a>
    </form>
</body>
</html>