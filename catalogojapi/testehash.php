<?php
// Isso aqui vai ser usado no login

$senhaDigitada = "senha";
echo $senhaDigitada . "<br><br>";

$hashComSenhaCerta = password_hash($senhaDigitada, PASSWORD_DEFAULT);
echo $hashComSenhaCerta . "<br><br>";

$hashComSenhaErrada =  password_hash("senha errada", PASSWORD_DEFAULT);
echo $hashComSenhaErrada . "<br><br>";

if (password_verify($senhaDigitada, $hashComSenhaCerta)) {
    echo "Senha correta! Acesso permitido.<br><br>";
} else {
    echo "Senha incorreta!";
}

if (password_verify($senhaDigitada, $hashComSenhaErrada)) {
    echo "Senha correta! Acesso permitido.<br><br>";
} else {
    echo "Senha incorreta!";
}
?>
