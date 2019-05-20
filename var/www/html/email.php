<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

/* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
$mail = new PHPMailer(TRUE);

try {
   $mail->setFrom('mattsaiko@gmail.com', 'Matt Saiko');
   $mail->addAddress('msaiko@idea-ma.com', 'Matt Saiko');
   $mail->Subject = 'Force';
   $mail->Body = 'There is a great disturbance in the Force.';

   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'mattsaiko@gmail.com';

/* App password. */
$mail->Password = 'dqxhuflolmfedcjx';   
   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   /* PHPMailer exception. */
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   /* PHP exception (note the backslash to select the global namespace Exception class). */
   echo $e->getMessage();
}
?>
