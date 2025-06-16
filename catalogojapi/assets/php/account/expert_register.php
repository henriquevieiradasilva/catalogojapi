<?php
    session_start();
    require '../db.php';

    $userid = $_SESSION["userid"];
    $userlattes = $_POST['userlattes'];

    $sql_lattes_check = "SELECT LattesCV FROM ExpertSpecialization WHERE LattesCV = '$userlattes'";
    $result_lattes = mysqli_query($connection, $sql_lattes_check);
    if (mysqli_num_rows($result_lattes) > 0) {
        $_SESSION['register_error'] = "Este link do currículo Lattes já está em uso.";
        mysqli_free_result($result_lattes);
        mysqli_close($connection);

        $_SESSION['wronglattes'] = $_POST['userlattes'] ?? '';

        unset($_SESSION['form_data']);

        header("Location: ../../../pages/account.php");
        exit;
    }
    mysqli_free_result($result_lattes);

    $sql_insert = "INSERT INTO ExpertSpecialization (UserID, LattesCV)
                VALUES ('$userid', '$userlattes')";
    mysqli_query($connection, $sql_insert);
    mysqli_close($connection);

    $_SESSION["isexpert"] = true;
    header("Location: ../../../pages/account.php");
    exit;
?>
