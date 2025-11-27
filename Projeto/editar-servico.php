<h1>Editar Serviço</h1>
<?php
	$sql = "SELECT * FROM servicos WHERE id=".$_REQUEST['id'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=salvar-servico" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id" value="<?php echo $row->id; ?>">
	<div class="mb-3">
		<label>Nome do Serviço
			<input type="text" name="nome" class="form-control" value="<?php echo $row->nome; ?>" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Preço (R$)
			<input type="number" name="preco" class="form-control" step="0.01" min="0" value="<?php echo $row->preco; ?>" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Duração (minutos)
			<input type="number" name="duracao_minutos" class="form-control" min="1" value="<?php echo $row->duracao_minutos; ?>">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">
			Salvar Alterações
		</button>
		<a href="?page=listar-servico" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>

