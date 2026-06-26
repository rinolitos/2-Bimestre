<?php
try {
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // banco correto
    $pdo->exec("CREATE DATABASE IF NOT EXISTS rinofarma1_db");
    $pdo->exec("USE rinofarma1_db");

    // tabela produtos
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS produtos (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nome VARCHAR(100),
            fabricante VARCHAR(100),
            preco DECIMAL(10,2),
            estoque INT
        )
    ");

    echo "✔ Banco e tabela criados com sucesso!";
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>