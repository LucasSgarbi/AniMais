<?php
	session_start();
	include "../verificador/verificador.php";
	$titulo = "Fazer";
	include "../ucabecalho/uCabecalho.php";
	include "../conexao/conexao.php";
	$query = "select IdAnimal,IdAtividade,Colaborador,Valor,DataAtividade,Horario,Realizado	from fazer order by DataAtividade asc";
	$resultado = mysqli_query($conexao, $query);

	if (isset($_POST) && !empty($_POST)) {

	    // include "../conexao/conexao.php";
	    // $nome = $_POST["nome"];

	    // $query = "insert into categoria (nome) values ('$nome'); ";
	    // $resultado = mysqli_query($conexao, $query);

	    if ($resultado) {
	        header("Location: ./tabProdutos.php");
	        exit();
	?>
	        <div class="alert alert-success">
	            Cadastrado com sucesso
	        </div>
	    <?php
	    } else {
	    ?>
	        <div class="alert alert-danger">
	            Erro!
	        </div>
	<?php
	    }
	}
?>

	<div class="card mt-4 mb-4 col-4 text-center">
		<div class="card-header bg-dark text-white"><h2>Atendimento</h2></div>
		<div class="card-body">
			<div class="row">
				<div>
					<a href="./formCadProdutos.php" class="btn btn-success">Novo Seviço</a>
				</div>
			</div>
		</div>
	</div>

	<?php
	if (isset($_GET["erro"]) && !empty($_GET["erro"])) {
	?>
	    <div class="alert alert-danger">
	        <?php echo $_GET['erro'] ?>
	    </div>
	<?php
	}
	?>

	<?php
	if (isset($_GET["sucesso"]) && !empty($_GET["sucesso"])) {
	?>
	    <div class="alert alert-success">
	        <?php echo $_GET['sucesso'] ?>
	    </div>
	<?php
	}
	?>

	<table class="table table-hover table-striped">
		<thead class="text-center">
			<tr>
				<th>Animal</th>
				<th>Atividade</th>
				<th>Colaborador</th>
				<th>Valor</th>
				<th>Data</th>
				<th>Horario</th>
				<th>Editar</th>
				<th>Concluir</th>
			</tr>
		</thead>
		<tbody class="text-center">
			<?php
			while ($linha = mysqli_fetch_array($resultado)) {
				if($linha["Realizado"]==0){
			?>
			<?php 
				$animal = $linha["IdAnimal"];
				$q2 = "Select IdAnimal,NomeAnimal from animal where IdAnimal ='$animal'";
				$r2 = mysqli_query($conexao, $q2);
				$ativide = $linha["IdAtividade"];
				$q3 = "Select NomeAtividade from atividade where IdAtividade ='$atividade'";
				$r3 = mysqli_query($conexao, $q2);
			?>
				<tr>
					<td><?php echo $r2; ?></td>
					<td><?php echo $r3; ?></td>
					<td><?php echo $linha["Colaborador"]; ?></td>
					<td>R$<?php echo $linha["Valor"]; ?></td>
					<td><?php echo $linha["DataAtividade"]; ?></td>
					<td><?php echo $linha["Horario"]; ?></td>
					<td>
						<?php
							$queryAnimal="select id,NOME from categoria";
							$resultadoCat = mysqli_query($conexao, $queryCat);
							while($linhaCat = mysqli_fetch_array($resultadoCat)){
								if($linha["ID_CATEGORIA"]==$linhaCat["id"]) echo $linhaCat["NOME"];
							}
						?>
					</td>
					<td><a class="btn btn-warning" href="./concluirAtv.php?id=<?php echo $linha["IdFazer"];?>">Editar</a></td>
					<td>
						<?php
						if($linha["Realizado"]==0){
						?>
						<a class="btn btn-success" href="./concluirAtv.php?id=<?php echo $linha["IdFazer"];?>">Realizado</a>
					</td>
						<?php }?>
				</tr>
			<?php
			}}
			?>
		</tbody>
	</table>

<?php
 include "../urodape/uRodape.php"; 
 ?>