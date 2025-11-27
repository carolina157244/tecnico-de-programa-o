<h1>Cadastrar Serviço</h1>
<form action="?page=salvar-servico" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label>Nome do Serviço
			<input type="text" name="nome" class="form-control" required>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Preço (R$)
			<input type="number" name="preco" class="form-control" step="0.01" min="0" required>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Duração (minutos)
			<input type="number" name="duracao_minutos" class="form-control" min="1">
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">
			Cadastrar Serviço
		</button>
		<a href="?page=listar-servico" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>

