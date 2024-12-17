<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регестрация</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Регистрация</title>
    </head>

    <body>
        <h2>Форма регистрации</h2>
        <form method="post" action="reg.php">
            <label for="username">Логин:</label>
            <input type="text" id="username" name="name" required><br>

            <label for="full_name">ФИО:</label>
            <input type="text" id="full_name" name="full_name" required><br>

            <label for="phone_number">Номер телефона:</label>
            <input type="tel" id="phone_number" name="phone" required><br>

            <label for="email">Электронная почта:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required><br>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </body>

    </html>

</body>

</html>