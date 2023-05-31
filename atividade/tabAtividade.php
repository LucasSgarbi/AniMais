<?php
session_start();
include "../verificador/verificador.php";
$titulo = "Tabela de Atividades";
include "../ucabecalho/uCabecalho.php";
include "../conexao/conexao.php";
$query = "select IdAtividade, NomeAtividade, Valor FROM atividade";
$resultado = mysqli_query($conexao, $query);

?>


<div class="card mt-4 mb-4 col-md-6 col-sm-12  offset-md-3 text-center">
	<div class="card-header bg-dark text-white"><h2>Tabela Atividades</h2></div>
	<!-- <div class="card-body">
		<div class="row">
			<div>
				<a href="./formCadCategorias.php" class="btn btn-success">Nova Categoria</a>
			</div>
		</div>
	</div> -->
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
			<th>ID Atividade</th>
			<th>Atividade</th>
			<th>Preço</th>
			<th>Editar</th>
		</tr>
	</thead>
	<tbody class="text-center">
		<?php
		while ($linha = mysqli_fetch_array($resultado)) {
		?>
			<tr>
				<td><?php echo $linha["IdAtividade"]; ?></td>
				<td><?php echo $linha["NomeAtividade"]; ?></td>
				<td><?php echo $linha["Valor"]; ?></td>
				<td><a class="btn btn-warning" href="./editAtv.php?id=<?php echo $linha["IdAtividade"];?>">Editar</a></td>
            </tr>
		<?php
		}
		?>
	</tbody>
</table>

<?php
 include "../urodape/uRodape.php"; 
 ?>