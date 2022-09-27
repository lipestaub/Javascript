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

if (isset($_SESSION['perfil'])) {
?>
    <script>window.location.href = '../index.php';</script>
<?php
}
?>

<menu>
    <a href="../index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="carrinho.php">Meu Carrinho</a>
    <a href="buscaProdutos.php">Buscar Produtos</a>
</menu>

<body>
    <br>
    <h3>Login</h3>
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
        <input class="button" type="submit" value="Login">
        <a href="http://localhost/telas/autoCadastroCliente.php">
            <input type="button" value="Cadastre-se"/>
        </a>
    </form>
</body>
</html>