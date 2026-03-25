<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Поиск товаров - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <!-- ШАПКА -->
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

    <!-- МЕНЮ -->
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
        <div class="main-content">
            <h1>Поиск товаров по первой букве</h1>
            <hr>

            <!-- ФОРМА ПОИСКА -->
            <div style="background-color: #fff0f5; border: 3px solid #ffb6c1; border-radius: 20px; padding: 30px; margin: 20px 0;">
                <form method="post" action="search_result.php">
                    <label style="font-weight: bold; font-size: 16px;">Введите первую букву названия товара:</label><br>
                    <input type="text" name="letter" maxlength="1" 
                           style="width: 100px; padding: 10px; margin: 15px 0; border: 2px solid #ffb6c1; border-radius: 5px; font-size: 18px; text-align: center;" 
                           placeholder="А" required>
                    <br>
                    <button type="submit" style="background-color: #ff69b4; color: white; padding: 10px 30px; border: none; border-radius: 5px; font-size: 16px; cursor: pointer; font-weight: bold;">
                        🔍 Найти
                    </button>
                </form>
            </div>

        </div>

        <div class="right-banners">
            <div>Акция на котлы!</div>
            <div>Бесплатная доставка</div>
            <div>Теплые полы</div>
        </div>
    </div>

    <hr>

    <div class="footer">
        <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
    </div>

</div>

</body>
</html>