<h1>Listar Serviços</h1>

<?php
    // Seleciona todos os serviços
    $sql = "SELECT * FROM servicos ORDER BY nome";

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
        print "<th>Preço</th>";
        print "<th>Duração (minutos)</th>";
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
            print "<td>R$ " . number_format($row->preco, 2, ',', '.') . "</td>";
            print "<td>" . ($row->duracao_minutos ?? '-') . "</td>";
            
            // Adicionando botões de Ação com links
            print "<td>";
            
            // Botão Editar: Redireciona para o formulário de edição
            print "<button class='btn btn-success' onclick=\"location.href='?page=editar-servico&id={$row->id}';\">Editar</button>";
            
            // Botão Excluir
            print "<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-servico&acao=excluir&id={$row->id}';}else{false;}\">Excluir</button>";
            print "</td>";
            print "</tr>";
        }
        print "</tbody>";
        
        print "</table>";
        print "<a href='?page=cadastrar-servico' class='btn btn-primary'>Cadastrar Novo Serviço</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    } else {
        // Alerta mensagem de informação
        print "<div class='alert alert-info' role='alert'>Não encontrou resultado.</div>";
        print "<a href='?page=cadastrar-servico' class='btn btn-primary'>Cadastrar Novo Serviço</a>";
        print " <a href='?page=index.php' class='btn btn-secondary'>Voltar</a>";
    }
?>

