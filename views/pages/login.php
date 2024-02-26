<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CRM</title>
    <link rel="stylesheet" href="views/css/login.css">
</head>
<body>
    <main>
        <h1>Login</h1>
        <form action="<?= ROOT_PATH ?>" method="post" class="formLogin">
            <input type="text" placeholder="Usuário" name="usuario">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="Login" name="login">
        </form>
        <a href="<?= ROOT_PATH ?>cadastro">Cadastrar novo usuário</a>
    </main>
    <script src="views/js/jquery.js"></script>
    <script src="views/js/notify.min.js"></script>
</body>
</html>