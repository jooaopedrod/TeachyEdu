<?php
require_once "../../../model/dao/UsuarioDAO.php";
require_once "../../../model/Usuario.php";
//    recuperar o token da url e achar a que usuario ele pertence
$dao = new UsuarioDAO();
$usuario = array();

if (isset($_GET['t']) ) {
    $token = $_GET['t'];
    $usuario = $dao->consutarEditorPorToken($token);

    $date = new DateTime();


    if (empty($usuario) || $usuario['validacaoTokenUsuario'] == 1 || $usuario["validadeTokenUsuario"] < $date->format('Y-m-d H:i:s')){
        header("location: ../../index.php");
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1ab94d0eba.js" crossorigin="anonymous"></script>
    <title>TeachyEdu - Esqueceu a senha</title>
    <link rel="stylesheet" href="../../../../public/css/styleLogin.css">
</head>
<body>
<main class="containerEmail">
    <h2>Nova senha </h2>
    <form method="post" action="../../../controller/UsuarioController.php">
        <div class="input-field">
            <input type="hidden" name="id" value="<?php echo $usuario['idUsuario'] ?>">
            <input type="password" name="senha" id="senha" placeholder="Digite sua nova senha" required>
            <div class="underline"></div>
        </div>
        <button class="btnEmail" type="submit" name="requisicao" value="CadastrarSenha">Mudar</button>
    </form>
</main>
</body>
</html>