<h1>Cadastrar Cliente</h1>
<form action="?page=salvar-cliente" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome" class="form-control" required>
		</label>
	</div>
	
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone" class="form-control" placeholder="(00) 00000-0000">
		</label>
	</div>
	
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email" class="form-control">
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">
			Cadastrar Cliente
		</button>
		<a href="?page=listar-cliente" class="btn btn-secondary">
			Voltar
		</a>
	</div>
</form>
