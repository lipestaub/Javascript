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

if (!isset($_SESSION['perfil']) || $_SESSION['perfil'] == 0) {
    exit(0);
}
?>

<menu>
    <a href="../index.php">Home</a>
    <a href="carrinho.php">Meu Carrinho</a>
    <a href="buscaProdutos.php">Buscar Produtos</a>
    <a href="cadastroProdutos.php">Cadastrar Produtos</a>
    <a href="cadastroPessoas.php">Cadastrar Pessoas</a>
    <a href="controleEstoque.php">Controle de estoque</a>
    <a href="../controle/controleLogout.php">Sair</a>
</menu>

<body>
    <br>
    <h3>Controle de estoque</h3>

    <form action="../controle/controleEstoque.php" method="post">
        Documento:
        <br>
        <input type="text" name="documento" id="documento">
        <br>
        <br>
        Produto:
        <br>
        <select name="produto" id="produto">
            <option value="0">Selecione...</option>

            <?php
            include "../conexao/conectar.php";

            $query = "SELECT id, descricao FROM produto";
            $select = mysqli_query($conexao, $query);
            
            while ($dados = mysqli_fetch_assoc($select)) {
                $i += 1;
            
                $arrayProdutos[$i]['id'] = $dados['id'];
                $arrayProdutos[$i]['descricao'] = $dados['descricao'];
            }
            
            for ($i = 1; $i <= mysqli_num_rows($select); $i++) {
                $idProduto = $arrayProdutos[$i]['id'];
                $descricao = $arrayProdutos[$i]['descricao'];

                echo "<option value='$idProduto'>$descricao</option>";
            }
            ?>
        </select>
        <br>
        <br>
        Quantidade:
        <br>
        <input type="number" min="1" value="1" name="quantidade" id="quantidade">
        <br>
        <br>
        <input class="button" type="submit" value="Salvar">
    </form>
</body>
</html>