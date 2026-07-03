<?php
    if (!isset($_SESSION['id'])) {
        header("Location: main.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style-login.css">
    <title>Login</title>
</head>
<body>
    <main>
        <form action="controller.processaLogin.class.php" method="post">
            <h1>Login</h1>
            <p class="msg-instrucao">Preencha seus dados para continuar</p>
            <div class="input-box">
                <label for="login"></label>
                <input placeholder="E-mail" type="email" class="login-input" name="login" required >
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-box">
                <label for="senha"></label>
                <input placeholder="Senha" type="password" class="password-input" name="senha" required >
                <i class="fa-solid fa-lock"></i>
            </div>

            <button class="submit-button" type="submit" value="Login">
                Login
                <i class="fa-solid fa-arrow-right" style="color: rgb(255, 255, 255);"></i>
            </button>
        </form>

        <div class="registro">
            <span>Ainda não tem conta?</span> <a href="register.php">Registre-se Aqui!</a>
        </div>
    </main>
</body>
</html>