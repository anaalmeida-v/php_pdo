<?php

$dsn = 'mysql:host=localhost;dbname=pdhp_pdo'; //data source name
$user = 'root';
$senha = '';

try {
    $conexao = new PDO($dsn, $user, $senha);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    //registrar erro
}
?>