<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="../imagens/carrinho.ico">
    <title>Azamon</title>
</head>

<menu>
    <?php
    session_start();

    if (!isset($_SESSION['perfil'])) {
    ?>
        <a href="index.php">Home</a>
        <a href="telas/login.php">Login</a>
        <a href="telas/carrinho.php">Meu Carrinho</a>
        <a href="telas/buscaProdutos.php">Buscar Produtos</a>
    <?php
    }
    elseif ($_SESSION['perfil'] == 0) {
    ?>
        <a href="index.php">Home</a>
        <a href="telas/carrinho.php">Meu Carrinho</a>
        <a href="telas/buscaProdutos.php">Buscar Produtos</a>
        <a href="controle/controleLogout.php">Sair</a>
    <?php
    }
    elseif ($_SESSION['perfil'] == 1) {
    ?>
        <a href="index.php">Home</a>
        <a href="telas/carrinho.php">Meu Carrinho</a>
        <a href="telas/buscaProdutos.php">Buscar Produtos</a>
        <a href="telas/cadastroProdutos.php">Cadastrar Produtos</a>
        <a href="telas/cadastroPessoas.php">Cadastrar Pessoas</a>
        <a href="telas/controleEstoque.php">Controle de estoque</a>
        <a href="controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<?php
if (isset($_SESSION['nome'])) {
?>
    <div class="boasVindas"> Bem-vindo, <?php echo $_SESSION['nome'] ?> </div>
<?php
}
?>

<body>
    <br>
    <h3>Tela inicial</h3>

    <?php

    include "conexao/conectar.php";

    $query = "SELECT * FROM produto";
    $select = mysqli_query($conexao, $query);

    while ($dados = mysqli_fetch_assoc($select)) {
        $i += 1;

        $arrayProdutos[$i]['id'] = $dados['id'];
        $arrayProdutos[$i]['descricao'] = $dados['descricao'];
        $arrayProdutos[$i]['preco'] = $dados['preco'];
        $arrayProdutos[$i]['estoque'] = $dados['estoque'];
    }
    ?>

    <table>
    <tr>
        <th>Descri&ccedil;&atilde;o</th>
        <th>Pre&ccedil;o</th>
        <th>Op&ccedil;&otilde;es</th>
    </tr>

    <?php
    foreach ($arrayProdutos as $produto) {
    ?>
        <tr>
            <td> <?php echo $produto['descricao']; ?> </td>
            <td> <?php echo 'R$ ' . number_format($produto['preco'], 2, ',', ''); ?> </td>
            <td>
            <?php
                $id = $produto['id'];

                echo "<a href='http://localhost/controle/controleCompra.php?p=$id'>";
                    echo "<input type='button' value='Comprar'/>";
                echo "</a>";

                if ($_SESSION['perfil'] == 1) {
                    echo "<a href='http://localhost/telas/editarProduto.php?p=$id'>";
                        echo "<input type='button' value='Editar produto'/>";
                    echo "</a>";
                    echo "<a href='http://localhost/telas/cadastrarImagem.php?p=$id'>";
                        echo "<input type='button' value='Cadastrar imagem'/>";
                    echo "</a>";
                }
            ?>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>
</body>
</html>