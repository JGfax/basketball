<?php
$host = 'localhost';
$db   = 'basketball';
$user = 'root';
$pass = 'Home@spSENAI2025!';
$charset = 'utf8mb4';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  ]);
  
  $conn = new mysqli($host, $user, $pass, $db);
  if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
  }
} catch (PDOException $e) {
  die("Erro de conexão: " . $e->getMessage());
}
?>

.