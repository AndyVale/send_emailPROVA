
<?php
//includo il file di configurazione


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer-master\PHPMailer-master\src\PHPMailer.php";
require "PHPMailer-master\PHPMailer-master\src\Exception.php";
require "PHPMailer-master\PHPMailer-master\src\SMTP.php";

//require_once 'C:\xampp\phpMyAdmin\vendor\autoload.php';
//guardo se l'utente ha schiacciato il bottone
//controllo che mi sia arrivato i dati della fetch

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data=json_decode(file_get_contents('php://input'), true);

    $destinatari = [    
    'dodomp@alice.it',
    ];

    //if(isset($_POST['BEmail'])){
    //echo 'fin qua sono arrivato';
    //creo istanza di phpmailer
    $mail=new PHPMailer(true);
    try {
        // Server settings
        //$mail->SMTPDebug = 2;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 's.mussopiantelli@gmail.com';                     // SMTP username
        $mail->Password   = 'cpendhumfpgizixs';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        // Recipients
        for ($i=0; $i < count($destinatari); $i++) { 
            $mail->addAddress($destinatari[$i]);
        }
        //$mail->setFrom('s.mussopiantelli@gmail.com', 'Stefano Musso Piantelli');
        //$mail->addAddress('dodomp@alice.it', 'Dodo Musso Piantelli');
        // Add a recipient
        /*$mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        */
        // Content
        
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $data[object];
        $mail->Body = $data[text];
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        $mail->send();
        $response =['status' => 'success', 'message' => 'Email inviata correttamente'];
        //header('Content-Type: application/json');
        //echo json_encode($response);
    } catch (Exception $e) {
        $response =['status' => 'unsuccess', 'message' => 'Email non inviata'];
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header('Content-Type: application/json');
        echo json_encode($response);
        exit();
    }

    header('Content-Type: application/json');
    echo json_encode($response);

    exit(); 
}





?>