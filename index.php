<?php if (!empty($_POST['usuario']) && !empty($_POST['senha'])) { //só entra na lógica se índices 'usuario' e 'senha' da super-global POST não estiverem vazos
        $dsn = 'mysql:host=localhost;dbname=php_pdo'; //data source name
        $usuario = 'root';
        $senha = '';
        try {
            $conexao = new PDO($dsn, $usuario, $senha);

            $query = "select * from tb_usuarios where ";
            $query .= " email = :usuario ";
            $query .= " AND senha = :senha";
            $stmt = $conexao->prepare($query); //como o método query retorna um PDOStatement, porém ele não executa a query diretamente, fica aguardando que ordem seja dada
            $stmt->bindValue(':usuario', $_POST['usuario']); //bindValue recebe: ('variável de ligação(bind)' + valor da ligação)
            $stmt->bindValue(':senha', $_POST['senha'], PDO::PARAM_INT);

            $stmt->execute(); //executando método
    
            $usuario = $stmt->fetch(); //recuperar 1º registro retornado com a consulta
    
            echo '<pre>';
            print_r($usuario);
            echo '</pre>';

        } catch (PDOException $e) {
            echo 'Erro: ' . $e->getCode() . ' Mensagem: ' . $e->getMessage();
            //registrar o erro de alguma forma.
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