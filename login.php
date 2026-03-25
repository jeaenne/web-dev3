<?php
session_start();
include 'db_connect.php';

// Обработка регистрации
if (isset($_POST['register'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    
    $error = '';
    $success = '';
    
    if ($password !== $confirm) {
        $error = 'Пароли не совпадают';
    } elseif (strlen($password) < 6) {
        $error = 'Пароль должен быть не менее 6 символов';
    } else {
        $check = $conn->query("SELECT id FROM users WHERE email = '$email'");
        if ($check->num_rows > 0) {
            $error = 'Пользователь с таким email уже существует';
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$hashed')";
            if ($conn->query($sql)) {
                $success = 'Регистрация успешна! Теперь войдите.';
            } else {
                $error = 'Ошибка: ' . $conn->error;
            }
        }
    }
}

// Обработка входа
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: catalog.php');
            exit;
        } else {
            $login_error = 'Неверный пароль';
        }
    } else {
        $login_error = 'Пользователь не найден';
    }
}

// Выход
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

$is_logged_in = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Личный кабинет - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .auth-container {
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 15px;
            border: 3px solid #ffb6c1;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ffb6c1;
            border-radius: 8px;
        }
        .auth-button {
            background-color: #ff69b4;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }
        .error {
            background-color: #ffe4e1;
            color: #ff1493;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .profile-card {
            background-color: #fff0f5;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
        }
        .logout-btn {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="logo">
            <img src="images/main.jpg" alt="Фаренгейт" width="50" height="50">
            <span>🔥 Фаренгейт</span>
        </div>
        <div class="login-form">
            <?php if ($is_logged_in): ?>
                <span>👤 <?php echo $_SESSION['user_name']; ?></span>
                <a href="login.php?logout">Выйти</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="guestbook.php">Гостевая</a>
        <a href="search.php">Поиск</a>
    </div>
    <hr>

    <div class="content">
        <div class="main-content">
            <h1>Личный кабинет</h1>
            <hr>

            <?php if ($is_logged_in): ?>
                <div class="profile-card">
                    <h2>👋 Добро пожаловать, <?php echo $_SESSION['user_name']; ?>!</h2>
                    <p>📧 <?php echo $_SESSION['user_email']; ?></p>
                    <a href="login.php?logout" class="logout-btn">🚪 Выйти</a>
                </div>
            <?php else: ?>
                <div class="auth-container">
                    <h2>🔑 Вход</h2>
                    <?php if (isset($login_error)): ?>
                        <div class="error"><?php echo $login_error; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Пароль" required>
                        </div>
                        <button type="submit" name="login" class="auth-button">Войти</button>
                    </form>
                </div>

                <div class="auth-container" style="margin-top: 30px;">
                    <h2>📝 Регистрация</h2>
                    <?php if (isset($error)): ?>
                        <div class="error"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <?php if (isset($success)): ?>
                        <div class="success"><?php echo $success; ?></div>
                    <?php endif; ?>
                    <form method="post">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Имя" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Пароль (мин. 6 символов)" required>
                        </div>
                        <div class="form-group">
                            <input type="password" name="confirm_password" placeholder="Подтвердите пароль" required>
                        </div>
                        <button type="submit" name="register" class="auth-button">Зарегистрироваться</button>
                    </form>
                </div>
            <?php endif; ?>
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