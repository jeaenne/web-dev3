<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Гостевая книга - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .form-container {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 2px solid #ffb6c1;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
            font-family: inherit;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #ff69b4;
            outline: none;
        }
        .radio-group {
            margin: 15px 0;
        }
        .radio-group label {
            display: inline-block;
            font-weight: normal;
            margin-right: 20px;
        }
        .radio-group input {
            margin-right: 5px;
        }
        .checkbox-group {
            margin: 15px 0;
        }
        .checkbox-group label {
            font-weight: normal;
            display: inline-block;
        }
        .checkbox-group input {
            margin-right: 8px;
        }
        .submit-btn {
            background-color: #ff69b4;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }
        .submit-btn:hover {
            background-color: #ff1493;
            transform: scale(1.02);
        }
        .help-text {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
            display: block;
        }
        .form-title {
            color: #ff69b4;
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #ffb6c1;
        }
    </style>
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
            <h1>Гостевая книга</h1>
            <hr>

            <div class="form-container">
                <h2 class="form-title">📝 Оставьте отзыв</h2>
                <form method="post" action="save_feedback.php">

                    <!-- 1. Однострочное поле -->
                    <div class="form-group">
                        <label>Ваше имя:</label>
                        <input type="text" name="name" required>
                    </div>

                    <!-- 2. Радио-кнопки -->
                    <div class="radio-group">
                        <label>Пол:</label><br>
                        <label><input type="radio" name="gender" value="Мужской"> Мужской</label>
                        <label><input type="radio" name="gender" value="Женский"> Женский</label>
                    </div>

                    <!-- 3. Флажок (чекбокс) -->
                    <div class="checkbox-group">
                        <label>
                            <input type="checkbox" name="subscribe"> Подписаться на новости
                        </label>
                    </div>

                    <!-- 4. Раскрывающийся список (оценка) -->
                    <div class="form-group">
                        <label>Оценка:</label>
                        <select name="rating">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option selected>5</option>
                        </select>
                    </div>

                    <!-- 5. Прокручивающийся список (множественный выбор) -->
                    <div class="form-group">
                        <label>Откуда вы о нас узнали?</label>
                        <select name="source[]" size="3" multiple style="height: auto;">
                            <option>Интернет</option>
                            <option>Друзья</option>
                            <option>Реклама</option>
                            <option>Соцсети</option>
                        </select>
                        <span class="help-text">📌 Зажмите Ctrl (или Cmd на Mac), чтобы выбрать несколько</span>
                    </div>

                    <!-- 6. Многострочное поле -->
                    <div class="form-group">
                        <label>Ваш отзыв:</label>
                        <textarea name="message" rows="5" placeholder="Напишите ваше мнение..."></textarea>
                    </div>

                    <!-- 7. Кнопка отправки -->
                    <button type="submit" class="submit-btn">✉ Отправить отзыв</button>
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