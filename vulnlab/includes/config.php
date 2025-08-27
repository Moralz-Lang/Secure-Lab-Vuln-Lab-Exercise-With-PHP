

<?php
$host = 'localhost';
$db   = 'vulnlab';
$user = 'vulnlab_user';
$pass = 'yourpassword'; // match what you created in MySQL
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
     $pdo = new PDO($dsn, $user, $pass, [
         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES => false,
     ]);
} catch (\PDOException $e) {
     die("DB error: " . $e->getMessage());
}
?>
