<?php 
session_start(); 
if(isset($_SESSION['user'])) header("Location: dashboard.php"); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>FROTAXI</title>
<link rel="icon" type="image/svg+xml" href="/views/favicon.svg?v=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
<?php include 'login_style.css'; ?>
</style>

</head>
<body>

<div class="container" id="container">

    <div class="form-container sign-up">
        <form action="../controllers/auth.php" method="POST">
            <input type="hidden" name="action" value="register">

            <h1>Criar Conta</h1>

            <input type="text" name="nome" placeholder="Nome" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <div class="form-container sign-in">
        <form action="../controllers/auth.php" method="POST">
            <input type="hidden" name="action" value="login">

            <h1>Entrar</h1>

            <?php if(isset($_GET['erro'])): ?>
                <p style="color:red; margin-bottom:10px;">Usuário ou senha incorretos.</p>
            <?php endif; ?>

            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>

    <div class="toggle-container">
        <div class="toggle">
            
            <div class="toggle-panel toggle-left">
                <h1>Bem-vindo de volta!</h1>
                <p>Entre com seus dados para acessar o sistema.</p>
                <button class="hidden" id="login">Entrar</button>
            </div>

            <div class="toggle-panel toggle-right">
                <img src="logo.svg">
                <p>Crie sua conta para acessar o sistema.</p>
                <button class="hidden" id="register">Registrar</button>
            </div>

        </div>
    </div>

</div>

<script>
<?php include 'login_script.js'; ?>
</script>

</body>
</html>
