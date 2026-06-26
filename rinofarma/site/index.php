<?php
require_once 'config/conexao.php';
require_once 'includes/header.php';

$sql = $pdo->prepare("SELECT * FROM produtos");
$sql->execute();
$produtos = $sql->fetchAll();
?>

<h2>Produtos cadastrados</h2>

<?php foreach($produtos as $p): ?>

<div class="card">
    <h3><?= $p['nome']; ?></h3>
    <p>Fabricante: <?= $p['fabricante']; ?></p>
    <p>Preço: R$ <?= $p['preco']; ?></p>
    <p>Estoque: <?= $p['estoque']; ?></p>

    <a href="editar.php?id=<?= $p['id']; ?>">Editar</a> |
    <a href="excluir.php?id=<?= $p['id']; ?>">Excluir</a>
</div>

<?php endforeach; ?>

<?php require_once 'includes/footer.php'; ?>