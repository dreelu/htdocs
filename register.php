<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style-register.css">
    <title>Registro</title>
</head>
<body>
    <main>
        <form action="controller.processaRegistro.class.php" method="post">
            <h1>Registro</h1>
            <p class="msg-instrucao">Preencha seus dados para criar uma conta</p>
            <div class="input-box">
                <input placeholder="E-mail" type="email" required class="login-input">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="input-box">
                <input placeholder="Senha" type="password" required class="password-input">
                <i class="fa-solid fa-lock"></i>
            </div>

            <button class="submit-button" type="submit">
                Registrar
                <i class="fa-solid fa-arrow-right" style="color: rgb(255, 255, 255);"></i>
            </button>
        </form>

        <div class="registro">
            <span>Já tem conta?</span> <a href="login.php">Entre por aqui!</a>
        </div>
    </main>
</body>
</html>