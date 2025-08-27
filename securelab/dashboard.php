
<?php
require 'includes/header.php';
require 'includes/config.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>Dashboard</h2>
<p>Welcome, user ID <?php echo htmlspecialchars($_SESSION['user_id']); ?>!</p>

<p><a href="logout.php">Logout</a></p>

<?php
require 'includes/footer.php';
?>
