<?php

    include 'connec.php';

	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
    $token = $_REQUEST["token"];

    if(!empty($_REQUEST["id_producto"])){
    $id_producto = $_REQUEST["id_producto"];
    }

    if(!empty($_REQUEST["email"])){
    $email = $_REQUEST["email"];
    }

    if(!empty($_REQUEST["nombre"])){
    $nombre = $_REQUEST["nombre"];
    }

    if(!empty($_REQUEST["cel"])){
    $cel = $_REQUEST["cel"];
    }

    if(!empty($_REQUEST["precioTotal"])){ 
    $precio = $_REQUEST["precioTotal"];
    } 

    if(!empty($_REQUEST["titulo"])){
    $titulo = $_REQUEST["titulo"];
    }

    $payment_method_id = $_REQUEST["payment_method_id"];
    $installments = $_REQUEST["installments"];
    $issuer_id = $_REQUEST["issuer_id"];
    require_once 'vendor/autoload.php'; 

    MercadoPago\SDK::setAccessToken("TEST-2698338356548048-021601-ba45440a60fb81df17c5431333be3ef9-173261449"); // Either Production or SandBox AccessToken

    //...
    $payment = new MercadoPago\Payment();
    $payment->transaction_amount = $precio;
    $payment->token = $token;
    $payment->description = $titulo;
    $payment->installments = $installments;
    $payment->payment_method_id = $payment_method_id;
    $payment->issuer_id = $issuer_id;
    $payment->payer = array(
    "email" => "omar.vz93@gmail.com"
    );
    // Guarda y postea el pago
    $payment->save();
    $preference = new MercadoPago\Preference();
   
    if($payment->status == "approved"){
    $fecha_hoy = date("Y-m-d H:i:s");
     $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
     $password = substr(str_shuffle($permitted_chars), 0, 10);
        
    $usuario = "INSERT INTO t_usuario (
    correo,
    estatus,
    telefono,
    nombre,
    password,
    id_rol,
    fecha_creacion_usuario) VALUES (
    '$email',
    '1',
    '$cel',
    '$nombre',
    '$password',
    '3',
    '$fecha_hoy' 
    )";
        
    $destino = $email;
$asunto = "Prueba web";
$cabeceras = "MIME-Version: 1.0" . "\r\n";
$cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$cabeceras .= "From: omar.vz91@gmail.com" . "\r\n";        
$cuerpo ="<table border='0' cellpadding='0' cellspacing='0' style='width: 100%; margin-bottom: 20px'>
                <tbody>
                    <tr>
                         <td style='vertical-align: top; padding-bottom:30px;' align='center'><a href='http://eliteadmin.themedesigner.in' target='_blank'><br/>
            <img src='http://digitaltec.com.mx/images/logo/logo-106x106.jpg' width='100px' alt='Eliteadmin Responsive web app kit' style='border:none'></a> </td>
                    </tr>
                </tbody>
            </table>
            <div style='padding: 40px; background: #fff;'>
                <table border='0' cellpadding='0' cellspacing='0' style='width: 100%;'>
                    <tbody>
                        <tr>
                            <td><b>Querido cliente,</b>
                                <p>Le agradecemos por elegirnos y esperemos darle el mejor servicio.</p>
                                <a href='javascript: void(0);' style='display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #4fc3f7; border-radius: 60px; text-decoration:none;'>Entrar al portal</a>
                                <p>Se creo un usuario y contraseña para que pueda generar los tickets de trabajo y llevar un orden de las citas</p>
                                <b>Usuario:</b>$email<br>
                                <b>Password:</b>$password<br>
                                <p></p>
                                <b>Gracias</b> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
";

mail($destino,$asunto,$cuerpo,$cabeceras);

    if (mysqli_query($conn, $usuario)) {
    $lastid = mysqli_insert_id($conn); 
	$venta = "INSERT INTO t_producto_vendido (
	fecha_creacion_venta,
    id_producto,
    id_usuario,
	token,
	email,
	nombre,
	telefono,
	metodo_pago,
	intallments,
	issuer_id,
	descripcion,
	monto_total,
	estatus) VALUES (
    '$fecha_hoy',
    '$id_producto',
    '$lastid',
    '$token',
    '$email',
    '$nombre',
    '$cel',
    '$payment_method_id',
    '$installments',
    '$issuer_id',
    '$titulo',
    '$precio',
    'aprobado'
    )";

        /*codigo venta*/
        if (mysqli_query($conn, $venta)) {
		 
         header("Location: http://digitaltec.com.mx/aprobado.php");  
        
		} else {
        
			echo "Error: " . $venta . "<br>" . mysqli_error($conn);
        
		}
        /*codigo venta*/
		} else {
        
			echo "Error: " . $usuario . "<br>" . mysqli_error($conn);
        
		}	    
    
    
	mysqli_close($conn);
    
    }else if($payment->status == "rejected"){
        header("Location: http://digitaltec.com.mx/error.php");
    }
    //...

  ?>