<?php
   session_start();
   if (!$_SESSION["uservalidation"]) {
      header("Location: ../");
   }
   
   $uservalidation = $_SESSION ["uservalidation"];
   $userid = $_SESSION["userid"];
   $username = $_SESSION["username"];
   $userprofilephoto = $_SESSION["userprofilephoto"];
   $isexpert = $_SESSION["isexpert"];
   
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title>Catálogo JAPI - Perfil</title>
   </head>

   <body>
      <h1>Aqui sera a pagina para conta, configuracoes e etc</h1>
      
      <br><br>

      <?php if ($isexpert): ?>
         Você é um especialista!      
      <?php endif; ?>
      <?php if (!$isexpert): ?>
         Você não é um especialista, envie seu curriculum lates agora mesmo!
         <form action='../assets/php/expert_register.php' method='post'>
            Currículo Lattes: <input type='text' maxlength='65500' name='userlattes' required><br><br>
            <input type='submit' value='ENVIAR'>
        </form>
      <?php endif; ?>

      <br><br>
      
      <p>Foto de perfil: <img src='../assets/media/profile_photos/<?php echo "$userprofilephoto"; ?>' width='200'></p>

      <br><br>

      <p>Nome de Usuário: <?php echo "$userid"; ?></p>
      
      <br><br>
      
      <p>Nome Completo: <?php echo "$username"; ?></p>
      
      <br><br>

      Falta implementar -> Historico de comentarios, historico de postagens, Alterar informações da conta, apagar conta, finalizar o envio do currilo lattes

      <br><br>

      <a href="../assets/php/logout.php">Sair dessa Conta</a>
      
      <br><br>

      <a href="../">Voltar para Página Inicial</a>
   </body>
 </html>