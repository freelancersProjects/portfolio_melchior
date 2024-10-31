<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Requête POST détectée\n";

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        echo "Initialisation de PHPMailer\n";

        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = 'aa760c90347635';
        $mail->Password = 'a0af44ddadde6c';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        $mail->setFrom($email, $name);
        $mail->addAddress('mathis.oxym@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de: $name - $subject";
        $mail->Body    = nl2br("Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message");
        $mail->AltBody = "Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message";

        if ($mail->send()) {
            echo "Le message a été envoyé avec succès.";
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    } catch (Exception $e) {
        echo "Erreur de PHPMailer: {$mail->ErrorInfo}";
    }
} else {
    echo "Méthode de requête invalide.";
}
?>
﻿
