<?php
	require_once 'mailer/class.smtp.php';
	require_once 'mailer/class.phpmailer.php';
	require_once 'mailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	$mail->isSendMail();
	//$mail->IsSMTP();
	//$mail->SMTPDebug = 3;                                    
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;                                                
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'info@asiato.asia';
	$mail->Password = '39Z-XRr-KMh-3vS';        
	$mail->Port = 587;                                    
	$mail->setFrom('info@asiato.asia', 'vKirirom');
	$mail->addAddress('info@asiato.asia', 'vKirirom');    
	$mail->addReplyTo('info@asiato.asia', 'vKirirom');
	$mail->isHTML(false);	
	$datetime = date("Y-m-d  h:i:sa");
	$rn = "\r\n";

	if(isset($_POST['sendMsg'])){
		//$mail->SMTPDebug = 3;                               

		$name       = $_POST['userName'] == "" ? "NONE" : $_POST['userName']; 
		$from       = $_POST['userEmail'] == "" ? "NONE" : $_POST['userEmail'];
		$mobile     = $_POST['userPhone'] == "" ? "NONE" : $_POST['userPhone'];
		$message    = $_POST['userMsg'] == "" ? "NONE" : $_POST['userMsg'];
		
		$sendStatus = "";
		
		if(($name!="NONE" and trim($name)!="") and ($from!="NONE" and trim($from)!="") and ($message!="NONE" and trim($message)!="")){
			$mail->Subject = "Message from vKirirom website.";
			$mail->Body = "Send From : ".$name.$rn
						 ."Email : ".$from.$rn
						 ."Mobile : ".$mobile.$rn
						 ."Date : ".$datetime.$rn
						 ."Message body : ".$rn
						 .$message;
			if(!$mail->send()){
				?>
					<script type="text/javascript">
						alert('Sorry your message was not sent, \nPlease try to submit it again.');
					</script>
				<?php
			}else{
				$mail->clearReplyTos();
				$mail->clearAddresses();
				$mail->addAddress($from, $name);
				$mail->addReplyTo('info@asiato.asia', 'vKirirom');
				$mail->Subject = "vKirirom confirmation message";
				$mail->Body = "Send From : vKirirom\r\n"
							 ."My inbox is very full at the moment and work is remarkably overwhelming.\n"
							 ."While I'm making my best efforts to response to all messages in a timely fashion,\n"
							 ."I'll be slower than usual for the next few weeks. Thank you for patience and understanding.";
				if ($mail->send()){
					?>
						<script type="text/javascript">
							alert('Thanks you for sending us a message.\nPlease check your email inbox.');
						</script>
					<?php
				}
				else {
					?>
						<script type="text/javascript">
							alert("We recieved your message at the moment, but we can not reply due to unexpected problem.");
						</script>
					<?php
				}
			}
		}else{
			?>
				<script type="text/javascript">
					alert('Please fill all the required fields and submit again.');
				</script>
			<?php
		}

	}

	// END SEND EMAIL CONTACT FORM IN INDEX.PHP

	/*function random_string($length) {
	    $key = '';
	    $keys = array_merge(range(0, 9), range('A', 'Z'));

	    for ($i = 0; $i < $length; $i++) {
	        $key .= $keys[array_rand($keys)];
	    }

	    return $key;
	}*/

	
?>