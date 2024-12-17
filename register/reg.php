<?php
session_start();
// Подключаем bd
require_once '../bd/bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем данные из формы и очищаем их от лишних пробелов
    $admin = 0;
    $name = trim($_POST['name']); 
    $full_name = trim($_POST['full_name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];


    // Хэшируем пароль для безопасности
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Проверка на существование пользователя с таким логином или email
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE name = :name OR email = :email");
    $stmt->execute(['name' => $name, 'email' => $email]);
    $count = $stmt->fetchColumn();

    if (Empty($name) || Empty($full_name) || Empty($phone) || Empty($email)|| Empty($password) ) {
        echo "Все поля должны быть заполнены.";
    }
        else 
        {
            if ($count > 0) {
                echo "Пользователь с таким логином или email уже существует.";
                exit;
            }else {
                // Добавление пользователя в базу данных
                $sql = "INSERT INTO users (admin, name, full_name, phone, email, password) 
                VALUES (?,?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':admin', $admin);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':full_name', $full_name);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);
        
                if ($stmt->execute([$admin, $name, $full_name, $phone, $email, $hashedPassword])) {
                    $_SESSION['name'] = $name;
                    $_SESSION['admin'] = $admin;

                    if ($_SESSION['admin']){
                        header('Location:../admin/index.php');
                    }else{
                        header('Location:../index.php');
                    }
                } else {
                    echo "Ошибка при регистрации. Попробуйте позже.";
                }
        }

    }
}
?>