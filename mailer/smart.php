<?php 

$name = $_POST['first-name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailfence.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'moje.male.konto.port@mailfence.com';                 // Наш логин
$mail->Password = 'huawejushka63';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('Сайт', 'Au-rinko');   // От кого письмо 
$mail->addAddress('moje.male.konto.port@mailfence.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = '
		Пользователь оставил данные <br> 
	Имя: ' . $name . '  <br>
	E-mail: ' . $email . '  <br>
	Сообщение: ' . $message . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>