<?php

$dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
$user = 'root';
$senha = '';

try {
    $conexao = new PDO($dsn, $user, $senha);

    $query = '
        select * from tb_usuarios
    ';

    //$stmt = $conexao->query($query); //stmt - statement //query - retorna um pdo statement
    foreach($conexao->query($query) as $chave => $valor){
        echo '<pre>';
        print_r($valor['nome']);
        echo '<hr>';
        echo '</pre>';
    }
    //$lista_usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //retorna todos os registros retornados da consulta

    /*echo '<pre>';
    print_r($lista_usuarios);
    echo '</pre>';*/

    /*foreach ($lista_usuarios as $key => $value) {
        echo $value['nome'];
        echo '<hr>';
    }*/

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    //registrar erro - importante, pois com a correção de erros naturalmente a aplicação se torna mais consistente
}
?>