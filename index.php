<?php

$dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
$user = 'root';
$senha = '';

try {
    $conexao = new PDO($dsn, $user, $senha);

    $query = '
        select * from tb_usuarios order by nome desc limit 1
    ';

    $stmt = $conexao->query($query); //stmt - statement //query - retorna um pdo statement
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC); //retorna todos os registros retornados da consulta

    echo '<pre>';
    print_r($usuario);
    echo '</pre>';

    echo $usuario['nome'];

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    //registrar erro - importante, pois com a correção de erros naturalmente a aplicação se torna mais consistente
}
?>