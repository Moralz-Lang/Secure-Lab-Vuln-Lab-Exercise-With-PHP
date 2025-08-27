<?php
require 'includes/config.php';
require 'includes/totp.php';
require 'includes/session.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code = $_POST['totp'] ?? '';
    $secret = $_SESSION['totp_secret'] ?? '';

    if (totp_verify($secret, $code)) {
        $message = 'TOTP verified successfully!';
    } else {
        $message = 'Invalid TOTP code.';
    }
}
?>

<h2>Verify TOTP</h2>
<form method="post">
    <input type="text" name="totp" placeholder="Enter 6-digit code" required>
    <button type="submit">Verify</button>
</form>
<p><?php echo htmlspecialchars($message); ?></p>
