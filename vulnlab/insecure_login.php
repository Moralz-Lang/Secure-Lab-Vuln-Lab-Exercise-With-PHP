<?php
require 'includes/header.php';
require 'includes/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable: SQL injection possible
    $stmt = $pdo->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user = $stmt->fetch();

    if ($user) {
        echo "<p>Login successful! (Insecure)</p>";
    } else {
        echo "<p>Invalid login</p>";
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>

<?php
require 'includes/footer.php';
?>
