<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (nếu sử dụng Composer)
require 'vendor/autoload.php';

// Tạo đối tượng PHPMailer
$mail = new PHPMailer(true);

try {
    // Cấu hình máy chủ SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Thay đổi thành máy chủ SMTP của bạn
    $mail->SMTPAuth = true;
    $mail->Username = 'nkockoicute@gmail.com'; // Địa chỉ email gửi
    $mail->Password = 'ctjsfotiqyivlzit'; // Mật khẩu email hoặc mã ứng dụng
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Người gửi và người nhận
    $mail->setFrom('nkockoicute@gmail.com', 'Your Name');
    $mail->addAddress('nkockoicute@gmail.com'); // Địa chỉ người nhận là email của chính bạn

    // Nội dung email
    $mail->isHTML(true);
    $mail->Subject = 'FormFE';
    
    // Tạo nội dung email từ dữ liệu form
    $mail->Body = '
    <h3>Thông Tin Đăng Ký Vay Tiền</h3>
    <p><strong>Tên người vay:</strong> ' . htmlspecialchars($_POST['fullname']) . '</p>
    <p><strong>CCCD:</strong> ' . htmlspecialchars($_POST['loan_identify']) . '</p>
    <p><strong>Số điện thoại:</strong> ' . htmlspecialchars($_POST['loan_phone']) . '</p>
    <p><strong>Người giới thiệu:</strong> ' . htmlspecialchars($_POST['loan_referer']) . '</p>
    ';

    $mail->send();
    echo 'Email đã được gửi thành công';
} catch (Exception $e) {
    echo "Email không gửi được. Lỗi: {$mail->ErrorInfo}";
}
?>
