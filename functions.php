<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'emails/phpmailer6.9.1/src/PHPMailer.php';
  require 'emails/phpmailer6.9.1/src/Exception.php';
  require 'emails/phpmailer6.9.1/src/SMTP.php';

  function sendEmail($email_subject, $email_template, $sender_email, $sender_name, $receiver_email, $receiver_name, $placeholders_replacements) {
    $template_file = "emails/templates/" . $email_template;
    $template_message = file_get_contents($template_file);
    $template_message = mb_convert_encoding($template_message, 'HTML-ENTITIES', 'UTF-8');

    $placeholders = array_keys($placeholders_replacements);
    $replacements = array_values($placeholders_replacements);

    $template_message = str_replace($placeholders, $replacements, $template_message);

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;  // Enable verbose debug output
    $mail->Host = 'smtp.titan.email';
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->CharSet = 'UTF-8';
    $mail->Username = 'info@livetohelp.org';
    $mail->Password = '---';
    $mail->setFrom('info@livetohelp.org', $sender_name);
    $mail->addReplyTo($sender_email, $sender_name);
    $mail->addAddress($receiver_email, $receiver_name);
    $mail->addBCC('jeremy.jasereka@gmail.com', 'Developer');
    $mail->Subject = $email_subject;
    $mail->msgHTML($template_message, __DIR__);

    if (!$mail->send()) {
      return array('success' => false, 'error' => $mail->ErrorInfo);
    }

    return array('success' => true);
  }