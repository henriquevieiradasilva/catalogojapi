<?php

include './db.php';
include './auth/login_check_true.php';
if (isset($_POST["pesquisa"])) {
    $pesquisa = $_POST["pesquisa"];
    $tabela = mysqli_query($connection, $pesquisa);
} else {
    exit;
}

$linha = mysqli_fetch_array($tabela);

if (!isset($_POST['chartImage1'])) {
    exit('Imagem do gráfico não recebida.');
}

$image1 = $_POST['chartImage1'];
$image2 = $_POST['chartImage2'];

$print = "
<html>
    <body>
        <h1>Posts selecionados VS posts totais</h1>
        <img src='$image1'/>
        <h1>Posts selecionados VS posts selecionados verificados por especialistas</h1>
        <img src='$image2'/>
    </body>
</html>
";

use Dompdf\Dompdf;

require 'dompdf/autoload.inc.php';

$dompdf = new Dompdf();
$dompdf->loadhtml("$print");
$dompdf->set_option('defaultFont', 'sans');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream();

?>