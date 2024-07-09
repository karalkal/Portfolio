<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './vendor/autoload.php';

$errors = [];
$errorMessage = ' ';
$successMessage = ' ';
echo 'sending ...';
if (!empty($_POST)) {
    $name = $_POST['firstName'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    echo $name . "\n" . $email . "\n" . $message . "\n";

    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';

    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    if (!empty($errors)) {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red; '>{$allErrors}</p>";
    } else {
        $fromEmail = 'my_form@karaliev.art';
        $emailSubject = 'New email from your contact form';
        $myOwnEmail = 'kurcho1944@gmail.com';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(exceptions: true);
        try {
            // Configure the PHPMailer instance
            $mail->isSMTP();
            $mail->Host = 'live.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = 'api';
            $mail->Password = '87a05b808f42d137232b0cd35cbecccb';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Set the sender, recipient, subject, and body of the message 
            // $mail->addAddress("somegmailaccount@gmail.com", "Elvis");
            $mail->addAddress($myOwnEmail);
            $mail->setFrom($fromEmail);
            $mail->Subject = $emailSubject;
            $mail->isHTML(isHtml: true);
            $mail->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";

            // Send the message
            $mail->send();
            $successMessage = "<p style='color: green; '>Thank you for contacting us :)</p>";
        } catch (Exception $e) {
            echo $e;
            $errorMessage = "<p style='color: red; '>Oops, something went wrong. Please try again later</p>";
            echo $errorMessage;
        }
    }
}

