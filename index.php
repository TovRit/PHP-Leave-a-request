<?php 
include_once 'bd/bd.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оставить заявку</title>
</head>
<body>
    <?php if (isset($_SESSION['name'])):?>
        <p><?php 
        echo $_SESSION['name']; 
        ?></p>
        <?php if ($_SESSION['admin']):?>
            <a href="admin/admin.php">Админка</a>
        <?php endif;?>
        <a href="<?php echo 'logout.php';?>">Выйти</a>
        <h2>Подача заявления о нарушении</h2>

        <form action="submit_violation.php" method="post">
            <label for="car_number">Номер автомобиля:</label><br>
            <input type="text" id="car_number" name="car_number" required><br><br>

            <label for="violation_description">Описание нарушения:</label><br>
            <textarea id="violation_description" name="violation_description" rows="4" cols="50" required></textarea><br><br>

            <input type="submit" value="Отправить заявление">
        </form>
    <?php else:
        echo '<a href="register/register.php">Зарегестрироваться</a>
        <a href="login/login.php">Войти</a>';
    ?>
    <?php endif;?>
</body>
</html>