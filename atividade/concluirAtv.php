<?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
    include "../conexao/conexao.php";
    $horario = date('H:i:s');
    $query = "update fazer set Realizado = 1, Horario = '$horario' where IdFazer = ".$_GET["id"];
    $resultado = mysqli_query($conexao,$query);
    if($resultado){
        header("location: tabAtividade.php?sucesso=Concluido");
        exit();
    }
    else{
        header("location: tabAtividade.php?erro=Ocorreu algum erro no banco");
        exit();
    }
}
else{
    header("location: tabAtividade.php?erro=Selecione a atividade para concluir");
    exit();
}
?>