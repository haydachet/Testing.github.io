<?php

    require '../mailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $errorMSG = "";
    $name = "";
    $email = "";
    $msg_subject = "";
    $line = "";

    // NAME
    if (empty($_POST["name"])) {
        $errorMSG = "Name is required ";
    } else {
        $name = $_POST["name"];
    }
    // EMAIL
    if (empty($_POST["email"])) {
        $errorMSG .= "Email is required ";
    } else {
        $email = $_POST["email"];
    }
    // MESSAGE
    if (empty($_POST["line"])) {
        $errorMSG .= "Phone number is required ";
    } else {
        $line = $_POST["line"];
    }

    if ($errorMSG == ""){
        echo "success";
    }else{
        echo $errorMSG;
    }


    $mail->Host = "smtp.gmail.com";
//    $mail->isSMTP();
    $mail->isSendmail();
    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Username = 'soptam177@gmail.com';
    $mail->Password = 'subtam10101994';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('soptam177@gmail.com','soptam');
    $mail->addAddress($email,'subtam');
    $mail->isHTML(true);
    $rn = "\r\n";
        $mail->Subject = "Registration complete";
        $mail->Body = "Thank you very much for your registration below are the contact information if you want to know more informatioin.".$rn
            ."Email :  info@kit.edu.kh".$rn
            ."Mobile : 070405405".$rn
            ."Message body : ".$rn
            ."If you want to see more about video click this: <a href='http://kit.edu.kh/jp/entry.html'";
    $mail->send();


//echo $name;
//echo $email;
//echo $line;
//echo $msg_subject;

?>