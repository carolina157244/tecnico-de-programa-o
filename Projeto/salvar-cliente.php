<?php 
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome'];
			$email = $_POST['email'] ?? null;
			$telefone = $_POST['telefone'] ?? null;

			$sql = "INSERT INTO clientes (nome, email, telefone)
					VALUES ('{$nome}', " . ($email ? "'{$email}'" : "NULL") . ", " . ($telefone ? "'{$telefone}'" : "NULL") . ")";
			
			$res = $conn->query($sql);

			if($res == true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}else{
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}
			break;
			
		case 'editar':
			$nome = $_POST['nome'];
			$email = $_POST['email'] ?? null;
			$telefone = $_POST['telefone'] ?? null;
	
			$sql = "UPDATE clientes SET nome='{$nome}', email=" . ($email ? "'{$email}'" : "NULL") . ", telefone=" . ($telefone ? "'{$telefone}'" : "NULL") . " WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			} else {
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM clientes WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			} else {
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=listar-cliente';</script>";
			}
			break;
	}
?>
