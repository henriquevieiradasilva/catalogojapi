<?php
    session_start();
    
    require '../db.php';

    if (isset($_SESSION['auto_login_email']) && isset($_SESSION['auto_login_password'])) {
        $_POST['useremail'] = $_SESSION['auto_login_email'];
        $_POST['userpassword'] = $_SESSION['auto_login_password'];
        unset($_SESSION['auto_login_email'], $_SESSION['auto_login_password']);
    }
    
    $useremail = $_POST["useremail"];
    $userpassword = $_POST["userpassword"];
    
    $query = mysqli_query($connection, "SELECT * FROM users WHERE Email='$useremail'");
    
    if(mysqli_num_rows($query) === 0)
    { 
        $_SESSION ["validation"] = false;
        $_SESSION['register_error'] = "Usuário não encontrado";
        header("Location: ../../../pages/auth.php");
    }
    else 
    {
        $row = mysqli_fetch_array($query);
        if (password_verify($userpassword, $row["Password"])) {
            $_SESSION ["uservalidation"] = true;
            $_SESSION["userid"] = $row["UserID"];
            $_SESSION["username"] = $row["Name"];
            $_SESSION["useremail"] = $row["Email"];
            $_SESSION["userprofilephoto"] = $row["ProfilePhoto"];
            header("Location: ../../../");

            $userid = $row["UserID"];
            $query = mysqli_query($connection, "SELECT * FROM ExpertSpecialization WHERE UserID='$userid'");
            if(mysqli_num_rows($query) === 0)
            { 
                $_SESSION["isexpert"] = false;
            }
            else 
            {
                $_SESSION["isexpert"] = true;
            }
        } else {
            $_SESSION ["uservalidation"] = false;
            $_SESSION['register_error'] = "Senha incorreta";
            header("Location: ../../../pages/auth.php");
        }
    }
    mysqli_close($connection);
?>