<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!empty($_SESSION["uservalidation"])) {
        header("Location: ../");
        exit();
    }

    $form_data = $_SESSION['form_data'] ?? [
        'username' => '',
        'userid' => '',
        'useremail' => ''
    ];
    unset($_SESSION['form_data']);

    $register_error = $_SESSION['register_error'] ?? null;
    unset($_SESSION['register_error']);

    $uservalidation = $_SESSION["uservalidation"] ?? false;
    $userid = $_SESSION["userid"] ?? null;
    $useremail = $_SESSION["useremail"] ?? null;
    $username = $_SESSION["username"] ?? '';
    $userprofilephoto = $_SESSION["userprofilephoto"] ?? 'default.png';
    $isexpert = $_SESSION["isexpert"] ?? false;
?>
