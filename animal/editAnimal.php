<?php
    session_start();
    include "../verificador/verificador.php";
    $titulo = "Edição de Animal";
    include "../conexao/conexao.php";
    include "../ucabecalho/uCabecalho.php";

    // $querySelect = "select ID, NOME from CATEGORIA; ";
    // $resultadoSelect = mysqli_query($conexao, $querySelect);


    if (isset($_POST) && !empty($_POST)) {
        $id = $_POST['id'];
        $nomeA = $_POST['nomeAnimal'];
        $nomeD = $_POST['nomeDono'];
        $tel = $_POST['telefone'];
        $rc = $_POST['raca'];
        $tm = $_POST['tamanho'];
        $color = $_POST['cor'];
        $obs = $_POST['observacao'];
        

        $query = "update animal set NomeAnimal = '$nomeA ',NomeDono = '$nomeD ',Telefone ='$tel ',Raca = '$rc ',Tamanho ='$tm ', Cor ='$color ',Observacao ='$obs ' where IdAnimal = '$id'";
        $resultado = mysqli_query($conexao, $query);
        header('Location:./tabAnimal.php');

        
    }
    if(isset($_GET["id"]) && !empty($_GET["id"]) )
    {
    $query="select IdAnimal,NomeAnimal,NomeDono,Telefone,Raca,Tamanho,Cor,Observacao from animal WHERE IdAnimal=".$_GET["id"];
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($resultado);

    $idAnimal = $dados["IdAnimal"];
    $nomeAnimal = $dados["NomeAnimal"];
    $nomeDono = $dados["NomeDono"];
    $telefone = $dados["Telefone"];
    $raca = $dados["Raca"];
    $tamanho = $dados["Tamanho"];
    $cor = $dados["Cor"];
    $observacao = $dados["Observacao"];

    
    }
    ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 1%;">
        <a href="./tabServico.php" class="btn btn-primary">VOLTAR</a>
    </div>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" id="bread" style="margin-top: -2%;">
            <li class="breadcrumb-item"><a id="crumb" href="../uhome/home.php">Home</a></li>
            <li class="breadcrumb-item"><a id="crumb" href="./tabAnimal.php">Animal</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edição de Animal</li>
        </ol>
    </nav>

    <div class="row">
        <div class="offset-4 col-md-6">
            <div class="card" style="width: 80%;" id="cartao">
                <div class="card-body">
                    <h5 class="card-title text-center">Edição de Animal</h5>
                    <form action="./editAnimal.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Nome do Animal</h6>
                            </label>
                            <input required type="text" name="nomeAnimal" placeholder="Qual o nome do animal?" class="form-control" value="<?php echo $nomeAnimal; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Nome do Dono</h6>
                            </label>
                            <input required  type="text" name="nomeDono" placeholder="Quem é o dono?" class="form-control" value="<?php echo $nomeDono; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Telefone</h6>
                            </label>
                            <input required type="tel" name="telefone" class="form-control" placeholder="Qual o telefone do dono ?" value="<?php echo $telefone; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Raça</h6>
                            </label>
                            <input required type="tel" name="raca" class="form-control" placeholder="Qual a raça do animal ?" value="<?php echo $raca; ?>"/>
                        </div>
                        
                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Tamanho</h6>
                            </label>
                            <input required type="tel" name="tamanho" class="form-control" placeholder="Qual a raça do animal ?" value="<?php echo $tamanho; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Cor</h6>
                            </label>
                            <input required type="tel" name="cor" class="form-control" placeholder="Qual a raça do animal ?" value="<?php echo $cor; ?>"/>
                        </div>

                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Observação</h6>
                            </label>
                            <input required type="tel" name="observacao" class="form-control" placeholder="Existe alguma observação ?" value="<?php echo $observacao; ?>"/>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $idAnimal; ?>" >

                        <div class="form-group text-center" id="inserir">
                            <button type="submit" class="btn btn-success">
                                Salvar Alterações
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
<script src="../../script/"></script>

</html>