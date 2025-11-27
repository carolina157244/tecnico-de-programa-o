<h1>Editar Agendamento</h1>
<?php
	$sql = "SELECT * FROM agendamentos WHERE id=".$_REQUEST['id'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
	
	// Formata a data e hora para o input datetime-local
	$data_hora_formatada = date('Y-m-d\TH:i', strtotime($row->data_hora));
?>
<form action="?page=salvar-agendamento" method="POST">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id" value="<?php echo $row->id; ?>">
	
	<div class="mb-3">
		<label>Cliente
			<select name="cliente_id" class="form-control" required>
				<option value="">Selecione o cliente</option>
				<?php
					$sql_clientes = "SELECT * FROM clientes ORDER BY nome";
					$res_clientes = $conn->query($sql_clientes);
					if($res_clientes->num_rows > 0){
						while($cliente = $res_clientes->fetch_object()){
							$selected = ($cliente->id == $row->cliente_id) ? 'selected' : '';
							print "<option value='{$cliente->id}' {$selected}>{$cliente->nome}</option>";
						}
					}
				?>
			</select>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Serviço
			<select name="servico_id" class="form-control" required>
				<option value="">Selecione o serviço</option>
				<?php
					$sql_servicos = "SELECT * FROM servicos ORDER BY nome";
					$res_servicos = $conn->query($sql_servicos);
					if($res_servicos->num_rows > 0){
						while($servico = $res_servicos->fetch_object()){
							$selected = ($servico->id == $row->servico_id) ? 'selected' : '';
							print "<option value='{$servico->id}' {$selected}>{$servico->nome} - R$ " . number_format($servico->preco, 2, ',', '.') . "</option>";
						}
					}
				?>
			</select>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Data e Hora
			<input type="datetime-local" name="data_hora" class="form-control" value="<?php echo $data_hora_formatada; ?>" required>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Status
			<select name="status" class="form-control" required>
				<option value="Agendado" <?php echo ($row->status == 'Agendado') ? 'selected' : ''; ?>>Agendado</option>
				<option value="Confirmado" <?php echo ($row->status == 'Confirmado') ? 'selected' : ''; ?>>Confirmado</option>
				<option value="Cancelado" <?php echo ($row->status == 'Cancelado') ? 'selected' : ''; ?>>Cancelado</option>
				<option value="Concluído" <?php echo ($row->status == 'Concluído') ? 'selected' : ''; ?>>Concluído</option>
			</select>
		</label>
	</div>
	
	<div>
		<button type="submit" class="btn btn-primary">
			Salvar Alterações
		</button>
		<a href="?page=listar-agendamento" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>

