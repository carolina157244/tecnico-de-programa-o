<h1>Editar Cliente</h1>
<?php
	$sql = "SELECT * FROM clientes WHERE id=".$_REQUEST['id'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id" value="<?php echo $row->id; ?>">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome" class="form-control" value="<?php echo $row->nome; ?>" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone" class="form-control" value="<?php echo $row->telefone; ?>" placeholder="(00) 00000-0000">
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email" class="form-control" value="<?php echo $row->email; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">
			Salvar Alterações
		</button>
		<a href="?page=listar-cliente" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>
