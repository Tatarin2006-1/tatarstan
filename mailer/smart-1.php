<?php 

$name = $_POST['biznes_name'];
$phone = $_POST['biznes_phone'];
$email = $_POST['biznes_email'];
$comment = $_POST['biznes_text'];


require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'iladrtatar2006@mail.ru';                 // Наш логин
$mail->Password = 'Tatarin2006';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('iladrtatar2006@mail.ru', 'Вопросик');   // От кого письмо 
$mail->addAddress('igsaz86@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заказ на сайте';
$mail->Body    = '
	Пользователь оставил свои данные <br> 
    Почта: ' . $email . '
	Имя: ' . $name . ' <br>
    Причина: ' . $phone . ' <br>
	Комментарий: ' . $comment . '';
$mail->AltBody = 'Небольшие технические неадекватки';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>