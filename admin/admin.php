<?php
include_once '../bd/bd.php';

if (!$pdo) {
    die('Ошибка подключения к базе данных.');
}

// SQL-запрос для получения всех заявлений
$sql = "SELECT * FROM violations ORDER BY submission_date DESC";


// Подготовка и выполнение запроса
$stmt = $pdo->query($sql);  

// Получаем все данные из базы
$violations = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Проверка на то, что переменная $violations определена как массив
if ($violations === null) {
    $violations = []; // Если данных нет, присваиваем пустой массив
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адимин</title>
</head>
<body>
    <h1>admin</h1>
    <h2>Список поданных заявлений</h2>

    <?php if (count($violations) > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ФИО</th>
                    <th>ID</th>
                    <th>Номер автомобиля</th>
                    <th>Описание нарушения</th>
                    <th>Дата подачи</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($violations as $violation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($violation['full_name']);?></td>
                        <td><?php echo htmlspecialchars($violation['id']); ?></td>
                        <td><?php echo htmlspecialchars($violation['car_number']); ?></td>
                        <td><?php echo htmlspecialchars($violation['violation_description']); ?></td>
                        <td><?php echo htmlspecialchars($violation['submission_date']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Заявлений нет.</p>
    <?php endif; ?>
</body>
</html>