<?php 
require_once "config.php";

$id = $_GET["id"];

$sql = "SELECT * FROM employees WHERE id = ?";

$stmt = $link->prepare($sql);

$stmt->bind_param("i", $param_id);

$param_id = trim($id);

$stmt->execute();

$result = $stmt->get_result();

$row = $result->fetch_array(MYSQLI_ASSOC);

echo "Naam: " . $row["name"] . ", ";

echo "<br>";

echo "Address: " . $row["address"] . ", ";

echo "<br>";

echo "Salaris: " . $row["salary"];

$result->close();

$stmt->free_result();   

$link->close();
?>