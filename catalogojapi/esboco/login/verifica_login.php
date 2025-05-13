<?php
    session_start();
    
    require './conexao.php';

    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
    $result_query = mysqli_query($conexao, "SELECT * FROM usuarios WHERE login='$email' AND senha ='$senha'; ");
    $qtd_linhas = mysqli_num_rows($res);
    
    mysqli_close($conexao);

    if($qtd_linhas == 0)
    { 
        $_SESSION ["validado"] = false;
        header("Location: index.html");
    }
    else 
    {
        $linha = mysqli_fetch_array($res);
        $_SESSION["nome"] = $linha["nome"];
        $_SESSION ["validado"] = true;    
        header("Location: amigos.php");
    }
?>