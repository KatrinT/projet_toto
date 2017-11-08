<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//fonction pour verifier l'existante d'un email
//return true ou false
function emailExists($nomConnection) {
    //globaliser la varible pdo - elle fait le lien  dans mon fichier config
    global $pdo;
    $doublon = 'SELECT usr_email FROM users where usr_email = :nomConnection';
    $pdoStatement = $pdo->prepare($doublon);
    $pdoStatement->bindValue(':nomConnection', $nomConnection, PDO::PARAM_STR);
    $compteDoublon = $pdoStatement->execute();

    //compte le nombre de ma requete -si email existe deja
    $nombreDoublon = $pdoStatement -> rowCount();
    //echo $nombreDoublon;

    if ($nombreDoublon >= 1) {
        return true;
    } else{
        return false;
    }
}


// EMAIL

function sendEmail($to, $subject, $htmlContent, $textConten=''){
    global $config;
    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 4;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $config['MAIL_HOST'];   // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $config['MAIL_USERNAME'];                 // SMTP username
        $mail->Password = $config['MAIL_PASSWORD'];                          // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('kaychooon@gmail.com', 'Catherine');
        $mail->addAddress($to);     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $htmlContent;
        $mail->AltBody = $textConten;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}
