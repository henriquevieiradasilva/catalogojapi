<?php
require '../auth/login_check_true.php';

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
    'username' => $username,
    'userid' => $userid,
    'useremail' => $useremail,
    'userpassword_new' => $userpassword_new,
    'userprofilephoto' => $userprofilephoto 
];

if ($mudou_email || $mudou_senha) {
    header("Location: ../../../pages/edit_account_confirm.php");
    exit();
} else {
    require 'update_account.php';
    exit();
}
