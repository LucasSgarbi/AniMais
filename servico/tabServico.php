<?php
	session_start();
	include "../verificador/verificador.php";
	$titulo = "Serviço";
	include "../ucabecalho/uCabecalho.php";
	include "../conexao/conexao.php";
	$query = "select IdFazer ,IdAnimal,IdAtividade,Colaborador,Valor,DataAtividade,Horario,Realizado from fazer order by DataAtividade asc";
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

	<div class="card mt-4 mb-4 mx-auto col-4 text-center">
		<div class="card-header bg-dark text-white"><h2>Atendimento</h2></div>
		<div class="card-body">
			<div class="row">
				<div>
					<a href="./formCadServico.php" class="btn btn-success">Novo Seviço</a>
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
			?>
				<tr>
					<td class="col-2">
						<?php
							$qa = "Select IdAnimal,NomeAnimal from animal";
							$ra = mysqli_query($conexao, $qa);
							while($la = mysqli_fetch_array($ra)){
								if($linha['IdAnimal']==$la['IdAnimal']) echo $la['NomeAnimal'];
							}
						?>
					</td>
					<td class="col-2">
						<?php 
						$qat = "Select IdAtividade, NomeAtividade from atividade";
						$rat = mysqli_query($conexao, $qat);
						while($lat = mysqli_fetch_array($rat)){
							if($linha['IdAtividade']==$lat['IdAtividade']) echo $lat['NomeAtividade'];
						}
						?>
					</td>
					<td class="col-2"><?php echo $linha["Colaborador"]; ?></td>
					<td class="col-2">R$<?php echo $linha["Valor"]; ?></td>
					<td class="col-2"><?php echo $linha["DataAtividade"]; ?></td>
					<td class="col-2"><a class="btn btn-warning" href="./editServico.php?id=<?php echo $linha["IdFazer"];?>">Editar</a></td>
					<td class="col-2">
						<a class="btn btn-success" href="./concluirSvc.php?id=<?php echo $linha["IdFazer"];?>">Realizado</a>
					</td>
				</tr>
			<?php
			}}
			?>
		</tbody>
	</table>

<?php
 include "../urodape/uRodape.php"; 
 ?>