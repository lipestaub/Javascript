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
    <h3>Cadastrar imagem</h3>

    <?php
    include "../conexao/conectar.php";

    $idProduto = $_GET['p'];

    $resposta = mysqli_query($conexao, "SELECT * FROM produto WHERE id = $idProduto");

    while ($dados = mysqli_fetch_array($resposta)) {
        $descricao = $dados[1];
        $preco = $dados[2];
        $estoque = $dados[3];
        $caminhoImagem = $dados[4];
    }
    ?>

    <form action="../controle/controleCadastro.php" method="post" enctype="multipart/form-data">
        Produto: 
        <?php echo $descricao ?>
        <br>
        <br>
        <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg">
        <br>
        <br>
        <input type="hidden" name="idProduto" id="idProduto" value="<?php echo $idProduto ?>">
        <input type="hidden" name="operacao" id="operacao" value="cadastroImagem">
        <input class="button" type="submit" value="Cadastrar"/>
    </form>
</body>
</html>