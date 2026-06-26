<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <div>
            <header>
                <h1>SISTEMA INTEGRADO DE CADASTRO</h1>
                <p>Portal de Autenticação Institucional</p>
            </header>
        </div>

        <div class="content">
            <section class="card">
                <div class="card-header">
                    Cadastro de Usuário
                </div>

                <form action="controller.processaRegistro.class.php" method="post">
                    <label for="email">E-mail</label>
                    <input type="email" id="login">

                    <label for="novaSenha">Senha</label>
                    <input type="password" id="senha">

                    <button type="submit">Cadastrar</button>
                </form>
            </section>
        </div>
        <a href="login.php">Já possui conta?</a>

        <footer>
            © 2025 Sistema Institucional - Todos os direitos reservados
        </footer>

    </div>
</body>
</html>