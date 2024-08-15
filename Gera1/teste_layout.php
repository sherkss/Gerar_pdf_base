<?php

session_start();

$var_cd_atendimento = $_GET['cd_atendimento'];
// DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
date_default_timezone_set('America/Sao_Paulo');
?>


<?php

$documentTemplate = "
<!doctype html> 
<html lang='en'> 

    <head> 
        <!-- Required meta tags --> 
        <meta charset='utf-8'> 
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'> 
    </head>

    <style>
    
    </style> 
    
    <body>

   
    </body> 
    
</html>";

// inclusão da biblioteca
include '../dompdf/autoload.inc.php';

// alguns ajustes devido a variações de servidor para servidor
use Dompdf\Dompdf;
use Dompdf\Options;


// Configurar Dompdf
$options = new Options();
$options->set('isRemoteEnabled', TRUE);

$dompdf = new Dompdf($options);

$dompdf->loadHtml($documentTemplate);

// Definir o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderizar o PDF
$dompdf->render();

// Enviar o PDF para o navegador
header('Content-Type: application/pdf');
header('Content-Disposition: inline; filename="documento.pdf"');

//$image = $dompdf->output();
echo $dompdf->output();
?>
