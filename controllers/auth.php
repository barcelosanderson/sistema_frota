<?php
session_start();
require_once "../database/connection.php";

if (isset($_POST['action']) && $_POST['action'] == "login") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($senha, $user['senha'])) {
        $_SESSION['user'] = $user['id'];
        header("Location: ../views/dashboard.php");
        exit;
    } else {
        header("Location: ../views/login.php?erro=1");
    }
}

if (isset($_POST['action']) && $_POST['action'] == "register") {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?,?,?)");
    $stmt->execute([$nome, $email, $senha]);

    header("Location: ../views/login.php?registrado=1");
}
