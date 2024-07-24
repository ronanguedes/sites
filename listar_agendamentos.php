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

$sql = "SELECT nome, telefone, data, hora FROM agendamentos";
$result = $conn->query($sql);

$agendamentos = array();
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $agendamentos[] = $row;
  }
}

$conn->close();

echo json_encode($agendamentos);
?>
