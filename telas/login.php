<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../recursos/carrinho.ico">
    <title>Azamon</title>
</head>

<menu class="menu"
    <ul>
        <?php
            if(!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
        ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="login.php">Entrar</a></li>
                <li><a href="autoCadastroCliente.php">Cadastre-se</a></li>
                <li><a href="carrinho.php">Meu Carrinho</a></li>
                <li><a href="buscaProdutos.php">Buscar Produtos</a></li>
                <li><a href="../controle/controleLogout.php">Sair</a></li>
        <?php
            }
            elseif ($_SESSION['perfil'] == 1) {
        ?>
                <li><a href="../index.php">Home</a></li>
                <li><a href="login.php">Entrar/Cadastrar-se</a></li>
                <li><a href="carrinho.php">Meu Carrinho</a></li>
                <li><a href="buscaProdutos.php">Buscar Produtos</a></li>
                <li><a href="cadastroProdutos.php">Cadastrar Produtos</a></li>
                <li><a href="cadastroClientes.php">Cadastrar Clientes</a></li>
                <li><a href="cadastroFuncionarios.php">Cadastrar Funcionarios</a></li>
                <li><a href="../controle/controleLogout.php">Sair</a></li>
        <?php
            }
        ?>
    </ul>
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
    </form>
</body>
</html>