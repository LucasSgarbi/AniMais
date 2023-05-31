<?php
session_start();
include "../verificador/verificador.php";
$titulo = "Cadastro de Serviço";
include "../ucabecalho/uCabecalho.php";

include "../conexao/conexao.php";
$querySelect = "select IdAtividade, NomeAtividade from atividade; ";
$resultadoSelect = mysqli_query($conexao, $querySelect);


if (isset($_POST) && !empty($_POST)) {
    $idAnimal = $_POST["idAnimal"];
    $idAtividade = $_POST["idAtividade"];
    $colaborador = $_POST["colaborador"];
    $valor = $_POST["valor"];
    $data = date('d/m/Y');

        $query = "insert into fazer (IdAtividade, IdAnimal, Colaborador, Valor, DataAtividade, Realizado) VALUES ('$idAtividade', '$idAnimal', '$colaborador', '$valor', '$data', 0)";
        $resultado = mysqli_query($conexao, $query); 
        if ($resultado) {
            header("Location: tabServico.php?sucesso=Cadastro com sucesso");
            exit();
        } 

    }

 
?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 1%;">
    <a href="./tabServico.php" class="btn btn-primary">VOLTAR</a>
</div>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" id="bread" style="margin-top: -2%;">
        <li class="breadcrumb-item"><a id="crumb" href="../uhome/home.php">Home</a></li>
        <li class="breadcrumb-item"><a id="crumb" href="./tabServico.php">Servico</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo Seviço</li>
    </ol>
</nav>

<div class="row" id="bottomCard">
    <div class="offset-md-4 col-md-6">
        <div class="card" style="width: 80%;" id="cartao">
            <div class="card-body">
                <h5 class="card-title text-center">Novo Seviço</h5>
                <form action="./formCadServico.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Id da Animal</h6>
                        </label>
                        <input type="number" name="idAnimal" class="form-control" placeholder="Id do animal." required/>
                    </div>

                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Id da Atividade</h6>
                        </label>
                        <input type="number" name="idAtividade" class="form-control" placeholder="Id da Atividade" required/>
                    </div>

                    <div class="input-group" id="inserir">
                        <span class="input-group-text">Colaborador</span>
                        <textarea class="form-control" aria-label="With textarea" name="colaborador" placeholder="Colaborador que realizara a atividade" minlength="0" maxlength="80" required></textarea>
                    </div>
                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Valor</h6>
                        </label>
                        <input type="text" name="valor" class="form-control" placeholder="R$" min="0" max="150" step=".01" required/>
                    </div>

                    <div class="form-group text-center" id="inserir">
                        <button type="submit" class="btn btn-success">
                            Cadastrar
                        </button>
                    </div>

                    <?php
                    if (isset($_GET["erro"]) && !empty($_GET["erro"])) {
                    ?>
                        <div class="alert alert-warning" style="margin-top: 1%;">
                            <strong><?php echo $_GET['erro'] ?></strong>
                        </div>
                    <?php
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>

</div>

</div>

</body>
<script src="../../script/bootstrap.bundle.min.js"></script>
<script src="../../script/sc"></script>

</html>