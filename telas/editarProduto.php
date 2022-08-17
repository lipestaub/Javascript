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

if (!isset($_SESSION['perfil'])) {
    exit(0);
}
?>

<menu>
    <?php
    if ($_SESSION['perfil'] == 0) {
    ?>
        <a href="../index.php">Home</a>
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
    <br>
    <h3>Editar produto</h3>

    <?php
    include "../conexao/conectar.php";

    $idProduto = $_GET['p'];
    $idPedido = $_SESSION['idPedido'];

    $resposta = mysqli_query($conexao, "SELECT P.descricao, P.preco, IP.quantidade FROM produto P INNER JOIN itemPedido IP ON IP.idProduto = P.id WHERE IP.idProduto = $idProduto AND IP.idPedido = $idPedido");

    while ($dados = mysqli_fetch_array($resposta)) {
        $descricao = $dados[0];
        $preco = $dados[1];
        $quantidade = $dados[2];
    }
    ?>

    <form action="../controle/editarProduto.php" method="post">
        Descri&ccedil;&atilde;o:
        <br>
        <input type="text" name="descricao" id="descricao" value="<?php echo $descricao ?>" readonly>
        <br>
        <br>
        Pre&ccedil;o:
        <br>
        <input type="text" name="preco" id="preco" value="<?php echo $preco ?>" readonly>
        <br>
        <br>
        Quantidade:
        <br>
        <input type="text" name="quantidade" id="quantidade" value="<?php echo $quantidade ?>">
        <br>
        <br>
        <input type="hidden" name="idProduto" id="idProduto" value="<?php $idProduto ?>">
        <input class="button" type="submit" value="Login">
        <a href="http://localhost/telas/autoCadastroCliente.php">
            <input type="button" value="Salvar"/>
        </a>
    </form>
</body>
</html>