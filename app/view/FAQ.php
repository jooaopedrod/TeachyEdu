<?php
require_once __DIR__ . "/../model/dao/AgendaDAO.php";
require_once __DIR__ . "/../model/Agenda.php";
require_once __DIR__ . "/../path.php";

$dao = new AgendaDAO();
$agendas = array();
$agendas = $dao->consultarAgendas();
$dao = new AgendaDAO();

if (isset($_POST["agenda_id"])) {
    $agendaModal = array();
    $agendaModal = $dao->consultarAgenda($_POST['agenda_id']);
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home - TeachyEdu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
          type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">


</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800);

    * {
        font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif;
    }

    .cabecalhoFAQ {
        height: 60vh;
    }

    .containerEdit {
        padding-bottom: 128px;
        padding-top: 128px;
        background: #1e3653;
    }

    .tituloSobre {
        margin-bottom: 0;
        font-weight: 700;
    }

    .textoSobre {
        color: rgba(255, 255, 255, .7);
    }

    .botao {
        background-color: #1e3653;
        color: white;
        border: none;
    }

    .icone {
        color: #1e3653;
    }

    titulo {
        font-weight: 500;
    }

    .footer-basic {
        padding: 40px 0;
        background-color: #1E3653;
        color: white;
    }

    .footer-basic ul {
        padding: 0;
        list-style: none;
        text-align: center;
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 0
    }

    .footer-basic li {
        padding: 0 10px
    }

    .footer-basic ul a {
        color: inherit;
        text-decoration: none;
        opacity: .8
    }

    .footer-basic ul a:hover {
        opacity: 1
    }

    .footer-basic .social {
        text-align: center;
        padding-bottom: 25px
    }

    .footer-basic .social > a {
        font-size: 24px;
        width: 50px;
        height: 50px;
        line-height: 50px;
        display: inline-block;
        text-align: center;
        border-radius: 50%;
        border: 1px solid #ccc;
        margin: 0 8px;
        color: inherit;
        opacity: .75
    }

    .footer-basic .social > a:hover {
        opacityelement.style: .9
    }

    .footer-basic .copyright {
        margin-top: 15px;
        text-align: center;
        font-size: 13px;
        color: #aaa;
        margin-bottom: 0
    }

    @media (max-width: 768px) {
        .imgRemover {
            display: none;
            padding-bottom: 128px;
            padding-top: 128px;
        }

        .containerEdicao {
            padding-bottom: 68px;
            padding-top: 25px;
        }
    }
</style>
<body>
<?php include("includes/nav.php"); ?>

<div class="py-5 text-center text-white align-items-center d-flex cabecalhoFAQ"
     style="background-color: #1E3653;  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat;">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-center text-uppercase" style="text-align: left;"><strong>Fale conosco</strong></h1>
            </div>
        </div>
    </div>
</div>
<div class="py-5 ">
    <div class="container">
        <form class="row d-flex justify-content-center" method="post" action="../controller/AssinanteController.php">
            <div class="col-md-6">
                <h4 class="text-center">Deixe sua mensagem aqui</h4>
                <hr class="my-4 barraFAQ">
                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nomeAssinante" placeholder="Digite seu nome" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="emailAssinante" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="tel" placeholder="(__) _ ____-____" class="form-control" name="telefoneAssinante" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
                    <textarea class="form-control" name="mensagemAssinante" rows="3" placeholder="Digite sua mensagem aqui" required></textarea>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="aceitoAssinante" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            Ao enviar os dados acima, eu concordo em receber e-mails e mensagens através do WhatsApp da TeachyEdu.
                        </label>
                    </div>
                </div>
                <button type="submit" name="requisicao" value="cadastrarAssinante" class=" btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>
<?php include("includes/footer.php"); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script><script src="../../public/javascript/javascript.js"></script>
</body>

</html>
