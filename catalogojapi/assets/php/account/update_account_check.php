<?php
require '../auth/login_check_true.php';
require '../db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../../../pages/account.php");
    exit();
}

$username_new = $_POST['username'] ?? '';
$userid_new = $_POST['userid'] ?? '';
$useremail_new = $_POST['useremail'] ?? '';
$userprofilephoto_new = $_FILES['userprofilephoto'] ?? null;
$userpassword_new = $_POST['userpassword_new'] ?? '';

$mudou_email = ($useremail_new !== $useremail); 
$mudou_senha = !empty($userpassword_new);

$_SESSION['pending_update'] = [
    'username' => $username_new,
    'userid' => $userid_new,
    'useremail' => $useremail_new,
    'userpassword_new' => $userpassword_new,
    'userprofilephoto' => $userprofilephoto_new 
];

if ($mudou_email || $mudou_senha) {
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
        header("Location: ../../../pages/edit_account.php"); 
        exit();
    }
} else {
    require 'update_account.php';
    exit();
}
