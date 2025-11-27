<?php 
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$duracao_minutos = $_POST['duracao_minutos'] ?? null;

			$sql = "INSERT INTO servicos (nome, preco, duracao_minutos)
					VALUES ('{$nome}', '{$preco}', " . ($duracao_minutos ? "'{$duracao_minutos}'" : "NULL") . ")";
			
			$res = $conn->query($sql);

			if($res == true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}else{
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}
			break;
			
		case 'editar':
			$nome = $_POST['nome'];
			$preco = $_POST['preco'];
			$duracao_minutos = $_POST['duracao_minutos'] ?? null;
	
			$sql = "UPDATE servicos SET nome='{$nome}', preco='{$preco}', duracao_minutos=" . ($duracao_minutos ? "'{$duracao_minutos}'" : "NULL") . " WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			} else {
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM servicos WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			} else {
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}
			break;
	}
?>

