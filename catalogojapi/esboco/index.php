<?php
    session_start();

    $uservalidation = false;
    $userid = "";
    $username = "";
    $userprofilephoto = "";

    if (isset($_SESSION["uservalidation"]) && $_SESSION["uservalidation"]) {
        $uservalidation = true;    
        $userid = $_SESSION["userid"];
        $username = $_SESSION["username"];
        $userprofilephoto = $_SESSION["userprofilephoto"];
    }

    $account_options = "<a href='pages/auth.php?case=login'> Fazer Login</a>
    <br><br>
    <a href='pages/auth.php?case=register'> Fazer Cadastro </a>";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Catálogo JAPI</title>
    </head>

    <body>
        <h1>
            Tela inicial
        </h1>

        <br><br>

        <p>
            Seja Bem-Vindo 
        </p>    

        <br><br>
        
        <?php 
            if ($uservalidation) {
                echo '<a href="./pages/account.php">' . $userid . '</a><br>';
                echo "<img src='./assets/media/profile_photos/$userprofilephoto' width='50'>";
            }
        ?>

        <br><br>

        <?php if (!$uservalidation) echo $account_options; ?>

        <br><br>

        <form method="POST" action="">
            Pesquisar:<input type="text" name="pesquisar" placeholder="PESQUISAR">
            <input type="submit" value="ENVIAR">
        </form>

        <br><br>

        <a href="./pages/categories.php">
            Catálogo Completo
        </a>

        <br><br>

        <a href="./pages/about_serradojapi.php">
            Mais Sobre a Serra
        </a>

        <br><br>

        <a href="./pages/about_project.php">
            Mais Sobre o Projeto
        </a>
    </body>
</html>
