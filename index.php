<?php

$dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
$user = 'root';
$senha = '';

try {
    $conexao = new PDO($dsn, $user, $senha);

    $query = '
    create table if not exists tb_usuarios(
        id int not null primary key auto_increment,
        nome varchar(50) not null,
        email varchar(100) not null,
        senha varchar(32) not null 
    )';
    $retorno = $conexao->exec($query); //método espera especificamente a query
    //retorno esperado - 0
    echo $retorno;

    $query = '
        delete from tb_usuarios   
    ';
    $retorno = $conexao->exec($query);
    echo $retorno;

} catch (PDOException $e) {
    echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    //registrar erro - importante, pois com a correção de erros naturalmente a aplicação se torna mais consistente
}
?>