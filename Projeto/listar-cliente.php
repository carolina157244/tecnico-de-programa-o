<h1>Listar Clientes</h1>

<?php
    // Seleciona todos os clientes
    $sql = "SELECT * FROM clientes ORDER BY nome";

    // Assume-se que $conn é um objeto de conexão
    $res = $conn->query($sql);

    // Conta a quantidade de resultados
    $qtd = $res->num_rows;

    if ($qtd > 0) {
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        
        // Inicia a Tabela
        print "<table class='table table-bordered table-striped table-hover'>";
        
        // Cabeçalho da Tabela (<thead>)
        print "<thead>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>";
        print "<th>Telefone</th>";
        print "<th>E-mail</th>";
        print "<th>Data de Cadastro</th>";
        print "<th>Ações</th>";
        print "</tr>";
        print "</thead>";

        // Corpo da Tabela 
        print "<tbody>";
        
        // Itera sobre os resultados
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->nome . "</td>";
            print "<td>" . ($row->telefone ?? '-') . "</td>";
            print "<td>" . ($row->email ?? '-') . "</td>";
            
            // Formata a data para um formato mais legível
            $dt_formatada = date('d/m/Y H:i', strtotime($row->data_cadastro));
            print "<td>" . $dt_formatada . "</td>";
            
            // Adicionando botões de Ação com links
            print "<td>";
            
            // Botão Editar: Redireciona para o formulário de edição
            print "<button class='btn btn-success' onclick=\"location.href='?page=editar-cliente&id={$row->id}';\">Editar</button>";
            
            // Botão Excluir
            print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-cliente&acao=excluir&id={$row->id}';}else{false;}\">Excluir</button>";
            print "</td>";
            print "</tr>";
        }
        print "</tbody>";
        
        print "</table>";
        print "<a href='?page=cadastrar-cliente' class='btn btn-primary'>Cadastrar Novo Cliente</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    } else {
        // Alerta mensagem de informação
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print "<a href='?page=cadastrar-cliente' class='btn btn-primary'>Cadastrar Novo Cliente</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    }
?>
