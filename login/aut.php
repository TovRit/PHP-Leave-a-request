<?php
session_start();  // Начало сессии

// Подключаем bd
include_once '../bd/bd.php';

$errMsg = '';

// Проверяем, был ли отправлен запрос на авторизацию
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем введённые данные
    $name = $_POST['name'];
    $password = $_POST['password'];
    $admin = 0;  // Пока мы не знаем, является ли пользователь администратором

    // SQL-запрос для получения данных о пользователе
    $sql = "SELECT * FROM users WHERE name = :name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    // Проверяем, найден ли пользователь с таким логином
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Если пользователь найден, проверяем пароль
        if (password_verify($password, $user['password'])) {
            // Если пароль совпадает, сохраняем данные в сессии и перенаправляем
            $_SESSION['name'] = $user['name'];
            $_SESSION['admin'] = $user['admin'];

            if ($_SESSION['admin']){
                    header('Location:../admin/admin.php');
                }else{
                    header('Location:../index.php');
                }
        } else {
            $errMsg = 'Неверный пароль!';
        }
    } else {
        $errMsg = 'Пользователь с таким логином не найден!';
    }
}
?>