<?php
if (!empty($_POST['usuario']) && !empty($_POST['senha'])) { //imprimindo superglobal post
    $dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
    $user = 'root';
    $senha = '';

    try {
        $conexao = new PDO($dsn, $usuario, $senha);

        //query
        $query = "select * from tb_usuarios where";
        $query .= "email = '{$_POST['usuario']}'";
        $query .= "AND senha = '{$_POST['senha']}'";
        echo $query;

        $stmt = $conexao->query($query);
        $usuario = $stmt->fetch();
        print_r($usuario);

    } catch (PDOException $e) {
        echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <form method="post" action="index.php"><!--método + local onde ação será feita-->
        <input type="text" placeholder="usuário" name="usuario">
        <br>
        <input type="password" placeholder="senha" name="senha">
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>