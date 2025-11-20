<!-- views/login.php -->
<?php session_start(); if(isset($_SESSION['user'])) header("Location: dashboard.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - Sistema de Frota</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #1d3557, #457b9d);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-box {
        width: 400px;
        background: #fff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 15px #0003;
    }
</style>
</head>

<body>

<div class="login-box">
    <h3 class="text-center mb-4">Acessar Sistema</h3>

    <?php if(isset($_GET['erro'])): ?>
        <div class="alert alert-danger">Usuário ou senha incorretos.</div>
    <?php endif; ?>

    <form action="../controllers/auth.php" method="POST">
        <input type="hidden" name="action" value="login">

        <label>Email</label>
        <input type="email" name="email" class="form-control mb-3" required>

        <label>Senha</label>
        <input type="password" name="senha" class="form-control mb-3" required>

        <button class="btn btn-primary w-100">Entrar</button>

        <a href="register.php" class="d-block mt-3 text-center">Criar uma conta</a>
    </form>
</div>

</body>
</html>
