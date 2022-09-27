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

    if (!isset($_SESSION['perfil'])) {
    ?>
        <a href="../index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="carrinho.php">Meu Carrinho</a>
        <a href="buscaProdutos.php">Buscar Produtos</a>
    <?php
    }
    elseif ($_SESSION['perfil'] == 0) {
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
        <a href="controleEstoque.php">Controle de estoque</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<body>
    <br>
    <h3>Buscar produtos</h3>

    <form action="../telas/buscaProdutos.php" method="post">
        <input type="text" name="descricao" id="descricao">
        <br>
        <br>
        <input type="submit" value="Buscar">
    </form>

    <?php
        if ($_POST['descricao']) {
            include "../conexao/conectar.php";

            $descricao = $_POST["descricao"];

            $query = "SELECT * FROM produto WHERE descricao LIKE '%" . $descricao . "%'";
            $select = mysqli_query($conexao, $query);

            echo "<br>";
            echo "Resultados da pesquisa por '" . $descricao . "':";
            echo "<br>";

            if (mysqli_num_rows($select) > 0) {
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
                        ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </table>
        <?php
            }
            else {
                echo"<br>";
                echo "Nenhum produto encontrado.";
            }
        }
        ?>
    
</body>
</html>