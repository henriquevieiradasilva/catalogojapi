<?php
    session_start();

    if (isset($_SESSION["uservalidation"]) && $_SESSION["uservalidation"]) {
        header("Location: ../");
    }

    $case = $_GET["case"] ?? "login";
    $register_error = $_SESSION['register_error'] ?? null;
    unset($_SESSION['register_error']);

    if ($case == "register") {
        $title = "Cadastrar";
        $form = "
        <form id='registerForm' action='../assets/php/check_register.php' method='post' enctype='multipart/form-data'>
            Nome de Usuário: <input type='text' maxlength='30' name='userid' required><br><br>
            Nome Completo: <input type='text' maxlength='120' name='username' required><br><br>
            Foto de Perfil: <input type='file' name='userprofilephoto' id='profilephoto' accept='.png, .jpg, .jpeg'><br><br>
            E-mail: <input type='email' maxlength='255' name='useremail' required><br><br>
            Senha: <input type='password' maxlength='30' name='userpassword' id='password' required><br><br>
            Confirmar Senha: <input type='password' maxlength='30' id='confirm_password' required><br><br>
            <input type='submit' value='CADASTRAR'>
        </form>";
        $other_option_button = "<a href='./auth.php?case=login'>Já tenho Cadastro</a>";
    } else {
        $title = "Entrar";
        $form = "
        <form action='../assets/php/login.php' method='post'>
            E-mail: <input type='email' maxlength='255' name='useremail' required><br><br>
            Senha: <input type='password' maxlength='30' name='userpassword' required><br><br>
            <input type='submit' value='ENTRAR'>
        </form>";
        $other_option_button = "<a href='./auth.php?case=register'>Não tenho Cadastro</a>";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Catálogo JAPI - <?php echo $title; ?></title>
    </head>

    <body>
        <h1><?php echo $title; ?></h1>

        <br><br>

        <?php if ($register_error): ?>
            <p style="color: red;"><?php echo $register_error; ?></p>
        <?php endif; ?>

        <br><br>

        <?php echo $form; ?>

        <br><br>
        
        <?php if ($case == "login"): ?>
            <a href="">Esqueci a senha</a>            
        <?php endif; ?>

        <br><br>

        <?php echo $other_option_button; ?>

        <br><br>

        <a href="../">Voltar para Página Inicial</a>

        <br><br>

        <?php if ($case == "register"): ?>
            <script src="../assets/js/validate_password.js"></script>
        <?php endif; ?>
    </body>
</html>
