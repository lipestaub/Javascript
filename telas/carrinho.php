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
?>
    <script>alert("Você precisa estar logado para acessar esta página!"); window.location.href = 'login.php';</script>
<?php
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
        <a href="controleEstoque.php">Controle de estoque</a>
        <a href="../controle/controleLogout.php">Sair</a>
    <?php
    }
    ?>
</menu>

<body>
    <?php

    include "../conexao/conectar.php";

    if (isset($_SESSION['idPedido'])) { 
        $idPedido = $_SESSION['idPedido'];

        $query = "SELECT PE.id AS idPedido, P.id AS idProduto, P.descricao AS descricao, P.preco AS preco, IP.quantidade AS quantidade, (preco * quantidade) AS valorTotal, P.caminhoImagem AS caminhoImagem FROM produto P INNER JOIN itemPedido IP ON P.id = IP.idProduto INNER JOIN pedido PE ON PE.id = IP.idPedido WHERE PE.idPedido = $idPedido";
        $select = mysqli_query($conexao, $query);

        if (mysqli_num_rows($select) <= 0) {
        ?>
            <br>
            <h3>Meu carrinho</h3>
            <span class="mensagem">Nenhum produto encontrado.</span>
        <?php
        }
        else {
            while ($dados = mysqli_fetch_assoc($select)) {
                $i += 1;

                $arrayItensPedido[$i]['idPedido'] = $dados['idPedido'];
                $arrayItensPedido[$i]['idProduto'] = $dados['idProduto'];
                $arrayItensPedido[$i]['descricao'] = $dados['descricao'];
                $arrayItensPedido[$i]['preco'] = $dados['preco'];
                $arrayItensPedido[$i]['quantidade'] = $dados['quantidade'];
                $arrayItensPedido[$i]['valorTotal'] = $dados['valorTotal'];
                $arrayItensPedido[$i]['caminhoImagem'] = $dados['caminhoImagem'];

                $totalItensCarrinho += (int) $dados['quantidade'];
            }
            ?>

            <br>
            <h3>Meu carrinho (<?php echo $totalItensCarrinho > 1 ? $totalItensCarrinho . " itens" : $totalItensCarrinho . " item" ?>)</h3>

            <table>
            <tr>
                <th></th>
                <th>Descri&ccedil;&atilde;o</th>
                <th>Pre&ccedil;o</th>
                <th>Quantidade</th>
                <th>Total</th>
                <th>Op&ccedil;&otilde;es</th>
            </tr>

            <?php
            foreach ($arrayItensPedido as $item) {
            ?>
                <tr>
                    <td>
                        <?php
                        if ($item['caminhoImagem'] == "") {
                        ?>
                            <img src="../imagens/defaultImage.jpg">
                        <?php
                        }
                        else {
                        ?>
                            <img src="<?php echo $item['caminhoImagem']; ?>">
                        <?php
                        }
                        ?>
                    </td>
                    <td> <?php echo $item['descricao'] ?> </td>
                    <td> <?php echo 'R$ ' . number_format($item['preco'], 2, ',', ''); ?> </td>
                    <td> <?php echo (int) $item['quantidade']; ?> </td>
                    <td> <?php echo 'R$ ' . number_format($item['valorTotal'], 2, ',', ''); ?> </td>
                    <td>
                    <?php
                        $id = $item['idProduto'];

                        echo "<a href='http://localhost/telas/editarPedido.php?p=$id'>";
                            echo "<input type='button' value='Editar'/>";
                        echo "</a>";
                        echo "<a href='http://localhost/controle/excluirProduto.php?p=$id'>";
                            echo "<input type='button' value='Excluir'/>";
                        echo "</a>";
                    ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <a href='http://localhost/controle/controlePedido.php'>
                        <input type='button' value='Finalizar pedido'/>
                    </a>
                </td>
            </tr>
            </table>
        <?php       
        }
    }
    else {
        ?>
        <br>
        <h3>Meu carrinho</h3>
        <span class="mensagem">Nenhum produto encontrado.</span>
        <?php
    }
    ?>
</body>
</html>