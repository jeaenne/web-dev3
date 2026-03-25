<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты поиска - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .product-card {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 15px;
            padding: 20px;
            margin: 20px 0;
            transition: all 0.3s;
        }
        .product-card:hover {
            border-color: #ff69b4;
            transform: scale(1.02);
        }
        .product-name {
            font-size: 20px;
            font-weight: bold;
            color: #ff69b4;
            margin-bottom: 8px;
        }
        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }
        .product-desc {
            color: #484343;
            font-size: 14px;
            line-height: 1.5;
            margin: 10px 0;
        }
        .product-link {
            display: inline-block;
            background-color: #ff69b4;
            color: white;
            padding: 8px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            font-weight: bold;
        }
        .product-link:hover {
            background-color: #ff1493;
        }
        .error-box {
            background-color: #ffe4e1;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border: 2px solid #ffb6c1;
        }
        .back-link {
            display: inline-block;
            color: #ff69b4;
            margin-top: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
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
            <h1>Результаты поиска</h1>
            <hr>

            <?php
            // Получаем букву из формы
            $letter = isset($_POST['letter']) ? trim($_POST['letter']) : '';
            
            // Проверяем, что буква введена
            if ($letter === '') {
                echo '<div class="error-box">
                        <h3 style="color: #ff69b4;">⚠️ Ошибка!</h3>
                        <p>Вы не ввели букву. Пожалуйста, вернитесь и введите одну букву.</p>
                        <a href="search_form.php" class="back-link">← Вернуться к поиску</a>
                      </div>';
            } 
            // Проверяем, что введена ровно одна буква
            elseif (mb_strlen($letter) != 1) {
                echo '<div class="error-box">
                        <h3 style="color: #ff69b4;">⚠️ Ошибка!</h3>
                        <p>Введите ровно одну букву. Вы ввели: "' . htmlspecialchars($letter) . '"</p>
                        <a href="search_form.php" class="back-link">← Вернуться к поиску</a>
                      </div>';
            }
            else {
                // Приводим букву к верхнему регистру
                $letter = mb_strtoupper($letter);
                
                // ========== МНОГОМЕРНЫЙ МАССИВ ТОВАРОВ ==========
                $catalog = [
                    [
                        'name' => 'Котел газовый Protherm Скат 14K',
                        'price' => '45 000 руб.',
                        'desc' => 'Настенный газовый котел с закрытой камерой сгорания. Мощность 14 кВт, КПД 93%.',
                        'page' => 'product1.html'
                    ],
                    [
                        'name' => 'Радиатор биметаллический Global STYLE 350',
                        'price' => '3 500 руб./секция',
                        'desc' => '10 секций, теплоотдача 150 Вт, рабочее давление 35 атм.',
                        'page' => 'product2.html'
                    ],
                    [
                        'name' => 'Циркуляционный насос Grundfos UPS 25-40',
                        'price' => '7 200 руб.',
                        'desc' => '3 скорости, напор 4 м, энергоэффективность класса А.',
                        'page' => 'product3.html'
                    ],
                    [
                        'name' => 'Трубы PEX 16мм с кислородозащитным слоем',
                        'price' => '85 руб./м',
                        'desc' => 'Сшитый полиэтилен PEX-A, макс. температура 95°C.',
                        'page' => 'product4.html'
                    ],
                    [
                        'name' => 'Бойлер косвенного нагрева Bosch OKC 100 NTR',
                        'price' => '28 900 руб.',
                        'desc' => '100 литров, нержавеющая сталь, быстрый нагрев.',
                        'page' => 'product5.html'
                    ],
                    [
                        'name' => 'Терморегулятор комнатный Luxor RT500',
                        'price' => '2 100 руб.',
                        'desc' => 'Программируемый, Wi-Fi, управление со смартфона.',
                        'page' => 'product6.html'
                    ]
                ];
                
                // Поиск товаров, начинающихся на введённую букву
                $results = [];
                foreach ($catalog as $product) {
                    // Берём первую букву названия
                    $firstLetter = mb_strtoupper(mb_substr($product['name'], 0, 1));
                    
                    if ($firstLetter === $letter) {
                        $results[] = $product;
                    }
                }
                
                // Выводим результаты
                if (count($results) > 0) {
                    echo "<p><strong>🔍 Найдено товаров: " . count($results) . "</strong></p>";
                    
                    foreach ($results as $product) {
                        echo '<div class="product-card">';
                        echo '<div class="product-name">' . htmlspecialchars($product['name']) . '</div>';
                        echo '<div class="product-price">💰 ' . $product['price'] . '</div>';
                        echo '<div class="product-desc">📦 ' . htmlspecialchars($product['desc']) . '</div>';
                        echo '<a href="' . $product['page'] . '" class="product-link">Подробнее →</a>';
                        echo '</div>';
                    }
                } else {
                    echo '<div class="error-box">
                            <h3 style="color: #ff69b4;">😕 Ничего не найдено</h3>
                            <p>Товары на букву <strong>"' . $letter . '"</strong> не найдены.</p>
                            <p>Попробуйте другие буквы: <strong>К, Р, Н, Т, Б, Г</strong></p>
                            <a href="search_form.php" class="back-link">← Вернуться к поиску</a>
                          </div>';
                }
            }
            ?>
            
            <div style="margin-top: 30px;">
                <a href="search_form.php" class="back-link">🔍 Новый поиск</a>
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