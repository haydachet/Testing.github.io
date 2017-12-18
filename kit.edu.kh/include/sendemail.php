<?php
	require_once 'include/mailer/class.smtp.php';
	require_once 'include/mailer/class.phpmailer.php';
	require_once 'include/mailer/PHPMailerAutoload.php';
	
	$mail = new PHPMailer;
	$mail->IsSendmail();
	//$mail->IsSMTP();
	//$mail->SMTPDebug = 3;                                    
	$mail->Host = 'smtp.gmail.com';  
	$mail->SMTPAuth = true;                               
	$mail->Username = 'sender@asiato.asia';                
	$mail->Password = 'a2acambodia';                        
	$mail->SMTPSecure = 'tls';           
	$mail->Port = 587;                                    
	$mail->setFrom('sender@asiato.asia', 'KIT Customer');
	$mail->addAddress('info@kit.edu.kh', 'Kirirom Institute Of Technology');    
	
	$mail->isHTML(false);	
	$datetime = date("Y-m-d  h:i:sa");
	$rn = "\r\n";

	if(isset($_POST['sendMsg'])){
		//$mail->SMTPDebug = 3;                               
		set_time_limit(70); 
		$name       = $_POST['name'] == "" ? "NONE" : $_POST['name']; 
		$from       = $_POST['email'] == "" ? "NONE" : $_POST['email'];
		$mobile     = $_POST['mobile'] == "" ? "NONE" : $_POST['mobile'];
		$subject    = $_POST['subject'] == "" ? "NONE" : $_POST['subject']; 
		$message    = $_POST['message'] == "" ? "NONE" : $_POST['message'];
		$mail->addReplyTo($from,$name);
		$sendStatus = "";
		
		if(($name!="NONE" and trim($name)!="") and ($from!="NONE" and trim($from)!="") and ($subject!="NONE" and trim($subject)!="") and ($message!="NONE" and trim($message)!="")){
			$mail->Subject = "Message from KIT website : ".$subject;
			$mail->Body = "Send From : ".$name.$rn
						 ."Subject : ".$subject.$rn
						 ."Email : ".$from.$rn
						 ."Mobile : ".$mobile.$rn
						 ."Date : ".$datetime.$rn
						 ."Message body : ".$rn
						 .$message;
			if(!$mail->send()){
				?>
					<script type="text/javascript">
						alert("Sorry, but we can't process your message at the moment.\nplease resubmit your message again.");
					</script>
				<?php
			}else{
				$mail->clearReplyTos();
				$mail->clearAddresses();
				$mail->addAddress($from,$name);
				$mail->addReplyTo("phanithken@gmail.com","Kirirom Institute Of Technology");
				$mail->Subject = "Confirmation message from Kirirom Institute Of Technology";
				$mail->Body = "Dear : Mr/Mrs ".$name."\n\n"
							  ."My inbox is very full at the moment and work is remarkably overwhelming.\n"
							  ."While I'm making my best efforts to response to all messages in a timely fashion,\n"
							  ."Thank you for patience and understanding.";

				if($mail->send()){
					?>
						<script type="text/javascript">
							window.location.href = "http://www.kit.edu.kh/thank.php";
						</script>
					<?php
				}else{
					?>
						<script type="text/javascript">	
							alert("We received your message.\n but we failed to send you a mail.");
							
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