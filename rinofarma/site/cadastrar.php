<?php
require_once 'config/conexao.php';
require_once 'includes/header.php';

if(isset($_POST['salvar'])) {
    $sql = $pdo->prepare("INSERT INTO produtos (nome, fabricante, preco, estoque) VALUES (?, ?, ?, ?)");
    $sql->execute([
        $_POST['nome'],
        $_POST['fabricante'],
        $_POST['preco'],
        $_POST['estoque']
    ]);

    header("Location: index.php");
}
?>

<h2>Cadastrar Produto</h2>

<form method="POST">
    <input name="nome" placeholder="Nome"><br><br>
    <input name="fabricante" placeholder="Fabricante"><br><br>
    <input name="preco" placeholder="Preço"><br><br>
    <input name="estoque" placeholder="Estoque"><br><br>

    <button name="salvar">Salvar</button>
</form>

<?php require_once 'includes/footer.php'; ?>