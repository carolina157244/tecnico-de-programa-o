<h1>Cadastrar Agendamento</h1>
<form action="?page=salvar-agendamento" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label>Cliente
			<select name="cliente_id" class="form-control" required>
				<option value="">Selecione o cliente</option>
				<?php
					$sql = "SELECT * FROM clientes ORDER BY nome";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_object()){
							print "<option value='{$row->id}'>{$row->nome}</option>";
						}
					}
					else{
						print "<option value=''>Nenhum cliente encontrado</option>";
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
					$sql = "SELECT * FROM servicos ORDER BY nome";
					$res = $conn->query($sql);
					if($res->num_rows > 0){
						while($row = $res->fetch_object()){
							print "<option value='{$row->id}'>{$row->nome} - R$ " . number_format($row->preco, 2, ',', '.') . "</option>";
						}
					}
					else{
						print "<option value=''>Nenhum serviço encontrado</option>";
					}
				?>
			</select>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Data e Hora
			<input type="datetime-local" name="data_hora" class="form-control" required>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Status
			<select name="status" class="form-control" required>
				<option value="Agendado" selected>Agendado</option>
				<option value="Confirmado">Confirmado</option>
				<option value="Cancelado">Cancelado</option>
				<option value="Concluído">Concluído</option>
			</select>
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">
			Cadastrar Agendamento
		</button>
		<a href="?page=listar-agendamento" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>

