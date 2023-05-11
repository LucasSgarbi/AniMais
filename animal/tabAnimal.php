<?php
	session_start();
	include "../verificador/verificador.php";
	$titulo = "Animal";
	include "../ucabecalho/uCabecalho.php";
	include "../conexao/conexao.php";
	$query = "select IdAnimal,NomeAnimal,NomeDono,Telefone,Raca,Cor,Tamanho,Observacao from animal";
	$resultado = mysqli_query($conexao, $query);

?>

	<div class="card mt-4 mb-4 col-4 mx-auto text-center">
		<div class="card-header bg-dark text-white"><h2>Animal</h2></div>
		<div class="card-body">
			<div class="row">
				<div>
					<a href="./formCadAnimal.php" class="btn btn-success">Novo Animal</a>
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
				<th>IdAnimal</th>
				<th>Nome do Animal</th>
				<th>Nome do Dono</th>
				<th>Telefone</th>
				<th>Raça</th>
				<th>Cor</th>
				<th>Tamanho</th>
				<th>Observacão</th>
				<th>Editar</th>
			</tr>
		</thead>
		<tbody class="text-center">
			<?php
			while ($linha = mysqli_fetch_array($resultado)) {
			
			?>
			<?php 
			?>
				<tr>
					<td><?php echo $linha["IdAnimal"]; ?></td>
					<td><?php echo $linha["NomeAnimal"]; ?></td>
					<td><?php echo $linha["NomeDono"]; ?></td>
					<td><?php echo $linha["Telefone"]; ?></td>
					<td><?php echo $linha["Raca"]; ?></td>
					<td><?php echo $linha["Cor"]; ?></td>
					<td><?php echo $linha["Tamanho"]; ?></td>
					<td><?php echo $linha["Observacao"]; ?></td>
					<td><a class="btn btn-warning" href="./editAnimal.php?id=<?php echo $linha["IdAnimal"];?>">Editar</a></td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>

<?php
 include "../urodape/uRodape.php"; 
 ?>