<?php
// Configurações de conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "salao_beleza";
$porta = 3307;

// Cria a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco, $porta);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Define o charset para UTF-8
$conn->set_charset("utf8");
?>

