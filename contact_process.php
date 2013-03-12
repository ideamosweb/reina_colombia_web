<?php
if (isset($_POST)) {  
  //script para mandar un correo electronico
  $destinatario = "omarsantis@hotmail.com";
  $asunto = "Contacto desde Digitalimagen.co";
  $cuerpo = '
  <html>
  <head>
    <title>Mensaje de contacto</title>
  </head>
  <body>
  <h2>Contacto desde Digitalimagen.co</h2>
  <table width="50%" border="0" cellpadding="2">
  <tr>
  <th>Nombre: </th>
  <td>'.$_POST['name'].'</td>
  </tr>
  <tr>
  <th>Email: </th>
  <td>'.$_POST['email'].'</td>
  </tr>  
  <tr>
  <th>Telefono: </th>
  <td>'.$_POST['phone'].'</td>
  </tr>  
  <tr>
  <th>Message: </th>
  <td>'.$_POST['msg'].'</td>
  </tr>
  </table>
  </body>
  </html>
  ';
  
  //para el envio de formato en HTML
  $headers = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  
  //dirección del remitente
  $headers .= "From: Imagen Digital <imagendigital2003@yahoo.com>\n";
  
  //dirección de respuesta, si queremos que sea distinta que la del remitente
  //$headers .= "Reply-To: desantis8@hotmail.com\n"; 
  
  //mail($destinatario, $asunto, $cuerpo, $headers);
  echo $cuerpo;
}


//header("Location: contacto.html");
//exit;
?>