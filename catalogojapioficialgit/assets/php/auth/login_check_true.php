<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (empty($_SESSION["uservalidation"])) {
        header("Location: ./auth.php");
        exit();
    }

    $register_error = $_SESSION['register_error'] ?? null;
    unset($_SESSION['register_error']);
    
    $register_success = $_SESSION['register_success'] ?? null;
    unset($_SESSION['register_success']);

    $wlattes = $_SESSION['wronglattes'] ?? '';
    unset($_SESSION['wronglattes']);

    $uservalidation = $_SESSION["uservalidation"] ?? false;
    $userid = $_SESSION["userid"] ?? null;
    $useremail = $_SESSION["useremail"] ?? null;
    $username = $_SESSION["username"] ?? '';
    $userprofilephoto = $_SESSION["userprofilephoto"] ?? 'default.png';
    $isexpert = $_SESSION["isexpert"] ?? false;
?>