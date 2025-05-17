<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Login</title>
    <style>
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
        <form action="verifica_login.php" method="post">
            E-mail: <input type="email" maxlength="10" name="email" required><br><br>
            Senha: <input type="password" maxlength="10" name="senha" required><br><br>
            <input type="submit" value="ENTRAR">    
        </form>
</body>
</html>

<!--

#################
#  JUNTAR COM   #
#################

-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Cadastro</title>
    <style>
        * {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Cadastro</h1>
        <form action="verifica_login.php" method="post">
            Nome Completo: <input type="email" maxlength="10" name="email" required><br><br>
            Nome de Usuário: <input type="email" maxlength="10" name="email" required><br><br>
            E-mail: <input type="email" maxlength="10" name="email" required><br><br>
            Senha: <input type="password" maxlength="10" name="senha" required><br><br>
            Confirmar Senha: <input type="password" maxlength="10" name="senha" required><br><br>
            <input type="submit" value="ENTRAR">    
        </form>
</body>
</html>