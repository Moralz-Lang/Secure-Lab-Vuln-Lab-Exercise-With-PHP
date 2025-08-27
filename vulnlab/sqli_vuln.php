
<?php
require __DIR__ . '/includes/config.php';

$id = $_GET['id'] ?? '';
$stmt = $pdo->query("SELECT * FROM users WHERE id = $id");
$user = $stmt->fetch();

if ($user){
    echo "User: ".$user['username'];
} else {
    echo "No user found";
}
?>
