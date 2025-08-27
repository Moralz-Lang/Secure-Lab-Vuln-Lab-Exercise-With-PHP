<?php
require 'includes/db.php';
$id = $_GET['id'] ?? '';
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
echo $user ? "User: ".$user['username'] : "No user found";
