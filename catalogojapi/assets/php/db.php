<?php
    $connection = mysqli_connect("localhost", "root", "", "catalogojapi_db") or die ("Falha na conexão");
    mysqli_set_charset($connection, "utf8");
?>