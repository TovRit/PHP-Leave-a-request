<?php
// Подключение к базе данных
include_once 'bd/bd.php';

// Переменные для обработки ошибок
$error = '';
$success = '';


// Проверка, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $car_number = $_POST['car_number'];
    $violation_description = $_POST['violation_description'];

    // Простая валидация данных
    if (empty($car_number) || empty($violation_description)) {
        $error = "Пожалуйста, заполните все поля.";
    } else {
        // SQL-запрос для вставки данных в таблицу
        $sql = "INSERT INTO violations (car_number, violation_description) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':car_number', $car_number);
        $stmt->bindParam(':violation_description', $violation_description);

        if ($stmt->execute([$car_number, $violation_description])) {
            $success = "Заявление успешно отправлено!";
            header('Location: index.php');
        } else {
            $error = "Произошла ошибка при отправке заявления. Попробуйте позже.";
        }
    }
}