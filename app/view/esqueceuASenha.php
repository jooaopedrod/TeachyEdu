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
    <title>TeachyEdu - Esqueceu a senha</title>
    <link rel="icon" sizes="500x500" href="../../public/images/favicon.png">
    <link rel="stylesheet" href="../../public/css/styleLogin.css">
</head>
<body>
    <main class="containerEmail">
        <h2>Esqueceu a senha </h2>
        <form method="post" action="../controller/UsuarioController.php">
            <div class="input-field">
                <input type="email" name="email" id="email" placeholder="Digite seu email" required>
                <div class="underline"></div>
            </div>
            <input class="btnEmail" type="submit" name="requisicao" value="Continuar">
        </form>
    </main>
</body>
</html>