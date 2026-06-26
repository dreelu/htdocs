<?php
    include("connection.php");
    class processaLogin {

        public $login;
        public $senha;

        function processa($p1, $p2) {
            $login = $p1;
            $senha = $p2;
        }
    }

    $infos = new processaLogin();
    $infos->processa($_GET['login'], $_GET['senha']);
    

    // $sql = "INSERT TO usuarios (login = :login, senha_hash = :senha)";
    // $stmt = $pdo->prepare("");

    // $stmt->execute([
    //     ':login' => $login,
    // ]);

    // $res = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Acesso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">

        <header>
            <h1>SISTEMA INTEGRADO DE CADASTRO</h1>
            <p>Portal de Autenticação Institucional</p>
        </header>

        <div class="content">

            <section class="card">
                <div class="card-header">
                    Login do Usuário
                </div>

                <form action="login.php" method="get">
                    <label for="login">E-mail</label>
                    <input type="text" name="login">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha">

                    <button type="submit">Entrar</button>
                </form>
            </section>

        </div>

        <a href="register.html">Não possui conta?</a>

        <footer>
            © 2025 Sistema Institucional - Todos os direitos reservados
        </footer>

    </div>

</body>
</html>