<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? 'Не указано';
    $gender = $_POST['gender'] ?? 'Не указан';
    $subscribe = isset($_POST['subscribe']) ? 'Да' : 'Нет';
    $rating = $_POST['rating'] ?? 'Не указано';
    
    // source — это массив, если выбрано несколько
    $source = isset($_POST['source']) ? implode(", ", $_POST['source']) : 'Не указано';
    
    $message = $_POST['message'] ?? '';

    // Формируем строку для записи
    $data = "Имя: $name | Пол: $gender | Подписка: $subscribe | Оценка: $rating | Источник: $source | Отзыв: $message\n";

    // Сохраняем в файл
    file_put_contents("feedback.txt", $data, FILE_APPEND);
    ?>
    
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title>Спасибо за отзыв - Фаренгейт</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <img src="images/main.jpg" alt="Фаренгейт" width="50" height="50" style="border-radius: 10px; margin-right: 10px;">
                <span>Фаренгейт</span>
            </div>
            <div class="login-form">
                <input type="text" placeholder="логин">
                <input type="password" placeholder="пароль">
                <div>
                    <button>войти</button>
                    <a href="login.html">регистрация</a>
                </div>
            </div>
        </div>

        <div class="navbar">
            <a href="index.html">Главная</a>
            <a href="catalog.html">Каталог</a>
            <a href="contacts.html">Контакты</a>
            <a href="guestbook.php">Гостевая</a>
            <a href="search_form.php">Поиск</a>
            <div class="search-bar">
                <input type="text" placeholder="поиск...">
                <button>искать</button>
            </div>
        </div>
        <hr>

        <div class="content">
            <div class="main-content" style="text-align: center;">
                <div style="background-color: #fff0f5; border: 3px solid #ffb6c1; border-radius: 20px; padding: 50px; margin: 40px 0;">
                    <h2 style="color: #ff69b4;">✅ Спасибо за отзыв, <?php echo htmlspecialchars($name); ?>!</h2>
                    <p>Ваше мнение очень важно для нас.</p>
                    <br>
                    <a href="guestbook.php" style="display: inline-block; background-color: #ff69b4; color: white; padding: 10px 25px; text-decoration: none; border-radius: 5px;">← Вернуться к гостевой книге</a>
                </div>
            </div>
            <div class="right-banners">
                <div>Акция на котлы!</div>
                <div>Бесплатная доставка</div>
            </div>
        </div>

        <hr>
        <div class="footer">
            <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
        </div>
    </div>
    </body>
    </html>
    <?php
} else {
    echo "Ошибка: форма не отправлена.";
}
?>