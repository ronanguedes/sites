<?php
$servername = "sql305.infinityfree.com";
$username = "if0_36329673";
$password = "sMiif8KKWkMSG";
$dbname = "if0_36329673_agendamentos_service";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepara e vincula
$stmt = $conn->prepare("INSERT INTO agendamentos (nome, telefone, data, hora) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $telefone, $data, $hora);

// Define parâmetros e executa
$nome = $_POST['clienteNome'];
$telefone = $_POST['clienteTelefone'];
$data = $_POST['dataAgendamento'];
$hora = $_POST['horaAgendamento'];
$stmt->execute();

$stmt->close();
$conn->close();

header("Location: index.html");
exit();
?>
