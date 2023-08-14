<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Confirm</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;900&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require 'vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    // $mail = new PHPMailer(true);
    
    $id = $_GET['id'];
    
    $name = ""; 
    $email = "";
    $case = "";

    $con = mysqli_connect("localhost", "root", "", "refrigeracion");

    if($con){
        $query = "select * from cases where id_case='{$id}'";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result)){                            
            $name = $row["name_issuer"];
            $email = $row["email_issuer"];
            $case = $row["issue"];
        }

            // header('location:../admin.php');
    }
    
    function sendEmail($anyEmail, $anyName, $anyCase){
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'refrigeraciondir@gmail.com';                     //SMTP username
        $mail->Password   = 'cgxulfijgjlomkee';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('refrigeraciondir@gmail.com', 'Tecnico Refrigeracion');
        $mail->addAddress($anyEmail, 'Cliente');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Notificacion Solicitud de Servicio - Tecnico Refrigeracion';
        $mail->Body    = 'Hola ' . $anyName .'<br>Nos comunicamos con usted para dejarle saber que su solicitud para el caso: <b>' . $anyCase . '</b> Ha sido confirmada. Un tecnico esta a cargo de su caso, recibira respuesta de <b>3-7 dias laborables</b>.<br>Pase buen dia!.';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
    echo '<h3>El correo ha sido enviado con exito!</h3';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    }

    ?>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        main {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 25px
        }

        h1 {
            font-weight: 900;
        }

        .return:visited {
            color: white;
        }

        .return {
            text-decoration: none;
            background: #0077b6;
            color white;
            padding: 25px;
            border-radius: 15px;
            color: white;
            font-size: 16px;
        }

        .accepting {
            text-decoration: none;
            background: #1A5D1A;
            color white;
            padding: 25px;
            border-radius: 15px;
            color: white;
            border: none;
            font-size: 16px;
        }

        .accepting:hover {
            cursor: pointer;
        }
    </style>

    <main>
        <h1>Estas seguro que deseas ACEPTAR esta solicitud?</h1>
        <p>Se le estara enviando un correo a <strong><?php echo $name ?></strong> a su direccion <strong><?php echo $email ?></strong> en un tiempo de <strong>24 horas</strong>.</p>
        <!-- <p>Pase buen dia!</p> -->
        <form action="" method="post">
            <button class="accepting" type="submit" name="accept-case">
                Aceptar caso
            </button>
        </form>
        <a class="return" href="../admin.php">Volver al inicio</a>
        <?php 
    
        if(isset($_POST['accept-case'])){
            sendEmail($email, $name, $case);
        }
    
        ?>
    </main>

    
</body>
</html>