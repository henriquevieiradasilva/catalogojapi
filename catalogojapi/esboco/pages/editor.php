<?php
   session_start();
   if (!$_SESSION["uservalidation"]) {
      header("Location: ../");
   }
   
   $uservalidation = $_SESSION ["uservalidation"];
   $userid = $_SESSION["userid"];
   $username = $_SESSION["username"];
   $userprofilephoto = $_SESSION["userprofilephoto"];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Catálogo JAPI - Postagem</title>
    </head>

    <body>
        <h1>Postagem</h1>

        <p>Essa será a pagina postagem, no caso a criação de uma nova ou edição de uma já existente</p>
    </body>
</html>