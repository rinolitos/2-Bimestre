<?php
require_once 'config/conexao.php';
require_once 'includes/header.php';

$id = $_GET['id'];

$sql = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$sql->execute([$id]);
$produto = $sql->fetch();

if(isset($_POST['atualizar'])) {
    $sql = $pdo->prepare("UPDATE produtos SET nome=?, fabricante=?, preco=?, estoque=? WHERE id=?");
    $sql->execute([
        $_POST['nome'],
        $_POST['fabricante'],
        $_POST['preco'],
        $_POST['estoque'],
        $id
    ]);

    header("Location: index.php");
}
?>

<h2>Editar Produto</h2>

<form method="POST">
    <input name="nome" value="<?= $produto['nome']; ?>"><br><br>
    <input name="fabricante" value="<?= $produto['fabricante']; ?>"><br><br>
    <input name="preco" value="<?= $produto['preco']; ?>"><br><br>
    <input name="estoque" value="<?= $produto['estoque']; ?>"><br><br>

    <button name="atualizar">Atualizar</button>
</form>

<?php require_once 'includes/footer.php'; ?>