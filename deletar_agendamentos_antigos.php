<?php
// Conexão com o banco de dados
$servername = "sql305.infinityfree.com";
$username = "if0_36329673";
$password = "sMiif8KKWkMSG";
$dbname = "if0_36329673_agendamentos_service";
// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
} else {
    error_log("Conexão bem-sucedida");
}

// Define o timezone para horário de Brasília
date_default_timezone_set('America/Sao_Paulo');
error_log("Timezone definido para horário de Brasília");

// Exclui registros onde a data é anterior à data atual
$sql = "DELETE FROM agendamentos WHERE data < CURDATE()";
$response = [];

if ($conn->query($sql) === TRUE) {
    $response['success'] = true;
    $response['message'] = "Registros antigos excluídos com sucesso.";
    error_log("Registros antigos excluídos com sucesso");
} else {
    $response['success'] = false;
    $response['message'] = "Erro ao excluir registros: " . $conn->error;
    error_log("Erro ao excluir registros: " . $conn->error);
}

echo json_encode($response);

$conn->close();
?>
