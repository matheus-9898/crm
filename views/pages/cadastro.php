<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuário | CRM</title>
    <link rel="stylesheet" href="views/css/login.css">
</head>
<body>
    <main>
        <h1>Cadastro de usuário</h1>
        <form action="<?= ROOT_PATH ?>" method="post" class="formLogin">
            <input type="text" placeholder="Usuário" name="usuario">
            <input type="password" placeholder="Senha" name="senha">
            <input type="submit" value="Cadastrar" name="cadastro">
        </form>
        <a href="<?= ROOT_PATH ?>">Ir para login</a>
    </main>
<script src="views/js/jquery.js"></script>
<script src="views/js/notify.min.js"></script>
</body>
</html>