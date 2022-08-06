<?php

$from = 'info@digitaltec.com.mx';

$sendTo = 'info@digitaltec.com.mx';


$subject = 'Nuevo mensaje de un contacto';

$fields = array('sub' => 'Subject', 'email' => 'Email', 'message' => 'Message'); 

$okMessage = 'Tu formulario se envío correctamente. Gracias, I will get back to you soon!';


$errorMessage = 'Tenemos un error. Por favor trata más tarde';

error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');
            
    $emailText = "Tu tienes un nuevo mensaje \n=============================\n";

    foreach ($_POST as $key => $value) {
        
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'De: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );
    
    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}


if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}

else {
    echo $responseArray['message'];
}
