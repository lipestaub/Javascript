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
        <a href="login.php">Entrar/Cadastrar-se</a>
        <a href="carrinho.php">Meu Carrinho</a>
        <a href="buscaProdutos.php">Buscar Produtos</a>
        <a href="cadastroProdutos.php">Cadastrar Produtos</a>
        <a href="cadastroClientes.php">Cadastrar Clientes</a>
        <a href="cadastroFuncionarios.php">Cadastrar Funcionarios</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<body>
    <form action="../controle/controleCRUD.php" method="post">
        Nome:
        <br>
        <input type="test" name="nome" id="nome">
        <br>
        <br>
        CPF:
        <br>
        <input type="number" name="documento" id="documento">
        <br>
        <br>
        Telefone:
        <br>
        <input type="text" name="telefone" id="telefone" data-role="input, input-mask" data-mask="+380 (__) ___-____">
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