<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	$mail->setFrom('noreply@itstrade24.ru', 'Сайт заглушка');

	$mail->addAddress('post@itstrade24.ru');

	$mail->Subject = 'Форма обратной связи';

	$body = '';

	if(trim(!empty($_POST['name']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['email'].'</p>';
	}
	if(trim(!empty($_POST['tel']))){
		$body.='<p><strong>Имя:</strong> '.$_POST['tel'].'</p>';
	}

	$mail->Body = $body;

	if(!$mail->send()){
		$message = 'Ошибка';
	}else{
		$message = 'Данные отправленны!';
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response)
?>