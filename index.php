<?php

$result='';
if(isset($_POST['submit'])){
require 'mail/PHPMailerAutoload.php';
$mail = new PHPMailer;

// $mail->SMTPDebug = 2;                                 // Enable verbose debug output
$mail->isSMTP();                                    
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;                           
$mail->Username = 'mdmsujon852@gmail.com';      // From email to send other email
$mail->Password = 'TheNew017pass.';             // This email pass.
$mail->SMTPSecure = 'tls';                           
$mail->Port = 587;                                   

//Recipients
$mail->setFrom($_POST['email'],$_POST['name']); // 
$mail->addAddress('mdaashikur@gmail.com');     // where to send email.
$mail->addReplyTo($_POST['email']);


// //Attachments
// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// //Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Subject '.$_POST['subject'];
$mail->Body    = $_POST['email'].'<br/> <i>'.$_POST['msg'] .'</i>';
// $mail->AltBody = strip_tags($_POST['msg']);;
// $mail->send();

if(!$mail->send()){
  $result ='Fail to sendt. ';
}else{
  $result ='massesse send! '. 'Thanks for get in tough : ' .$_POST['name'];

}

}

  ?>




<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Form Bootstrap</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Contact Us</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success"><?= $result; ?></h5><!--|||||||||||||||||||||||__-->
        <form action="" method="post" id="form-box" class="p-2">
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-at"></i></span>
            </div>
            <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
          </div>
          <div class="form-group input-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
            </div>
            <textarea name="msg" id="msg" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>