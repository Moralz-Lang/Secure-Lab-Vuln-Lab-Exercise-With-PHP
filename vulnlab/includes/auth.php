<?php
session_start();

function login($username, $password, $pdo){
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $stmt = $pdo->query($sql);
    if ($stmt && $stmt->rowCount() === 1){
        $_SESSION['user'] = $username;
        return true;
    }
    return false;
}
