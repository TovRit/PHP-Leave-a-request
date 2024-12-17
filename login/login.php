<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h2>Форма авторизации</h2>
        <form action="aut.php" method="post">
            <label for="username">Логин:</label><br>
            <input type="text" id="username" name="name" required><br><br>

            <label for="password">Пароль:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <input type="submit" value="Войти">
        </form>
</body>
</html>