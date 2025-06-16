<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require '../db.php';

$userid = $_SESSION['userid'] ?? null;
$photo  = $_SESSION['userprofilephoto'] ?? null;
$password = trim($_POST['password'] ?? '');

if (!$userid || !$password) {
    $_SESSION['register_error'] = "Usuário ou senha não identificados.";
    header("Location: ../../../");
    exit();
}

// Verifica senha no banco
$sql = "SELECT Password FROM users WHERE UserID = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "s", $userid);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $hashedPassword);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if (!password_verify($password, $hashedPassword)) {
    $_SESSION['register_error'] = "Senha incorreta. Conta não foi excluída.";
    header("Location: ../../../pages/edit_account.php");
    exit();
}

// Deletar foto de perfil apenas se não for a imagem padrão
$photo = basename($photo);
$defaultImage = 'default.png'; 

if ($photo && $photo !== $defaultImage) {
    $profile_dir = realpath(__DIR__ . '/../../media/profile_photos/') . '/';
    $photo_path  = $profile_dir . $photo;
    if (file_exists($photo_path)) {
        unlink($photo_path);
    }
}


// Deletar usuário do banco
$userid_esc = mysqli_real_escape_string($connection, $userid);
$sql_delete = "DELETE FROM users WHERE UserID = '$userid_esc'";

if (mysqli_query($connection, $sql_delete)) {
    session_unset();
    session_destroy();
    header("Location: ../auth/logout.php");
    exit();
} else {
    $_SESSION['register_error'] = "Erro ao excluir conta: " . mysqli_error($connection);
    header("Location: ../../../pages/edit_account.php");
    exit();
}

mysqli_close($connection);
?>
