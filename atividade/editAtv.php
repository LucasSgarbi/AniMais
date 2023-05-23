<?php
session_start();
include "../verificador/verificador.php";
$titulo = "Edição de Atividade";
include "../conexao/conexao.php";
include "../ucabecalho/uCabecalho.php";

if (isset($_POST) && !empty($_POST)) {
    $id=$_POST["id"];
    $nome = $_POST["nome"];
    $valor = $_POST["valor"];
   
        $query = "update atividade SET Valor= '$valor' WHERE IdAtividade ='$id'";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            header("Location: tabAtividade.php?sucesso=Editado com sucesso");
            exit();
        }
}
if(isset($_GET["id"]) && !empty($_GET["id"])){
    $query="select IdAtividade, NomeAtividade, Valor FROM atividade where IdAtividade=".$_GET["id"];
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($resultado);

    $id = $dados["IdAtividade"];
    $nome = $dados["NomeAtividade"];
    $valor = $dados["Valor"];
}
?>

<div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 1%;">
    <a href="./tabAtividade.php" class="btn btn-primary">VOLTAR</a>
</div>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" id="bread" style="margin-top: -2%;">
        <li class="breadcrumb-item"><a id="crumb" href="../uhome/home.php">Home</a></li>
        <li class="breadcrumb-item"><a id="crumb" href="../tabAtividade.php">Atividade</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edição de Atividade</li>
    </ol>
</nav>

<div class="row">
    <div class="offset-4 col-md-6">
        <div class="card" style="width: 80%;" id="cartao">
            <div class="card-body">
                <h5 class="card-title text-center">Edição de Atividade</h5>
                <form action="./editAtv.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">ID</h6>
                        </label>
                        <input type="text" name="id" id="login" class="form-control" readonly value="<?php echo $id; ?>">
                    </div>
                    <div class="form-group">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Nome</h6>
                        </label>
                        <input type="text" name="nome" class="form-control"  minlength="1" maxlength="10" value="<?php echo $nome;?>"/>
                    </div>

                    <div class="form-group">
                        <label>
                            <h6 class="card-subtitle mb-2 text-muted">Valor</h6>
                        </label>
                        <input type="number" name="valor" class="form-control"  placeholder="Valor do serviço" min="0"  step=".01" value="<?php echo $valor;?>"/>
                    </div>

                    <div class="form-group text-center" id="inserir">
                        <button type="submit" class="btn btn-success">
                            Salvar
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

</html>