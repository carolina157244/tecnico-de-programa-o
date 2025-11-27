<?php 
	switch ($_REQUEST['acao']) {
		case 'cadastrar':
			$cliente_id = $_POST['cliente_id'];
			$servico_id = $_POST['servico_id'];
			$data_hora = $_POST['data_hora'];
			$status = $_POST['status'];

			$sql = "INSERT INTO agendamentos (cliente_id, servico_id, data_hora, status)
					VALUES ('{$cliente_id}', '{$servico_id}', '{$data_hora}', '{$status}')";
			
			$res = $conn->query($sql);

			if($res == true){
				print "<script>alert('Cadastrou com sucesso!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			}else{
				print "<script>alert('Não Cadastrou!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			}
			break;
			
		case 'editar':
			$cliente_id = $_POST['cliente_id'];
			$servico_id = $_POST['servico_id'];
			$data_hora = $_POST['data_hora'];
			$status = $_POST['status'];
	
			$sql = "UPDATE agendamentos SET cliente_id='{$cliente_id}', servico_id='{$servico_id}', data_hora='{$data_hora}', status='{$status}' WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			} else {
				print "<script>alert('Não foi possível editar!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM agendamentos WHERE id=".$_REQUEST['id'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			} else {
				print "<script>alert('Não foi possível excluir!');</script>";
				print "<script>location.href='?page=listar-agendamento';</script>";
			}
			break;
	}
?>

