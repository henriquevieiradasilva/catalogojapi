<?php
session_start();

require '../db.php';

if (!isset($_SESSION["userid"])) {
    $_SESSION['register_error'] = "Usuário não autenticado.";
    header("Location: ../../../pages/auth.php");
    exit();
}

$userid = $_SESSION["userid"];
$userpassword = $_POST["userpassword"];


$query = mysqli_query($connection, "SELECT Password FROM users WHERE UserID='$userid'");

if (mysqli_num_rows($query) === 0) {
    $_SESSION['register_error'] = "Usuário não encontrado.";
    header("Location: ../../../pages/auth.php");
    exit();
}

$row = mysqli_fetch_assoc($query);

if (password_verify($userpassword, $row["Password"])) {
    header("Location: ./update_account.php");
    exit();
} else {
    $_SESSION['register_error'] = "Senha incorreta.";
    header("Location: ../../../pages/edit_account_confirm.php"); 
    exit();
}

mysqli_close($connection);
?>
