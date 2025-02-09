<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Nạp autoload của Composer
require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Cấu hình SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ducnhifff@gmail.com'; // Gmail của bạn để gửi đi
        $mail->Password = 'pmxi gfly vwts vanv'; // App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Cấu hình email gửi đi
        $mail->setFrom($email, $name); // Email người gửi
        $mail->addAddress('ducnhi293a@gmail.com'); // Email người nhận 1
        $mail->addAddress('mailuan345@gmail.com'); // Email người nhận 2

        // Nội dung email
        $mail->isHTML(false);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "You have received a new message:\n\nName: $name\nEmail: $email\n\nMessage:\n$message";

        $mail->send();

        // Điều hướng về lại trang contactus.html với thông báo thành công
        echo "<script>
                alert('Your message has been sent successfully!');
                window.location.href = '../contactus.html';
              </script>";
        exit();
    } catch (Exception $e) {
        // Điều hướng về lại trang contactus.html với thông báo lỗi
        echo "<script>
                alert('There was an error sending your message. Please try again.');
                window.location.href = '../contactus.html';
              </script>";
        exit();
    }
}
?>