<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
</head>

<body>
<div>
    <div class="py-5">
        <div class="container">
            <div class="d-flex flex-column">
                <div>
                    <div class="container-fluid">
                        <h3 class="text-dark mb-4">Agenda</h3>
                        <div class="card text-light bg-dark shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Eventos</p>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0 text-white" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Data do evento</th>
                                            <th>Descrição</th>
                                            <th>Editor</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>nome do evento</td>
                                            <td>21/03/2022 16:00</td>
                                            <td>descricao do evento</td>
                                            <td>id ou nome</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" ><i class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>