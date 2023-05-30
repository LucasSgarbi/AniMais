<?php
session_start();
include "../verificador/verificador.php";
$titulo = "Cadastro de Animal";
include "../ucabecalho/uCabecalho.php";

include "../conexao/conexao.php";
$querySelect = "select IdAtividade, NomeAtividade from atividade; ";
$resultadoSelect = mysqli_query($conexao, $querySelect);


if (isset($_POST) && !empty($_POST)) {
    $NomeAnimal = $_POST["NomeAnimal"];
    $NomeDono = $_POST["NomeDono"];
    $Telefone = $_POST["Telefone"];
    $Raca = $_POST["Raca"];
    $Tamanho = $_POST["Tamanho"];
    $Cor = $_POST["Cor"];
    $Obs = $_POST["Observacao"];

        $query = "insert into animal( NomeAnimal, NomeDono, Telefone, Raca, Tamanho, Cor, Observacao) values ('$NomeAnimal','$NomeDono','$Telefone','$Raca','$Tamanho','$Cor','$Obs' )";
        $resultado = mysqli_query($conexao, $query);    
    }

?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 1%;">
    <a href="./tabAnimal.php" class="btn btn-primary">VOLTAR</a>
</div>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" id="bread" style="margin-top: -2%;">
        <li class="breadcrumb-item"><a id="crumb" href="../uhome/home.php">Home</a></li>
        <li class="breadcrumb-item"><a id="crumb" href="./tabAnimal.php">Animal</a></li>
        <li class="breadcrumb-item active" aria-current="page">Novo Animal</li>
    </ol>
</nav>

<div class="row" id="bottomCard">
    <div class="offset-md-4 col-md-6">
        <div class="card" style="width: 80%;" id="cartao">
            <div class="card-body">
                <h5 class="card-title text-center">Novo Animal</h5>
                <form action="./formCadAnimal.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Nome do Animal</h6>
                        </label>
                        <input type="text" name="NomeAnimal" class="form-control" placeholder="Qual o nome do seu amiguinho?"  maxlength="80" required/>
                    </div>

                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Nome do Dono</h6>
                        </label>
                        <input type="text" name="NomeDono" class="form-control" placeholder="Qual o nome do Dono ?"  required/>
                    </div>

                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Telefone do Dono</h6>
                        </label>
                        <input type="tel" name="Telefone" class="form-control" placeholder="Qual o telefone do Dono ?"  required/>
                    </div>

                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Raça</h6>
                        </label>
                        <input type="text" name="Raca" class="form-control" placeholder="Qual a Raça do animal ?"  required/>
                    </div>

                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Tamanho</h6>
                        </label>
                        <input type="text" name="Tamanho" class="form-control" placeholder="Qual o tamanho do animal ?"  required/>
                    </div>
                    
                    <div class="form-group" id="inserir">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Cor</h6>
                        </label>
                        <input type="text" name="Cor" class="form-control" placeholder="Qual a cor do animal ?"  required/>
                    </div>

                    <div class="input-group" id="inserir">
                        <span class="input-group-text">Observação</span>
                        <textarea class="form-control" aria-label="With textarea" name="Observacao" placeholder="O animal tem alguma observação ?" minlength="0" maxlength="80" required></textarea>
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