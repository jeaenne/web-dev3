<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">

    <!-- ШАПКА -->
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

    <!-- МЕНЮ -->
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="guestbook.php">Гостевая</a>
        <a href="search.php">Поиск</a>
        
    </div>
    <hr>

<script>
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