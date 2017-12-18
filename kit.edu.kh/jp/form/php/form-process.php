<?php

    require '../mailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();

    $errorMSG = "";
    $name = "";
    $email = "";
    $msg_subject = "";
    $tel = "";
    $grade = "";
    $inquiry = "";

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
    if (empty($_POST["tel"])) {
        $errorMSG .= "Phone number is required ";
    } else {
        $tel = $_POST["tel"];
    }
   if (empty($_POST["grade"])) {
        $errorMSG .= "Grade is required ";
    } else {
        $grade = $_POST["grade"];
    }
   if (empty($_POST["grade"])) {
        $errorMSG .= "Text your some inquiry is required ";
    } else {
        $inquiry = $_POST["inquiry"];
    }
//
//    if ($errorMSG == ""){
////        echo "success";
//    }else{
//        echo $errorMSG;
//    }

    $mail->Host = "smtp.gmail.com";
//    $mail->isSMTP();
    $mail->isSendmail();
//    $mail->SMTPDebug = 2;
    $mail->SMTPAuth = true;
    $mail->Username = 'info@kit.edu.kh';
    $mail->Password = 'kitcambodia2017';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('info@kit.edu.kh','キリロム工科大学');
    $mail->addAddress($email,'KIT');
    $mail->isHTML(true);
    $mail->CharSet = 'UTF-8';
    $rn = "\r\n";
    $br = "<br>";
    $brbr = "<br><br>";
    $hr="<hr>";

        $mail->Subject = "キリロム工科大学 資料請求受付完了";
        $mail->Body = $name."様".$brbr
            ."資料請求をお問合せいただきありがとうございました。  ".$br
            ."以下の内容で登録を受け付けました。"
            .$brbr
            ."氏名：".$rn.$name.$br
            ."メールアドレス：".$rn.$email.$br
            ."電話番号： ".$rn.$tel
            .$brbr
            ."キリロム工科大学に関する説明会や入試情報を追ってお送りさせていただきます。 "
            .$brbr
            ."以下フェイスブックページにて情報発信をしております。ご興味があればご拝読ください。"
            .$br
            ."【vキリロムネイチャーシティ (facebookページ)】".$br
            ."<a href='https://www.facebook.com/vkiriromjp/'>https://www.facebook.com/vkiriromjp/</a> "
            .$brbr
            ."【Kirirom Institute of Technology (英語facebookページ)】".$br
            ."<a href='https://www.facebook.com/KITinstitute/'>https://www.facebook.com/KITinstitute/</a>."
            .$brbr
            ."ご質問等がございましたら、本メールアドレスにご返信ください。 どうぞよろしくお願いいたします。  "
            .$brbr
            .$hr
            ."キリロム工科大学 - Kirirom Institute of Technology - ".$br
            ."E-mail：info@kit.edu.kh ".$rn.$br
            .$hr;
    $mail->send();
    ?>
        <script type="text/javascript">
            window.location.href = "http://kit.edu.kh/jp/thanks-entry.html";
        </script>
    <?php
?>