
<?php 


require_once "../../classes/conexao.php";
	$c = new conectar();
		$conexao=$c->conexao();

	$sql = "SELECT id_cliente, nome, sobrenome, endereco, email, telefone, cpf FROM clientes";
	$result = mysqli_query($conexao, $sql);

?>


<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Clientes</label></caption>
	<tr>
			<td>Nome</td>
	 		<td>ID cliente</td>
	 		<td>Endereço</td>
	 		<td>Email</td>
	 		<td>Telefone</td>
	 		<td>Pontos do cliente</td>
	 		<td>Editar</td>
		<td>Excluir</td>
	</tr>

	<?php while($mostrar = mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $mostrar[1]; ?></td>
		<td><?php echo $mostrar[2]; ?></td>
		<td><?php echo $mostrar[3]; ?></td>
		<td><?php echo $mostrar[4]; ?></td>
		<td><?php echo $mostrar[5]; ?></td>
		<td><?php echo $mostrar[6]; ?></td>
		<td>
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#abremodalClientesUpdate" onclick="adicionarDado('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="eliminarCliente('<?php echo $mostrar[0]; ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>


<?php endWhile; ?>
</table>