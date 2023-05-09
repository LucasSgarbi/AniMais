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
        $idAni = $_POST["idAnimal"];
        $idAtv = $_POST["idAtividade"];
        $colab = $_POST["colaborador"];
        $val = $_POST["valor"];
        $date = $_POST["Data"];
        

        $query = "update fazer set IdAnimal = '$idAni' , IdAtividade = '$idAtv' , Colaborador = '$colab' , Valor = '$val' , DataAtividade = '$date' where IdFazer  = $id";
        $resultado = mysqli_query($conexao, $query);

        if ($resultado) {
            header("Location: tabServico.php?sucesso=Editado com sucesso");
            exit();
        }else{
            if (empty($descricao)){
                header("Location: editProd.php?erro=Campo nome vazio!");
            } else if (empty($valor)){
                header("Location: editProd.php?erro=Campo do valor vazio!");
            } else if (empty($ingredientes)){
                header("Location: editProd.php?erro=Campo descrição vazio!");
            } else if($categoria == 0) {
                header("Location: editProd.php?erro=Selecione a Categoria!");
            }
        }
    }
    if(isset($_GET["id"]) && !empty($_GET["id"]) )
    {
    $query="select IdFazer,IdAnimal,IdAtividade,Colaborador,Valor,DataAtividade from fazer where IdFazer = ".$_GET["id"];
    $resultado = mysqli_query($conexao,$query);
    $dados = mysqli_fetch_array($resultado);
    
    $idFazer = $dados["IdFazer"];
    $idAnimal = $dados["IdAnimal"];
    $idAtividade = $dados["IdAtividade"];
    $colaborador = $dados["Colaborador"];
    $valor = $dados["Valor"];
    $data = $dados["DataAtividade"];
    
    }
    ?>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="margin-top: 1%;">
        <a href="./tabServico.php" class="btn btn-primary">VOLTAR</a>
    </div>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" id="bread" style="margin-top: -2%;">
            <li class="breadcrumb-item"><a id="crumb" href="../uhome/home.php">Home</a></li>
            <li class="breadcrumb-item"><a id="crumb" href="./tabServico.php">Serviço</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edição de Serviço</li>
        </ol>
    </nav>

    <div class="row">
        <div class="offset-4 col-md-6">
            <div class="card" style="width: 80%;" id="cartao">
                <div class="card-body">
                    <h5 class="card-title text-center">Edição de Serviço</h5>
                    <form action="./editServico.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">IdAnimal</h6>
                            </label>
                            <input  type="number" name="idAnimal" class="form-control" value="<?php echo $idAnimal; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">IdAtividade</h6>
                            </label>
                            <input  type="number" name="idAtividade" class="form-control" value="<?php echo $idAtividade; ?>"/>
                        </div>
                        <div class="form-group">
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Colaborador</h6>
                            </label>
                            <input type="text" name="colaborador" class="form-control" placeholder="Quem ira executar o serviço ?" minlength="2" maxlength="30" value="<?php echo $colaborador; ?>"/>
                        </div>

                        <div class="form-group" >
                            <label>
                                <h6 class="card-subtitle mb-2 text-muted">Valor</h6>
                            </label>
                            <input type="number" name="valor" class="form-control" placeholder="Valor do serviço" min="0"  step=".01" value="<?php echo $valor; ?>"/>
                        </div>

                        <div class="input-group" >
                            <span class="input-group-text">Data para Realização</span>
                            <input type="text" name="Data" class="form-control" placeholder="Data em formato Dia/Mes/Ano" minlength="10" maxlength="10" value="<?php echo $data; ?>"/> 
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $idFazer; ?>" >

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