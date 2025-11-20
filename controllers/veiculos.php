<?php
require_once "../database/connection.php";

$acao = $_GET['acao'] ?? $_POST['acao'] ?? null;

// LISTAR
if ($acao === "listar") {
    $st = $pdo->query("SELECT * FROM veiculos ORDER BY id DESC");
    echo json_encode($st->fetchAll(PDO::FETCH_ASSOC));
    exit;
}

// CRIAR
if ($acao === "criar") {
    $st = $pdo->prepare("INSERT INTO veiculos (modelo, placa, ano, status) VALUES (?, ?, ?, ?)");
    $st->execute([$_POST['modelo'], $_POST['placa'], $_POST['ano'], $_POST['status']]);
    header("Location: ../views/veiculos.php?msg=criado");
    exit;
}

// EDITAR
if ($acao === "editar") {
    $st = $pdo->prepare("UPDATE veiculos SET modelo=?, placa=?, ano=?, status=? WHERE id=?");
    $st->execute([$_POST['modelo'], $_POST['placa'], $_POST['ano'], $_POST['status'], $_POST['id']]);
    header("Location: ../views/veiculos.php?msg=editado");
    exit;
}

// EXCLUIR
if ($acao === "excluir") {
    $st = $pdo->prepare("DELETE FROM veiculos WHERE id=?");
    $st->execute([$_GET['id']]);
    header("Location: ../views/veiculos.php?msg=excluido");
    exit;
}
