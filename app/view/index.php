<?php
require_once __DIR__ . "/../model/dao/AgendaDAO.php";
require_once __DIR__ . "/../model/Agenda.php";
require_once __DIR__ . "/../path.php";

$dao = new AgendaDAO();
$agendas = array();
$agendas = $dao->consultarAgendas30dias();
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
    <link rel="icon" sizes="500x500" href="../../public/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../../public/css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../../public/owlCarousel/dist/assets/owl.carousel.min.css"/>

</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,500,600,700,800);

    * {
        font-family: "Open Sans", "Helvetica Neue", Arial, sans-serif;
    }

    .cabecalho {
        height: 100vh;
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
        text-align: left;
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
        opacityelement .
        style: .9
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

    .fundo {
        background-color: #EBEBEB;
        clear: both;
    }

    .fonte {
        font-weight: 400;
    }

    .espacoFooter {
        padding-bottom: 7rem !important;;
    }

    .italico {
        font-style: normal;
    }

</style>

<body >

<?php include("includes/nav.php"); ?>

<div class="py-5 text-left text-white align-items-center d-flex cabecalho"
     style="background-image: url(../../public/images/bg.png);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; background-attachment: fixed;">
    <div class="container py-5">
        <div class="row">
            <div class="mx-auto col-lg-8 col-md-10">
                <h1 class="display-3 mb-4 fonte"><strong>TeachyEdu</strong></h1>
                <h2 class="mb-5 fonte">Uma marca pessoal que transforma pessoas em professores e inova práticas
                    educacionais. </h2>
            </div>
        </div>
    </div>
</div>

<div class="containerEdit text-center">
    <div class="container">
        <div class="row">
            <div class="px-lg-5 d-flex flex-column justify-content-center col-lg-12">
                <h2 class="text-white tituloSobre">Sobre a TeachyEdu</h2>
                <hr class="my-4 barra">
                <p class="mb-3 textoSobre">A TeachyEdu surgiu da junção entre as palavras Teacher + Education, raízes da
                    atividade profissional da Professora Patricia de Lara Ramos. A proposta dessa marca está atrelada à
                    ideia de trabalhar com educação no âmbito da formação de professores inovadores (metodologicamente
                    atualizados) e atentos ao mundo digital, que está em constante evolução e coloca os profissionais de
                    qualquer área em evidência, especialmente os professores, bem como a transformação de falantes de
                    língua inglesa em professores, considerando a alta demanda do mundo do trabalho e a escassez de
                    profissionais qualificados para essa função. Sendo assim, a Professora Patricia, por meio da sua
                    marca - TeachyEdu - oferece palestras, oficinas, mentorias e cursos atendendo essas vertentes. </p>
            </div>
        </div>
    </div>
</div>

<br>
<br>
<div class="pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Formados pela TeachyEdu</h1>
            </div>
        </div>
    </div>
</div>

<!-- carossel-->
<div class="container">

    <div class="owl-carousel single-testimonial-area">

        <?php for ($i = 0; $i < 10; $i++) : ?>

            <div class="item single-testimonial">
                <div class="clients-picture">
                    <img src="../../public/images/Matheus.svg" alt=""/>
                </div>
                <div class="clients-review">
                    <p>
                        As formações da TeachyEdu me entregam muita informação relevante em relação a minha área de graduação (pedagogia), por vezes, os conteúdos abordados em sala de aula não são
                        passados com tanta qualidade e
                        didática como são nas formações da Patrícia, o que me qualifica enquanto acadêmico e profissional da área, me destacando em relação aos colegas e outros profissionais da área.
                    </p>
                </div>
                <!-- fim clients-review -->
                <div class="clients-information">
                    <h2>Matheus Nascimento</h2>
                    <h3>Aluno TeachyEdu</h3>
                </div>
            </div>
            <!-- fim single-testimonial -->
            <div class="item single-testimonial">
                <div class="clients-picture">
                    <img src="../../public/images/Mariana.svg" alt=""/>
                </div>
                <div class="clients-review">
                    <p>
                        Minha experiência TeachyEdu foi maravilhosa! Nunca conseguiria imaginar que poderia absorver tanto conhecimento e usar meu inglês não só como forma de renda, mas contribuir
                        para o aprendizado de outras pessoas. Acredito que não ó professores de inglês, mas todos os professores deveriam passar por uma capacitação como o TeachyEdu proporciona, faz
                        acreditar no futuro da educação.
                    </p>
                </div>
                <!-- fim clients-review -->
                <div class="clients-information">
                    <h2>Mariana Fengler</h2>
                    <h3>Aluna TeachyEdu</h3>
                </div>
            </div>
            <!-- fim single-testimonial -->
            <div class="item single-testimonial">
                <div class="clients-picture">
                    <img src="../../public/images/Raidel.svg" alt=""/>
                </div>
                <div class="clients-review">
                    <p>
                        Pensando en mi crecimiento profesional no tengo más que palabras de agradecimiento para las formaciones pedagógicas con la profesora Patricia de Lara Ramos. Siempre, de una
                        forma leve, didáctica y dinámica, nos transmitió todos sus conocimientos a lo largo de intensas jornadas de capacitación pedagógica durante 2021. A ello debo quien soy hoy como
                        profesional y mucho de la persona que me he convertido.
                    </p>
                </div>
                <!-- fim clients-review -->
                <div class="clients-information">
                    <h2>Raidel</h2>
                    <h3>Aluno TeachyEdu</h3>
                </div>
            </div>
            <!-- fim single-testimonial -->
            <div class="item single-testimonial">
                <div class="clients-picture">
                    <img src="../../public/images/Yumi.svg" alt=""/>
                </div>
                <div class="clients-review">
                    <p>
                        Je n'avais pas beaucoup d'experience en classe avant, et avoir une mentor comme Patricia a changé ma vie, pas seulement ma vie professionalle, mais dans tous les aspectes. Elle
                        m'a aidé a comprendre que ma passion est l'éducation et elle m'a donné des outils pour y naveguer.
                    </p>
                </div>
                <!-- fim clients-review -->
                <div class="clients-information">
                    <h2>Yumi</h2>
                    <h3>Aluna TeachyEdu</h3>
                </div>
            </div>
            <!-- fim single-testimonial -->
            <div class="item single-testimonial">
                <div class="clients-picture">
                    <img src="../../public/images/Jana.svg" alt=""/>
                </div>
                <div class="clients-review">
                    <p>
                        I've been an English teacher for many years, and although I've had lots of experience in teaching, it was just after going through Patricia's training program that I could feel
                        able to prepare a complete lesson. Before her guidance, I always felt like something was missing in my lessons. After all her support I feel more able to help my students
                        achieve their goals. Patricia has been helping me become a better teacher.
                    </p>
                </div>
                <!-- fim clients-review -->
                <div class="clients-information">
                    <h2>Janaina Irala</h2>
                    <h3>Aluna TeachyEdu</h3>
                </div>
            </div>
            <!-- fim single-testimonial -->
        <?php endfor; ?>
    </div>
    <!-- fim do owl-carousel -->

</div>
<!--fim do container -->

<br>
<br>
<div class="fundo">
    <div class="container containerEdicao">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 col-xl-4 col-xxl-5">
                <h2 style="padding-top: 45px;">Cursos e mentorias<br></h2>
                <p><br>O propósito principal dos cursos da TeachyEdu é transformar a prática docente em experiências cada vez mais dinâmicas, modernas e eficazes.<br></p>
                <a href="indexCurso.php" class="btn btn-primary botao">Conheça</a>
            </div>
            <div class="col-md-6 col-xl-4 col-xxl-3 imgRemover"><img src="../../public/images/cursoIndexImg.svg" style="width: 200px;"></div>
        </div>
    </div>
</div>
<div class="containerEdit"
     style="background-image: url(../../public/images/bgindex.svg);  background-position: center center, center center;  background-size: cover, cover;  background-repeat: repeat, repeat; background-attachment: fixed;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="text-light ">Por que escolher a TeachyEdu?<br></h1>
                <p class="my-4"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto service-box mt-5">
                    <h1 class="display-4 text-center mb-4 text-light"><i class="bi bi-headset"></i></h1>
                    <h3 class="text-light mb-3">Atendimento personalizado</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto service-box mt-5">
                    <h1 class="display-4 text-center mb-4 text-light"><i class="bi bi-lightbulb"></i></h1>
                    <h3 class="text-light mb-3">Foco na formação de professores inovadores</h3>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 text-center">
                <div class="mx-auto service-box mt-5">
                    <h1 class="display-4 text-center mb-4 text-light"><i class="bi bi-graph-up-arrow"></i></h1>
                    <h3 class="text-light mb-3">Resultados imediatos em sua prática pedagógica</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="py-5 fundo">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Veja a agenda e participe dos eventos</h1>
            </div>
        </div>
    </div>
</div>
<div class="pt-3 espacoFooter fundo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="post-slider">
                    <i class="fas fa-chevron-left prev"></i>
                    <i class="fas fa-chevron-right next"></i>
                    <div class="post-wrapper">
                        <?php foreach ($agendas as $post) : ?>
                            <div data-toggle="modal" data-target="#meumodal" class="post post_data" id="<?php echo $post['idAgenda']; ?>">
                                <img src="<?php echo '../../public/images/agenda/' . $post['imagemAgenda']; ?>" alt="" class="slider-image">
                                <div class="post-info">
                                    <h4><?php echo $post['tituloAgenda'] ?></h4>
                                    <i class="italico"> <?php echo date('d F, Y', strtotime($post['dataHoraAgenda'])); ?></i><br>
                                    <span> <?php echo substr($post['descricaoAgenda'], 0, 50) ?>... </span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="meumodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div id="modalContent" class="modal-content">

        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="../../public/javascript/javascript.js"></script>

<!--Carousel-->
<script src="../../public/owlCarousel/dist/owl.carousel.min.js"></script>
<script src="../../public/javascript/owlCarousel.js"></script>

<script>
    $(document).ready(function () {

        $(document).on('click', '.post_data', function () {
            var agenda_id = $(this).attr('id');
            if (agenda_id !== '') {
                $.post('eventoDetalhado.php', {
                    'agenda_id': agenda_id
                }, function (retorna) {
                    $("#modalContent").html(retorna);
                })
            }

        });
    });
</script>
</body>

</html>
