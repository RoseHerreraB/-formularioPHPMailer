<?php

//función para enlazar el archivo email.php
require ("email.php");

// declarar variable vacia inicializada con ""
$status="";


//creación de función para validar in formacion

function validate($name, $email, $subject, $message)
{
    return !empty($name) && !empty($email) && !empty($subject) && !empty($message);
}

//inicializar variable vacia



//validacion

if (isset($_POST["form"])) {

    if(validate($_POST['name'], $_POST['email'], $_POST['subject'], $_POST['message'])){

        //se guarda la información que ingreso el usuario en variables

        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];
        $body = "$email <$name>  Te envia el siguiente mensaje <br><br> $message";
       

        //MANDAR EL CORREO

        sendMail($subject,$body,$email,$name,True);

        $status = "success";


    } else {
        $status = "danger";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Formulario de contacto</title>
</head>

<body>

    <!-- Alerts de exito o problemas-->
    <?php if ($status=="danger"):?>

        <div class="alert danger">
          <script> 
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong , the form is empty or incomplete!',
  //footer: '<a href="">Come back</a>' //  link para redirigir a una pagina deseada
})</script>
        </div>

    <?php endif; ?> <!--Importante el endif para cerrar validacion con If -->


    <?php if ($status=="success"):?>

        <div class="alert success">

        <script>Swal.fire(
                'Good job!',
                'Message sent succesfully!',
                'success'
                )</script>
            
        </div>

    <?php endif; ?>


    <form action="./form_final.php" method="POST">

        <h1>¡Contact us!</h1>

        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div class="button-container">
            <button name="form" type="submit" >Send</button>
        </div>

        <div class="contact-info">

            <div class="info">
                <span><i class="fas fa-map-marker-alt"></i> 13 Saw Mill Circle, North Olmested.</span>
            </div>

            <div class="info">
                <span><i class="fas fa-phone"></i> +1 123 456 7890</span>
            </div>

        </div>

    </form>
    
    <script src="https://kit.fontawesome.com/bbff992efd.js" crossorigin="anonymous"></script>

</body>

</html>


<!--
    
1.VERIFICAR INSTALAR COMPOSER Y PHP
2. INSTALAR composer require phpmailer/phpmailer  : PARA RECIBIR EMAIL Y GUARDARLOS (SIMULADOR)


-->