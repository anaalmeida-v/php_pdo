<?php if (!empty($_POST['usuario']) && !empty($_POST['senha'])) { //só entra na lógica se índices 'usuario' e 'senha' da super-global POST não estiverem vazos
        $dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
        $usuario = 'root';
        $senha = '';
        try {
            $conexao = new PDO($dsn, $usuario, $senha);
            //query
            $query = "select * from tb_usuarios where ";
            $query .= " email = '{$_POST['usuario']}'"; //atribuindo e concatenando com o que já existe na variável query
            $query .= " AND senha = '{$_POST['senha']}'"; //utilizando chaves para que não haja conflitos por conta das aspas
            echo $query;

            //$stmt = $conexao->query($query); //instância do método PDO, executando método query, passando nossa query
            //$usuario = $stmt->fetch(); //recupera usuario através de statement executando o método fetch
            echo '<hr>';
            echo '<pre>';
            //print_r($usuario);
            echo '</pre>';
        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
            //registrar o erro de alguma forma.S
        }
    }
    ?>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <form method="post" action="index.php">
        <input type="text" placeholder="usuário" name="usuario" />
        <br />
        <input type="password" placeholder="senha" name="senha" />
        <br />
        <button type="submit">Entrar</button>
    </form>
</body>

</html>