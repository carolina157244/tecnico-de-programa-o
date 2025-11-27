<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Salão de Beleza</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Salão de Beleza</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cliente
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-cliente">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=listar-cliente">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Serviço
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-servico">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=listar-servico">Lista</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Agendamento
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="?page=cadastrar-agendamento">Cadastrar</a></li>
            <li><a class="dropdown-item" href="?page=listar-agendamento">Lista</a></li>
          </ul>
        </li>

      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

	<div class="container mt-3 flex-grow-1">
		<div class="row">
			<div class="col">
				<?php
				   // conexão com o banco de dados
				  include('config.php');

					switch (@$_REQUEST['page']) {
						// cliente
						case 'cadastrar-cliente':
							include("cadastrar-cliente.php");
							break;
						case 'listar-cliente':
							include("listar-cliente.php");
							break;
						case 'editar-cliente':
							include("editar-cliente.php");
							break;
						case 'salvar-cliente':
							include("salvar-cliente.php");
							break;

						// serviço
						case 'cadastrar-servico':
							include("cadastrar-servico.php");
							break;
						case 'listar-servico':
							include("listar-servico.php");
							break;
						case 'editar-servico':
							include("editar-servico.php");
							break;
						case 'salvar-servico':
							include("salvar-servico.php");
							break;

						// agendamento
						case 'cadastrar-agendamento':
							include("cadastrar-agendamento.php");
							break;
						case 'listar-agendamento':
							include("listar-agendamento.php");
							break;
						case 'editar-agendamento':
							include("editar-agendamento.php");
							break;
						case 'salvar-agendamento':
							include("salvar-agendamento.php");
							break;
																					
					default:
						print "<h1>Seja bem vindo ao sistema do Salão de Beleza</h1>";
						print "<p class='mt-3'>Gerencie seus clientes, serviços e agendamentos de forma fácil e prática.</p>";
		
					}

				?>

			</div>
		</div>
	</div>

	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
