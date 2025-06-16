<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require '../db.php';

$pending_update = $_SESSION['pending_update'] ?? [];

// Dados atuais e novos
$userid               = $_SESSION['userid'];
$userid_new           = $pending_update['userid'] ?? '';
$username_new         = $pending_update['username'] ?? '';
$useremail_new        = $pending_update['useremail'] ?? '';
$userpassword_new     = $pending_update['userpassword_new'] ?? '';
$userprofilephoto_new = $pending_update['userprofilephoto'] ?? null;

$set_clauses = [];

// Diretório correto das fotos de perfil
$profile_dir = realpath(__DIR__ . '/../../media/profile_photos') . '/';
$current_photo = $_SESSION['userprofilephoto'] ?? null;

// 1) Verificar se novo UserID é diferente e único
if (!empty($userid_new) && $userid_new !== $userid) {
    $userid_new_esc = mysqli_real_escape_string($connection, $userid_new);

    // Verifica se novo ID já existe
    $res_check = mysqli_query($connection, "SELECT UserID FROM users WHERE UserID = '\$userid_new_esc'");
    if (!$res_check) {
        $_SESSION['register_error'] = "Erro ao verificar ID: " . mysqli_error($connection);
        header("Location: ../../../pages/edit_account.php");
        exit();
    }
    if (mysqli_num_rows($res_check) > 0) {
        $_SESSION['register_error'] = "ID de usuário já em uso. Escolha outro.";
        header("Location: ../../../pages/edit_account.php");
        exit();
    }
    $set_clauses[] = "`UserID` = '$userid_new_esc'";
}

// 2) Atualiza nome completo
if (!empty($username_new)) {
    $name_esc = mysqli_real_escape_string($connection, $username_new);
    $set_clauses[] = "`Name` = '$name_esc'";
}

// 3) Atualiza e-mail
if (!empty($useremail_new)) {
    $email_esc = mysqli_real_escape_string($connection, $useremail_new);
    $set_clauses[] = "`Email` = '$email_esc'";
}

// 4) Atualiza senha
if (!empty($userpassword_new)) {
    $hash = password_hash($userpassword_new, PASSWORD_DEFAULT);
    $set_clauses[] = "`Password` = '$hash'";
    $_SESSION['auto_login_password'] = $userpassword_new;
}

// 5) Trata foto de perfil
// 5a) Upload de nova imagem
if (!empty($userprofilephoto_new) && $userprofilephoto_new['error'] === UPLOAD_ERR_OK) {
    $old_ext = pathinfo($current_photo, PATHINFO_EXTENSION);
    $new_ext = pathinfo($userprofilephoto_new['name'], PATHINFO_EXTENSION);
    $target_id = !empty($userid_new) ? $userid_new : $userid;
    $new_photo_name = $target_id . '.' . ($new_ext ?: $old_ext);
    $new_photo_path = $profile_dir . $new_photo_name;

    // Apagar antiga
    if ($current_photo && file_exists($profile_dir . $current_photo)) {
        unlink($profile_dir . $current_photo);
    }
    // Mover nova
    if (move_uploaded_file($userprofilephoto_new['tmp_name'], $new_photo_path)) {
        $photo_esc = mysqli_real_escape_string($connection, $new_photo_name);
        $set_clauses[] = "`ProfilePhoto` = '$photo_esc'";
        $_SESSION['userprofilephoto'] = $new_photo_name;
        $current_photo = $new_photo_name;
    }
}

// 5b) Se apenas mudou UserID (sem novo upload), renomeia arquivo existente
if (!empty($userid_new) && $userid_new !== $userid && $current_photo) {
    $old_ext = pathinfo($current_photo, PATHINFO_EXTENSION);
    $new_photo_name = $userid_new . '.' . $old_ext;
    $old_path = $profile_dir . $current_photo;
    $new_photo_path = $profile_dir . $new_photo_name;
    if (file_exists($old_path)) {
        rename($old_path, $new_photo_path);
        $photo_esc = mysqli_real_escape_string($connection, $new_photo_name);
        $set_clauses[] = "`ProfilePhoto` = '$photo_esc'";
        $_SESSION['userprofilephoto'] = $new_photo_name;
    }
}

// 6) Executa UPDATE se houver alterações
if (!empty($set_clauses)) {
    $sql = "UPDATE users SET " . implode(', ', $set_clauses) . " WHERE UserID = '$userid'";
    if (mysqli_query($connection, $sql)) {
        // Atualiza sessão
        if (!empty($userid_new_esc)) {
            $_SESSION['userid'] = $userid_new_esc;
        }
        if (!empty($name_esc)) {
            $_SESSION['username'] = $name_esc;
        }
        if (!empty($email_esc)) {
            $_SESSION['useremail'] = $email_esc;
        }
        $_SESSION['register_success'] = "Dados atualizados com sucesso.";
        header("Location: ../../../pages/account.php");
        exit();
    } else {
        $_SESSION['register_error'] = "Erro ao atualizar: " . mysqli_error($connection);
        header("Location: ../../../pages/edit_account.php");
        exit();
    }
} else {
    $_SESSION['register_error'] = "Nenhuma alteração detectada.";
    header("Location: ../../../pages/edit_account.php");
    exit();
}

mysqli_close($connection);
