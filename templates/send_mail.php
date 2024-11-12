<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once '../src/services/HomeService.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        echo "Tous les champs sont requis.";
        exit;
    }

    $mail = new PHPMailer(true);
    $homeService = new HomeService();

    try {
        $mail->isSMTP();
        $mail->Host = $_ENV['SMTP_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['SMTP_USERNAME'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];
        $mail->SMTPSecure = $_ENV['SMTP_SECURE'];
        $mail->Port = $_ENV['SMTP_PORT'];
        $mail->setFrom($_ENV['MAIL_FROM'], $name);
        $mail->addAddress('melchior.reynaud7@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = "Nouveau message de: $name - $subject";
        $mail->Body = nl2br("Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message");
        $mail->AltBody = "Nom: $name\nEmail: $email\nSujet: $subject\n\nMessage:\n$message";

        if ($mail->send()) {
            if ($homeService->addContactinfo($name, $email, $subject, $message)) {
                echo "Le message a été envoyé avec succès et enregistré en base de données.";
            } else {
                echo "Le message a été envoyé, mais l'enregistrement en base de données a échoué.";
            }
        } else {
            echo "Erreur lors de l'envoi du message.";
        }
    } catch (Exception $e) {
        echo "Erreur de PHPMailer: {$mail->ErrorInfo}";
    }
}
?>
