<h1>Listar Agendamentos</h1>

<?php
    // Seleciona todos os agendamentos com informações de cliente e serviço
    $sql = "SELECT a.*, c.nome as cliente_nome, s.nome as servico_nome, s.preco as servico_preco 
            FROM agendamentos a
            INNER JOIN clientes c ON a.cliente_id = c.id
            INNER JOIN servicos s ON a.servico_id = s.id
            ORDER BY a.data_hora DESC";

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
        print "<th>Cliente</th>";
        print "<th>Serviço</th>";
        print "<th>Data e Hora</th>";
        print "<th>Status</th>";
        print "<th>Ações</th>";
        print "</tr>";
        print "</thead>";

        // Corpo da Tabela 
        print "<tbody>";
        
        // Itera sobre os resultados
        while ($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>" . $row->id . "</td>";
            print "<td>" . $row->cliente_nome . "</td>";
            print "<td>" . $row->servico_nome . " (R$ " . number_format($row->servico_preco, 2, ',', '.') . ")</td>";
            
            // Formata a data e hora
            $data_hora_formatada = date('d/m/Y H:i', strtotime($row->data_hora));
            print "<td>" . $data_hora_formatada . "</td>";
            
            // Status com cores diferentes
            $status_class = '';
            switch($row->status) {
                case 'Confirmado':
                    $status_class = 'success';
                    break;
                case 'Cancelado':
                    $status_class = 'danger';
                    break;
                case 'Concluído':
                    $status_class = 'info';
                    break;
                default:
                    $status_class = 'warning';
            }
            print "<td><span class='badge bg-{$status_class}'>{$row->status}</span></td>";
            
            // Adicionando botões de Ação com links
            print "<td>";
            
            // Botão Editar: Redireciona para o formulário de edição
            print "<button class='btn btn-success' onclick=\"location.href='?page=editar-agendamento&id={$row->id}';\">Editar</button>";
            
            // Botão Excluir
            print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-agendamento&acao=excluir&id={$row->id}';}else{false;}\">Excluir</button>";
            print "</td>";
            print "</tr>";
        }
        print "</tbody>";
        
        print "</table>";
        print "<a href='?page=cadastrar-agendamento' class='btn btn-primary'>Cadastrar Novo Agendamento</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    } else {
        // Alerta mensagem de informação
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print "<a href='?page=cadastrar-agendamento' class='btn btn-primary'>Cadastrar Novo Agendamento</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    }
?>

