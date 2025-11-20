<?php
require_once "../database/connection.php";

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

// LISTAR
if ($acao === "listar") {
    $st = $pdo->query("SELECT * FROM motoristas ORDER BY id DESC");
    echo json_encode($st->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// CRIAR
if ($acao === "criar") {
    $st = $pdo->prepare("INSERT INTO motoristas (nome, cpf, cnh, telefone) VALUES (?, ?, ?, ?)");
    $st->execute([$_POST['nome'], $_POST['cpf'], $_POST['cnh'], $_POST['telefone']]);
    header("Location: ../views/motoristas.php?msg=criado");
    exit;
}

// EDITAR
if ($acao === "editar") {
    $st = $pdo->prepare("UPDATE motoristas SET nome=?, cpf=?, cnh=?, telefone=? WHERE id=?");
    $st->execute([$_POST['nome'], $_POST['cpf'], $_POST['cnh'], $_POST['telefone'], $_POST['id']]);
    header("Location: ../views/motoristas.php?msg=editado");
    exit;
}

// EXCLUIR
if ($acao === "excluir") {
    $st = $pdo->prepare("DELETE FROM motoristas WHERE id=?");
    $st->execute([$_GET['id']]);
    header("Location: ../views/motoristas.php?msg=excluido");
    exit;
}
