<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фаренгейт - Контакты</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .contact-form {
            background-color: #fff0f5;
            padding: 25px;
            border-radius: 10px;
            border: 2px solid #ffb6c1;
            margin-bottom: 30px;
        }
        
        .contact-form label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea,
        .contact-form select {
            width: 100%;
            padding: 10px;
            border: 2px solid #ffb6c1;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        
        .contact-form input[type="text"]:focus,
        .contact-form input[type="email"]:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            border-color: #ff69b4;
            outline: none;
            box-shadow: 0 0 5px #ff69b4;
        }
        
        .contact-form textarea {
            height: 120px;
            resize: vertical;
        }
        
        .contact-form button {
            background-color: #ffb6c1;
            color: #333;
            padding: 12px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            font-weight: bold;
            border: 2px solid #ff69b4;
        }
        
        .contact-form button:hover {
            background-color: #ff69b4;
            color: white;
        }
        
        .contact-info {
            background-color: #ffe4e1;
            padding: 20px;
            border-radius: 10px;
            border: 2px solid #ffb6c1;
            margin-bottom: 30px;
        }
        
        .contact-info p {
            margin: 10px 0;
            font-size: 16px;
        }
        
        .contact-info strong {
            color: #ff69b4;
        }
        
        .map-placeholder {
            background-color: #e0e0e0;
            width: 100%;
            height: 250px;
            border: 3px solid #ffb6c1;
            border-radius: 10px;
            text-align: center;
            line-height: 250px;
            color: #666;
            font-size: 18px;
            margin-top: 20px;
            background-image: linear-gradient(45deg, #ccc 25%, #ddd 25%, #ddd 50%, #ccc 50%, #ccc 75%, #ddd 75%, #ddd 100%);
            background-size: 50px 50px;
        }
        
        .map-placeholder span {
            background-color: rgba(255,255,255,0.8);
            padding: 10px 20px;
            border-radius: 5px;
            border: 2px solid #ff69b4;
        }
        
        .required:after {
            content: " *";
            color: #ff69b4;
            font-weight: bold;
        }
        
        /* НОВЫЕ СТИЛИ для кнопок связи */
        .contact-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 15px;
        }
        
        .contact-button {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            background-color: white;
            border: 2px solid #ffb6c1;
            border-radius: 10px;
            text-decoration: none;
            color: #333;
            font-weight: bold;
            transition: all 0.3s;
        }
        
        .contact-button:hover {
            background-color: #ffb6c1;
            transform: translateX(5px);
            border-color: #ff69b4;
        }
        
        .contact-button .icon {
            font-size: 24px;
            margin-right: 15px;
            width: 30px;
            text-align: center;
        }
        
        .contact-button .text {
            flex: 1;
        }
        
        .contact-button .action {
            color: #ff69b4;
            font-size: 14px;
        }
        
        /* Стили для секций с якорями */
        .contact-section {
            scroll-margin-top: 100px;
        }
        
        /* Кнопка наверх */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #ff69b4;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 30px;
            box-shadow: 0 5px 20px rgba(255, 105, 180, 0.4);
            transition: all 0.3s;
            border: 3px solid white;
            z-index: 1000;
        }
        
        .back-to-top:hover {
            background-color: #ff1493;
            transform: scale(1.1) translateY(-5px);
        }
        
        /* Навигация по странице */
        .page-navigation {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 50px;
            padding: 15px 25px;
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        .page-navigation a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 30px;
            transition: all 0.3s;
        }
        
        .page-navigation a:hover {
            background-color: #ffb6c1;
            color: #ff1493;
        }
    </style>
</head>
<body>
<!-- ЯКОРЬ ДЛЯ КНОПКИ НАВЕРХ -->
<div id="top"></div>

