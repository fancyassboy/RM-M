<?php
class Password_class extends DB_class{
//https://support.google.com/mail/answer/22370?hl=en
	var $email = "";
	var $trueEmail = "0";
	var $userName = "";
	var $userPassword = "";

	function setInputUserEmail($email){
		$this->email = $email;
	}

	function getCurrentUserDBEmail(){
		$sql = "SELECT * FROM user WHERE email = '{$this->email}'";
		$rs = $this->con->query($sql);
		while($row = $rs->fetch_assoc()){
			$this->trueEmail = 1;
			$this->userName = $row['email'];
			$this->userPassword = $row['password']; 
		}
	}

	function returnTrueEmail(){
		return $this->trueEmail;
	}

	 function deleteUser($UserID){
		$sql = "DELETE FROM user WHERE id='{$UserID}'";
		$rs=$this->con->query($sql);
	}
	
	function editUser($UserID, $UserValue){
		$sql = "UPDATE user set name = '{$UserValue}' WHERE  id='{$UserID}'";
		$rs=$this->con->query($sql);
		//echo $UserValue;
	}
	
	function insertUser($UserNew){
		$sql = "INSERT INTO user(name) VALUES('{$UserNew}')";
		$rs=$this->con->query($sql);		
	}

		function sendPassword(){
		$mail = new PHPMailer;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
		$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
		                                           // 1 = errors and messages
		                                           // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "matthew13rm";  // GMAIL username
		$mail->Password   = "cojowxvhqcebwocy";                                                   
		$mail->addAddress("{$this->email}");
		$mail->isHTML(true);
		$mail->CharSet = 'UTF-8';
		$mail->Subject = "Lietotāja MySQL parole:";
		$mail->Body = "
		<b>Jūsu piekļuves dati:</b><br/>
		<b>Lietotājvārds:</b> {$this->lietotajvards}<br/>
		<b>Parole:</b> {$this->parole}
		";
		$mail->send();
	}
}
?>