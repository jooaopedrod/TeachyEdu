<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>TeachyEdu - Login</title>
    <link rel="icon" sizes="500x500" href="../../public/images/favicon.png">
    <link rel="stylesheet" href="../../public/css/styleLogin.css">
</head>
<body>
    <main class="container">
        <h2>Login</h2>
        <form method="post" action="../controller/UsuarioController.php">
            <div class="<?php echo($_SESSION['erro_msg'] == null ? "input-field" : "input-field-erro");?>">
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                <div class="underline"></div>
            </div>
            <div class="<?php echo($_SESSION['erro_msg'] == null ? "input-field" : "input-field-erro");?>">
                <input type="password" name="senha" id="password" placeholder="Digite sua senha" minlength="5" required>
                <div class="underline"></div>
            </div>

            <input class="btnSubmit" type="submit" name="requisicao" value="Entrar">
        </form>

        <div class="footer">
            <span><a href="esqueceuASenha.php">Esqueceu a senha?</a></span>
            <span> </span>
            <?php if (!empty($_SESSION['erro_msg'])): ?>
                <span> <?php echo $_SESSION['erro_msg'] ?> </span>
                <?php unset($_SESSION['erro_msg']); ?>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>