<div class="container">

    <!-- ШАПКА (HEADER) - ОБНОВЛЕНА -->
    <div class="header">
        <div class="logo">
            <img src="images/main.jpg" alt="Фаренгейт" width="50" height="50" style="border-radius: 10px; margin-right: 10px;">
            <span>🔥 Фаренгейт</span>
        </div>
        <div class="login-form">
            <?php if ($is_logged_in): ?>
                <div style="display: flex; align-items: center; gap: 10px;">
                    <span>👤 <?php echo $_SESSION['user_name']; ?></span>
                    <a href="logout.php" style="color: white; background: #ff69b4; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Выйти</a>
                </div>
            <?php else: ?>
                <input type="text" placeholder="логин" id="quick-login">
                <input type="password" placeholder="пароль" id="quick-password">
                <div>
                    <button onclick="quickLogin()">войти</button>
                    <a href="login.php">регистрация</a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- МЕНЮ САЙТА -->
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="guestbook.php">Гостевая</a>
        <a href="search.php">Поиск</a>
        
    </div>
    <hr>

    <!-- ОСНОВНОЙ КОНТЕНТ (три колонки) -->
    <div class="content">
        <!-- Левая колонка (меню) -->
        <div class="sidebar">
            <h3 style="margin-top:0; text-align:center;">📞 Связь с нами</h3>
            
            <!-- РАБОЧИЕ КНОПКИ СВЯЗИ -->
            <div class="contact-buttons">
                <!-- Телефон - открывает приложение для звонка -->
                <a href="tel:+74951234567" class="contact-button">
                    <span class="icon">📞</span>
                    <span class="text">Телефон</span>
                    <span class="action">Позвонить</span>
                </a>
                
                <!-- Email - открывает почтовую программу -->
                <a href="mailto:info@fahrenheit.ru?subject=Вопрос%20с%20сайта" class="contact-button">
                    <span class="icon">✉️</span>
                    <span class="text">Email</span>
                    <span class="action">Написать</span>
                </a>
                
                <!-- WhatsApp - открывает WhatsApp -->
                <a href="https://wa.me/74951234567?text=Здравствуйте!%20Вопрос%20с%20сайта" target="_blank" class="contact-button">
                    <span class="icon">📱</span>
                    <span class="text">WhatsApp</span>
                    <span class="action">Написать</span>
                </a>
                
                <!-- Telegram - открывает Telegram -->
                <a href="https://t.me/fahrenheit_support" target="_blank" class="contact-button">
                    <span class="icon">✈️</span>
                    <span class="text">Telegram</span>
                    <span class="action">Написать</span>
                </a>
                
            </div>
            
            <hr style="border-color:#ff69b4;">
            
            <!-- НАВИГАЦИЯ ПО СТРАНИЦЕ -->
            <h4 style="text-align:center; margin:10px 0;">На странице:</h4>
            <a href="#form">📝 Напишите нам</a>
            <a href="#address">📍 Наш адрес</a>
            <a href="#map">🗺 Карта</a>
            <a href="#top" style="background-color:#ffe4e1;">↑ Наверх</a>
            
            <hr>
            <h4 style="text-align:center;">Часы работы:</h4>
            <p style="text-align:center; font-size:14px;">
                Пн-Пт: 9:00-20:00<br>
                Сб: 10:00-18:00<br>
                Вс: выходной
            </p>
        </div>

        <!-- Центральная колонка (контакты) -->
        <div class="main-content">
            <!-- Верхняя навигация -->
            <div class="page-navigation">
                <a href="#form">📝 Напишите нам</a>
                <a href="#address">📍 Адрес</a>
                <a href="#map">🗺 Карта</a>
            </div>
            
            <h1>Контакты</h1>
            <hr>
            
            <!-- СЕКЦИЯ ФОРМЫ (с якорем) -->
            <div id="form" class="contact-section">
                <h2>Напишите нам</h2>
                
                <!-- ФОРМА ОБРАТНОЙ СВЯЗИ -->
                <div class="contact-form">
                    <form action="#" method="post">
                        <label for="name" class="required">Имя:</label>
                        <input type="text" id="name" name="name" placeholder="Введите ваше имя" required>
                        
                        <label for="email" class="required">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Введите ваш email" required>
                        
                        <label for="subject" class="required">Тема:</label>
                        <input type="text" id="subject" name="subject" placeholder="Тема сообщения" required>
                        
                        <label for="message" class="required">Сообщение:</label>
                        <textarea id="message" name="message" placeholder="Введите ваше сообщение..."></textarea>
                        
                        <label for="city">Ваш город:</label>
                        <select id="city" name="city">
                            <option value="moscow" selected>Москва</option>
                            <option value="spb">Санкт-Петербург</option>
                            <option value="kazan">Казань</option>
                            <option value="other">Другой</option>
                        </select>
                        
                        <label for="phone">Контактный телефон:</label>
                        <input type="text" id="phone" name="phone" placeholder="+7 (___) ___-__-__">
                        
                        <div style="text-align:center;">
                            <button type="submit">✉ Отправить сообщение</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- СЕКЦИЯ АДРЕСА (с якорем) -->
            <div id="address" class="contact-section">
                <h2>Адрес</h2>
                
                <div class="contact-info">
                    <p><strong>📞 Телефон:</strong> <a href="tel:+74951234567" style="color:#ff69b4;">+7 (495) 123-45-67</a></p>
                    <p><strong>✉ Email:</strong> <a href="mailto:info@fahrenheit.ru" style="color:#ff69b4;">info@fahrenheit.ru</a></p>
                    <p><strong>📍 Адрес:</strong> г. Москва, ул. Строителей, д. 1</p>
                    <p><strong>🕒 Режим работы:</strong> Пн-Пт 9:00-20:00, Сб 10:00-18:00</p>
                </div>
            </div>
            
            <!-- СЕКЦИЯ КАРТЫ (с якорем) -->
            <div id="map" class="contact-section">
                <h3>*Карта проезда</h3>
                <div style="border: 3px solid #ffb6c1; border-radius: 10px; overflow: hidden; margin-top: 20px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2250.22052883512!2d37.859103000000005!3d55.667765200000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414ab65d2d965cbb%3A0x5348fff486c8ab17!2z0YPQuy4g0KHRgtGA0L7QuNGC0LXQu9C10LksIDEsINCa0L7RgtC10LvRjNC90LjQutC4LCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LsuLCAxNDAwNTQ!5e0!3m2!1sru!2sru!4v1772106015786!5m2!1sru!2sru" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>

        <!-- Правая колонка (баннеры) -->
        <div class="right-banners">
            <h3 style="margin-top:0;">🔥 Горячие предложения</h3>
            
            <div style="background:#ffb6c1;">
                <strong>⚡ СКИДКА 20%</strong><br>
                На все котлы до конца месяца
            </div>
            
            <div style="background:#ff69b4; color:white;">
                <strong>🎁 ПОДАРОК</strong><br>
                Терморегулятор в подарок
            </div>
            
            <div style="background:#ffb6c1;">
                <strong>🚚 БЕСПЛАТНАЯ ДОСТАВКА</strong><br>
                При заказе от 30 000 руб.
            </div>
           
        </div>
    </div>
    
    <!-- КНОПКА НАВЕРХ -->
    <a href="#top" class="back-to-top" title="Наверх">↑</a>
    
    <hr>

    <!-- ПОДВАЛ (FOOTER) -->
    <div class="footer">
        <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
    </div>

</div>

<!-- СКРИПТ ДЛЯ ПЛАВНОЙ ПРОКРУТКИ И БЫСТРОГО ВХОДА -->
<script>
    // Плавная прокрутка при клике на якорные ссылки
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#' || targetId === '') return;
            
            const target = document.querySelector(targetId);
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Быстрый вход из шапки
    function quickLogin() {
        const email = document.getElementById('quick-login').value;
        const password = document.getElementById('quick-password').value;
        if (email && password) {
            window.location.href = 'login.php?email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password);
        } else {
            alert('Введите email и пароль');
        }
    }
</script>
</body>
</html>