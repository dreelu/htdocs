<?php

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

                <form action="controller.processaLogin.class.php" method="post">
                    <label for="login">E-mail</label>
                    <input type="text" name="login">

                    <label for="senha">Senha</label>
                    <input type="password" name="senha">

                    <button type="submit">Entrar</button>
                </form>
            </section>

        </div>

        <a href="register.php">Não possui conta?</a>

        <footer>
            © 2025 Sistema Institucional - Todos os direitos reservados
        </footer>

    </div>

</body>
</html>