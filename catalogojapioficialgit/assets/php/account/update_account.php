<?php
session_start();
require '../db.php';

$userid = $_SESSION["userid"];
$username_new = trim($_POST['username'] ?? '');
$useremail_new = trim($_POST['useremail'] ?? '');
$userpassword_new = $_POST['userpassword_new'] ?? '';
$userprofilephoto_new = $_FILES['userprofilephoto'] ?? null;

$set_clauses = [];

// Atualiza nome (sem comparação)
if (!empty($username_new)) {
    $username_esc = mysqli_real_escape_string($connection, $username_new);
    $set_clauses[] = "Name = '$username_esc'";
}

// Atualiza email (sem comparação)
if (!empty($useremail_new)) {
    $useremail_esc = mysqli_real_escape_string($connection, $useremail_new);
    $set_clauses[] = "Email = '$useremail_esc'";
}

// Atualiza senha se enviada
if (!empty($userpassword_new)) {
    $password_hashed = password_hash($userpassword_new, PASSWORD_DEFAULT);
    $set_clauses[] = "Password = '$password_hashed'";
}

// Processar imagem, se enviada e extensão setada
if ($userprofilephoto_new && $userprofilephoto_new['error'] === UPLOAD_ERR_OK && isset($_SESSION['userphoto_ext'])) {
    $ext = $_SESSION['userphoto_ext'];
    unset($_SESSION['userphoto_ext']);

    $userphoto_name = $userid . '.' . $ext;
    $upload_dir = '../../../assets/media/profile_photos/';
    $dest_path = $upload_dir . $userphoto_name;

    // Apagar antiga se não for a default
    $query = mysqli_query($connection, "SELECT ProfilePhoto FROM Users WHERE UserID = '$userid'");
    $row = mysqli_fetch_assoc($query);
    $old_photo = $row['ProfilePhoto'];
    if ($old_photo !== 'default.png' && file_exists($upload_dir . $old_photo)) {
        unlink($upload_dir . $old_photo);
    }

    if (move_uploaded_file($userprofilephoto_new['tmp_name'], $dest_path)) {
        $set_clauses[] = "ProfilePhoto = '$userphoto_name'";
    } else {
        $_SESSION['register_error'] = "Erro ao salvar a nova imagem de perfil.";
        header("Location: ../../../pages/edit_account.php");
        exit();
    }
}

if (empty($set_clauses)) {
    $_SESSION['register_success'] = "Nenhuma alteração feita.";
    header("Location: ../../../pages/account.php");
    exit();
}

$sql = "UPDATE Users SET " . implode(", ", $set_clauses) . " WHERE UserID = '$userid'";
if (mysqli_query($connection, $sql)) {
    if (!empty($username_new)) $_SESSION['username'] = $username_new;
    if (!empty($useremail_new)) {
        $_SESSION['useremail'] = $useremail_new;
        $_SESSION['auto_login_email'] = $useremail_new;
    }
    if (!empty($userpassword_new)) {
        $_SESSION['auto_login_password'] = $userpassword_new;
    }
    if (!empty($userphoto_name)) $_SESSION['userprofilephoto'] = $userphoto_name;

    $_SESSION['register_success'] = "Dados atualizados com sucesso.";
    header("Location: ../../../pages/account.php");
    exit();
} else {
    $_SESSION['register_error'] = "Erro ao atualizar: " . mysqli_error($connection);
    header("Location: ../../../pages/edit_account.php");
    exit();
}

mysqli_close($connection);
