<?php
session_start();
$host = 'MySQL-5.7';  // адрес вашего сервера
$dbname = 'bd';  // имя вашей базы данных
$username = 'root';  // имя пользователя базы данных
$password = '';  // пароль для базы данных

try {
    // Создаем подключение
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Устанавливаем режим ошибок
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Ошибка подключения: " . $e->getMessage());
}
?>