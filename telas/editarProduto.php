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

if (!isset($_SESSION['perfil'])) {
    exit(0);
}
?>

<menu>
    <?php
    if ($_SESSION['perfil'] == 1) {
    ?>
        <a href="../index.php">Home</a>
        <a href="carrinho.php">Meu Carrinho</a>
        <a href="buscaProdutos.php">Buscar Produtos</a>
        <a href="cadastroProdutos.php">Cadastrar Produtos</a>
        <a href="cadastroPessoas.php">Cadastrar Pessoas</a>
        <a href="controleEstoque.php">Controle de estoque</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    else {
        exit(0);
    }
    ?>
</menu>

<body>
    <br>
    <h3>Editar produto</h3>

    <?php
    include "../conexao/conectar.php";

    $idProduto = $_GET['p'];

    $resposta = mysqli_query($conexao, "SELECT * FROM produto WHERE id = $idProduto");

    while ($dados = mysqli_fetch_array($resposta)) {
        $descricao = $dados[1];
        $preco = $dados[2];
        $estoque = $dados[3];
    }
    ?>

    <form action="../controle/editarProduto.php" method="post" enctype="multipart/form-data">
        Descri&ccedil;&atilde;o: 
        <input type="text" name="descricao" id="descricao" value="<?php echo $descricao ?>">
        <br>
        <br>
        Pre&ccedil;o: 
        <input type="text" name="preco" id="preco" value="<?php echo number_format($preco, 2, '.', '') ?>">
        <br>
        <br>
        Estoque:
        <input type="number" name="estoque" id="estoque" value="<?php echo (int) $estoque ?>">
        <br>
        <br>
        Imagem:
        <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg">
        <br>
        <br>
        <input type="hidden" name="idProduto" id="idProduto" value="<?php echo $idProduto ?>">
        <input class="button" type="submit" value="Salvar"/>
    </form>
</body>
</html>