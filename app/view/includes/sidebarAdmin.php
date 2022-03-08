<nav class="navbar navbar-light bg-light shadow">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="<?php echo BASE_URL . 'app/view/index.php'; ?>" class="navbar-brand mb-0 h1"> TeachyEdu</a>
    </div>
</nav>
<div class="modal modal-nav true" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content modal-content-nav">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TeachyEdu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a style="text-decoration: none" href="<?php echo BASE_URL . 'app/view/dashboard/usuario/usuarioIndex.php'; ?>"><i class="bx bx-user"></i><span class="ms-2">Usuário</span> </a></li>
                    <li class="list-group-item"><a style="text-decoration: none" href="<?php echo BASE_URL . 'app/view/dashboard/agenda/agendaIndex.php'; ?>"><i class="bx bx-calendar"></i><span class="ms-2">Agenda</span> </a></li>
                    <li class="list-group-item"><a style="text-decoration: none" href="<?php echo BASE_URL . 'app/view/dashboard/cursoMentoria/cursoMentoriaIndex.php'; ?>"><i class="bx bx-pencil"></i><span class="ms-2">Cursos e mentorias</span> </a></li>
                    <li class="list-group-item"><a style="text-decoration: none" href="<?php echo BASE_URL . 'app/view/dashboard/assinante/indexAssinante.php'; ?>"><i class="bx bx-mail-send"></i><span class="ms-2">Assinantes</span> </a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a class="btn btn-secondary" href=<?php echo BASE_URL . '/app/view/logout.php'; ?>><i class='bx bx-log-out'></i> Sair</a>
            </div>
        </div>
    </div>
</div>
