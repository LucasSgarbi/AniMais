<?php
session_start();
include "../verificador/verificador.php";
$titulo = "Inicio";
include "../ucabecalho/uCabecalho.php";
$user = $_SESSION['usuario'];
?>
<div class="row">
    <div class="offset-2 col-md-8">
        <div class="card text-center" style="margin: 8%;">
            <div class="card-header">
                <strong>Seja Bem-Vindo <?php echo ucfirst($user) ?> ao Sistema Ani+!</strong>
            </div>
            <div class="card-body">
                <h5 class="card-title">Painel Administrativo</h5>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-dark" href="../servico/tabServico.php" type="submit">Serviço</a>
                    <a class="btn btn-dark" href="../atividade/tabAtividade.php" type="submit">Atividade</a>
                    <a class="btn btn-dark" href="../animal/tabAnimal.php" type="submit">Animal</a>
                    <a class="btn btn-dark" href="../historico/tabHistorico.php" type="submit">Historico</a>
                    
                </div>
            </div>
            <div class="card-footer text-muted">
                <script>
                    var today = new Date();
                    var year = today.getFullYear()
                    var week = today.getDay()
                    var month = today.getMonth()
                    document.write(year)
                    if (week.value == "0") {
                        document.write(` Domingo`)
                    } else if (week == "1") {
                        document.write(" Segunda-Feira")
                    } else if (week == "2") {
                        document.write(" Terça-Feira")
                    } else if (week == "3") {
                        document.write(" Quarta-Feira")
                    } else if (week == "4") {
                        document.write(" Quinta-Feira")
                    } else if (week == "5") {
                        document.write(" Sexta-Feira")
                    } else {
                        document.write(" Sábado")
                    }
                </script>
            </div>
        </div>
    </div>
</div>