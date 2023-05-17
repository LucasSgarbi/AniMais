<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="../bootstrap.min.css" />
    <script src="../bootstrap.min.js"></script>
</head>

<body class="w-100">

    <nav id="header" class="navbar navbar-expand-lg d-flex justify-content-around bg-success">

        <div class="container-fluid">
            <a id="logo" class="navbar-brand" href="../uhome/home.php">
                <img src="../../assets/img/ragute2.png" alt="Ani+" width="220" height="50">
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <ul id="menu" class="navbar-nav me-auto mb-2 mb-lg-0 d-flex justify-content-around text-center">
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-light" aria-current="page" href="../uhome/home.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-light" aria-current="page" href="../servico/tabServico.php">Serviço</a>
                    </li>
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-light" aria-current="page" href="../animal/tabAnimal.php">Animal</a>
                    </li>
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-light" aria-current="page" href="../atividade/tabAtividade.php">Atividade</a>
                    </li>
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-light" aria-current="page" href="../historico/tabHistorico.php">Historico</a>
                    </li>
                    <li class="nav-item">
                        <a id="UI" class="nav-link active text-danger" aria-current="page" href="../login-out/logout.php">Sair</a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    <div class="container-fluid">