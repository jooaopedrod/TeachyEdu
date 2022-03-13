<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>TeachyEdu - Login</title>
    <link rel="stylesheet" href="../../public/css/styleLogin.css">
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form method="post" action="../controller/UsuarioController.php">
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                <div class="underline"></div>
            </div>
            <div class="input-field">
                <input type="password" name="senha" id="password" placeholder="Digite sua senha" required>
                <div class="underline"></div>
            </div>

            <input class="btnSubmit" type="submit" name="requisicao" value="Entrar">
        </form>

        <div class="footer">
            <span><a href="esqueceuASenha.php">Esqueceu a senha?</a></span>
        </div>
    </main>
</body>
</html>