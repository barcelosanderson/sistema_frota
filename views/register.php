<!DOCTYPE html>
<html>
<head>
<title>Cadastro</title>
<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 350px;">
    <h4 class="mb-3">Cadastrar Usuário</h4>

    <form action="../controllers/auth.php" method="POST">
        <input type="hidden" name="action" value="register">

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" required class="form-control" name="nome">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" required class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label>Senha</label>
            <input type="password" required class="form-control" name="senha">
        </div>

        <button class="btn btn-success w-100">Cadastrar</button>
        <a href="login.php" class="d-block mt-2">Voltar</a>
    </form>
</div>

</body>
</html>
