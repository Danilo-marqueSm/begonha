<?php
$banco = 'begonha';
$usuario = 'root';
$senha = '';
$servidor = 'localhost';
date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor;charset=utf8", $usuario, $senha);
} catch (PDOException $e) {
    echo 'Erro nos dados de conexão com o banco <br>' . $e->getMessage();
}
?>