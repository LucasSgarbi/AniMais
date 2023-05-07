<?php
date_default_timezone_set('America/Sao_Paulo');
if(isset($_GET["id"]) && !empty($_GET["id"])){
    include "../conexao/conexao.php";
    $horario = date('H:i:s');
    $query = "update fazer set Realizado = 1, Horario = '$horario' where IdFazer = ".$_GET["id"];
    $resultado = mysqli_query($conexao,$query);
    if($resultado){
        header("location: tabServico.php?sucesso=Concluido");
        exit();
    }
    else{
        header("location: tabServico.php?erro=Ocorreu algum erro no banco");
        exit();
    }
}
else{
    header("location: tabServico.php?erro=Selecione a atividade para concluir");
    exit();
}
?>