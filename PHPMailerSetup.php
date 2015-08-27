<?php
  require $_SERVER['DOCUMENT_ROOT'].'/includes/PHPMailer/PHPMailerAutoload.php';

  class PHPMailerSetup{

    function __construct($toEmail, $Subject, $AltBody){
      $this->mail = new PHPMailer;
      $this->mail->isSMTP();
      $this->mail->Host = 'SMTPHOST';
      $this->mail->SMTPAuth = true;
      $this->mail->Username = 'EMAIL@EXAMPLE.COM';
      $this->mail->Password = 'SUPERSECRET';
      $this->mail->Port = 25;
      $this->mail->From = 'EMAIL@EXAMPLE.COM';
      $this->mail->FromName = 'EMAIL';
      $this->mail->addAddress($toEmail);
      $this->mail->addReplyTo('EMAIL@EXAMPLE.COM', 'EMAIL');
      $this->mail->Subject = $Subject;
      $this->AltBody = $AltBody;
    }

    function prepareHTML($HTML){
        $this->mail->isHTML(true);
        $this->mail->Body = $HTML;
        $this->mail->AltBody = $this->AltBody;
    }

    function prepareText(){
        $this->mail->Body = $this->AltBody;
    }

    function send(){
        if(!$this->mail->send()) {
            echo 'Message could not be sent!';
            echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }

  }

