<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фаренгейт - История компании</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .history-timeline {
            position: relative;
            padding: 20px 0;
        }
        
        .timeline-year {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            display: inline-block;
            font-weight: bold;
            margin-bottom: 20px;
        }
        
        .timeline-item {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.1);
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -10px;
            top: 20px;
            width: 20px;
            height: 20px;
            background-color: #ff69b4;
            border-radius: 50%;
        }
        
        .timeline-item h3 {
            color: #ff69b4;
            margin-top: 0;
        }
        
        .founder-quote {
            background-color: #ffe4e1;
            padding: 25px;
            border-radius: 15px;
            font-style: italic;
            border-left: 5px solid #ff69b4;
            margin: 30px 0;
        }
        
        .stats-grid {
            display: flex;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .stat-card {
            flex: 1;
            min-width: 150px;
            background: linear-gradient(135deg, #ffb6c1, #ff69b4);
            color: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 36px;
            font-weight: bold;
        }
        
        .stat-label {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .milestone {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        
        .milestone-year {
            font-size: 24px;
            font-weight: bold;
            color: #ff69b4;
            min-width: 100px;
        }
        
        .milestone-desc {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            flex: 1;
        }
        
        /* Новые стили для разделов */
        .info-section {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 30px;
            margin: 40px 0;
            scroll-margin-top: 100px;
        }
        
        .info-section h2 {
            color: #ff69b4;
            border-bottom: 2px solid #ffb6c1;
            padding-bottom: 10px;
            margin-top: 0;
        }
        
        .values-grid {
            display: flex;
            gap: 20px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .value-card {
            flex: 1;
            min-width: 200px;
            background: white;
            padding: 25px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.1);
            border: 2px solid #ffb6c1;
        }
        
        .value-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        
        .value-title {
            font-size: 20px;
            font-weight: bold;
            color: #ff69b4;
            margin-bottom: 10px;
        }
        
        .awards-grid {
            display: flex;
            gap: 25px;
            margin: 30px 0;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .award-card {
            width: 200px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 3px solid #ffb6c1;
        }
        
        .award-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }
        
        .award-year {
            background-color: #ff69b4;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            display: inline-block;
            margin: 10px 0;
        }
        
        .partners-grid {
            display: flex;
            gap: 30px;
            margin: 30px 0;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .partner-card {
            width: 180px;
            background: white;
            padding: 25px 15px;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #ffb6c1;
            transition: all 0.3s;
        }
        
        .partner-card:hover {
            border-color: #ff69b4;
            transform: scale(1.05);
        }
        
        .partner-logo {
            font-size: 40px;
            margin-bottom: 15px;
        }
        
        .page-navigation {
            background-color: #fff0f5;
            border: 2px solid #ffb6c1;
            border-radius: 50px;
            padding: 15px 25px;
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 30px;
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
        
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #ff69b4;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
            transition: all 0.3s;
            border: 2px solid white;
            z-index: 1000;
        }
        
        .back-to-top:hover {
            background-color: #ff1493;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
<!-- ЯКОРЬ ДЛЯ КНОПКИ НАВЕРХ -->
<div id="top"></div>

<div class="container">

    <!-- ШАПКА (HEADER) -->
    <div class="header">
        <div class="logo">
    <img src="images/main.jpg" alt="Фаренгейт" width="50" height="50" style="border-radius: 10px; margin-right: 10px;">
</div>
        <h1 class="company-name">Фаренгейт</h1>
        <div class="login-form">
            <input type="text" placeholder="логин">
            <input type="password" placeholder="пароль">
            <div>
                <button>войти</button>
                <a href="login.php">регистрация</a>
            </div>
        </div>
    </div>

    <!-- МЕНЮ САЙТА -->
    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="guestbook.php">Гостевая</a>
        <a href="search_form.php">Поиск</a>
        
    </div>
    <hr>

    <!-- ОСНОВНОЙ КОНТЕНТ (три колонки) -->
    <div class="content">
        <!-- Левая колонка (меню) -->
        <div class="sidebar">
            <h3 style="margin-top:0; text-align:center;">📖 О компании</h3>
            <a href="history.php" style="background-color:#ff69b4; color:white;">История фирмы</a>
            <a href="employees.php">Сотрудники</a>
            <a href="vacancies.php">Вакансии</a>
            
            <!-- НОВЫЕ ССЫЛКИ (теперь работают!) -->
            <hr>
            <h4 style="text-align:center; margin:10px 0;">Разделы:</h4>
            <a href="#mission">🎯 Миссия и ценности</a>
            <a href="#awards">🏆 Награды</a>
            <a href="#partners">🤝 Партнеры</a>
            <a href="#top" style="background-color:#ffe4e1;">↑ Наверх</a>
        </div>

        <!-- Центральная колонка (история) -->
        <div class="main-content">
            <!-- Верхняя навигация -->
            <div class="page-navigation">
                <a href="#mission">🎯 Миссия</a>
                <a href="#awards">🏆 Награды</a>
                <a href="#partners">🤝 Партнеры</a>
            </div>
            
            <h1>История компании «Фаренгейт»</h1>
            <hr>
            
            <div class="founder-quote">
                <p style="font-size:18px;">«Мы не просто продаем оборудование — мы создаем тепло и уют в каждом доме»</p>
                <p style="text-align:right; font-weight:bold;">— Иван Петров, основатель компании</p>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">15+</div>
                    <div class="stat-label">лет на рынке</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5000+</div>
                    <div class="stat-label">довольных клиентов</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">100+</div>
                    <div class="stat-label">сотрудников</div>
                </div>
            </div>
            
            <h2>Как всё начиналось</h2>
            <div class="history-timeline">
                
                <div class="timeline-item">
                    <span class="timeline-year">2009 год</span>
                    <h3>Основание компании</h3>
                    <p>Компания «Фаренгейт» была основана в Москве группой инженеров-теплотехников. Название выбрано в честь знаменитого физика Габриеля Фаренгейта, что символизирует связь с миром тепла и точных наук.</p>
                    <p>Первый офис располагался в небольшом помещении 20 м², а штат состоял всего из 3 человек.</p>
                </div>
                
                <div class="timeline-item">
                    <span class="timeline-year">2012 год</span>
                    <h3>Первый склад и расширение</h3>
                    <p>Открытие первого собственного склада в Москве. Компания начала сотрудничество с ведущими европейскими производителями: Protherm, Grundfos, Global.</p>
                </div>
                
                <div class="timeline-item">
                    <span class="timeline-year">2015 год</span>
                    <h3>Запуск интернет-магазина</h3>
                    <p>Мы первыми в нише запустили полноценный интернет-магазин с удобным каталогом и доставкой по всей России. Это позволило клиентам из регионов покупать качественное оборудование.</p>
                </div>
                
                <div class="timeline-item">
                    <span class="timeline-year">2018 год</span>
                    <h3>Открытие монтажной службы</h3>
                    <p>Теперь мы не только продаем оборудование, но и выполняем профессиональный монтаж «под ключ». В штат приняты квалифицированные монтажные бригады.</p>
                </div>
                
                <div class="timeline-item">
                    <span class="timeline-year">2021 год</span>
                    <h3>Новый логистический центр</h3>
                    <p>Открытие современного логистического комплекса площадью 2000 м². Это позволило увеличить скорость обработки заказов и расширить ассортимент до 5000 наименований.</p>
                </div>
                
                <div class="timeline-item">
                    <span class="timeline-year">2024 год</span>
                    <h3>Мы сегодня</h3>
                    <p>Сегодня «Фаренгейт» — это команда из 100+ профессионалов, 3 филиала в разных городах России и тысячи благодарных клиентов. Мы продолжаем расти и развиваться, внедряя новые технологии и расширяя ассортимент.</p>
                </div>
            </div>
            
            <!-- НОВЫЙ РАЗДЕЛ: МИССИЯ И ЦЕННОСТИ -->
            <div id="mission" class="info-section">
                <h2>🎯 Наша миссия и ценности</h2>
                
                <div style="background:white; padding:20px; border-radius:15px; margin-bottom:30px;">
                    <h3 style="color:#ff69b4;">Миссия компании</h3>
                    <p style="font-size:18px; font-style:italic;">«Обеспечивать комфорт и тепло в каждом доме, предлагая качественное инженерное оборудование и профессиональный сервис»</p>
                </div>
                
                <h3 style="color:#ff69b4;">Наши ценности:</h3>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">❤️</div>
                        <div class="value-title">Забота о клиентах</div>
                        <p>Каждый клиент для нас — это партнер. Мы слушаем, понимаем и предлагаем лучшие решения.</p>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-icon">⚡</div>
                        <div class="value-title">Качество</div>
                        <p>Мы работаем только с проверенными производителями и гарантируем надежность каждого товара.</p>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-icon">🤝</div>
                        <div class="value-title">Честность</div>
                        <p>Прозрачные цены, честные условия и открытость во всем — основа нашего бизнеса.</p>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-icon">📈</div>
                        <div class="value-title">Развитие</div>
                        <p>Мы постоянно учимся, внедряем новые технологии и растем вместе с нашими клиентами.</p>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-icon">🌱</div>
                        <div class="value-title">Экологичность</div>
                        <p>Мы заботимся об окружающей среде и предлагаем энергоэффективные решения.</p>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-icon">👥</div>
                        <div class="value-title">Команда</div>
                        <p>Наши сотрудники — главная ценность. Мы создаем условия для роста и развития.</p>
                    </div>
                </div>
            </div>
            
            <!-- НОВЫЙ РАЗДЕЛ: НАГРАДЫ -->
            <div id="awards" class="info-section">
                <h2>🏆 Наши награды и достижения</h2>
                
                <div class="awards-grid">
                    <div class="award-card">
                        <div class="award-icon">🏅</div>
                        <div class="award-year">2019</div>
                        <div style="font-weight:bold;">Лучший интернет-магазин</div>
                        <div style="font-size:14px; color:#666;">в номинации "Инженерное оборудование"</div>
                    </div>
                    
                    <div class="award-card">
                        <div class="award-icon">🌟</div>
                        <div class="award-year">2020</div>
                        <div style="font-weight:bold;">Официальный дилер Protherm</div>
                        <div style="font-size:14px; color:#666;">Статус "Платина"</div>
                    </div>
                    
                    <div class="award-card">
                        <div class="award-icon">⭐</div>
                        <div class="award-year">2021</div>
                        <div style="font-weight:bold;">1000+ отзывов</div>
                        <div style="font-size:14px; color:#666;">Рейтинг 4.9 на Яндекс.Картах</div>
                    </div>
                    
                    <div class="award-card">
                        <div class="award-icon">🏆</div>
                        <div class="award-year">2022</div>
                        <div style="font-weight:bold;">Лучший сервис</div>
                        <div style="font-size:14px; color:#666;">По версии портала "Теплый дом"</div>
                    </div>
                    
                    <div class="award-card">
                        <div class="award-icon">📦</div>
                        <div class="award-year">2023</div>
                        <div style="font-weight:bold;">Склад года</div>
                        <div style="font-size:14px; color:#666;">Лучшая логистика</div>
                    </div>
                    
                    <div class="award-card">
                        <div class="award-icon">💎</div>
                        <div class="award-year">2024</div>
                        <div style="font-weight:bold;">15 лет на рынке</div>
                        <div style="font-size:14px; color:#666;">Юбилей компании</div>
                    </div>
                </div>
                
                <div style="background:#ffe4e1; padding:20px; border-radius:15px; margin-top:20px;">
                    <p style="margin:0; text-align:center;">Мы гордимся каждым достижением и благодарим наших клиентов за доверие!</p>
                </div>
            </div>
            
            <!-- НОВЫЙ РАЗДЕЛ: ПАРТНЕРЫ -->
            <div id="partners" class="info-section">
                <h2>🤝 Наши партнеры</h2>
                
                <p>Мы сотрудничаем с ведущими мировыми производителями инженерного оборудования и локальными поставщиками.</p>
                
                <div class="partners-grid">
                    <div class="partner-card">
                        <div class="partner-logo">🇩🇪</div>
                        <div style="font-weight:bold;">Protherm</div>
                        <div style="font-size:12px; color:#666;">Германия</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇩🇰</div>
                        <div style="font-weight:bold;">Grundfos</div>
                        <div style="font-size:12px; color:#666;">Дания</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇮🇹</div>
                        <div style="font-weight:bold;">Global</div>
                        <div style="font-size:12px; color:#666;">Италия</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇨🇿</div>
                        <div style="font-weight:bold;">Drazice</div>
                        <div style="font-size:12px; color:#666;">Чехия</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇷🇺</div>
                        <div style="font-weight:bold;">Salus</div>
                        <div style="font-size:12px; color:#666;">Россия</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇨🇳</div>
                        <div style="font-weight:bold;">Haier</div>
                        <div style="font-size:12px; color:#666;">Китай</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇹🇷</div>
                        <div style="font-weight:bold;">DemirDöküm</div>
                        <div style="font-size:12px; color:#666;">Турция</div>
                    </div>
                    
                    <div class="partner-card">
                        <div class="partner-logo">🇫🇷</div>
                        <div style="font-weight:bold;">De Dietrich</div>
                        <div style="font-size:12px; color:#666;">Франция</div>
                    </div>
                </div>
                
                <div style="text-align:center; margin-top:30px;">
                    <button style="background:#ff69b4; color:white; border:none; padding:15px 30px; border-radius:30px; cursor:pointer;" onclick="alert('Спасибо за интерес к сотрудничеству! Мы свяжемся с вами.')">🤝 Стать партнером</button>
                </div>
            </div>
            
            <h2>Ключевые достижения</h2>
            <div style="background-color:#fff0f5; padding:20px; border-radius:15px;">
                <div class="milestone">
                    <div class="milestone-year">🏆 2019</div>
                    <div class="milestone-desc">Лучший интернет-магазин года в номинации «Инженерное оборудование»</div>
                </div>
                <div class="milestone">
                    <div class="milestone-year">🏅 2020</div>
                    <div class="milestone-desc">Официальный дилер Protherm (статус "Платина")</div>
                </div>
                <div class="milestone">
                    <div class="milestone-year">⭐ 2022</div>
                    <div class="milestone-desc">1000+ отзывов с рейтингом 4.9 на Яндекс.Картах</div>
                </div>
            </div>
        </div>

        <!-- Правая колонка (баннеры) -->
        <div class="right-banners">
            <h3 style="margin-top:0;">📅 Важные даты</h3>
            <div style="background:#ffb6c1;">
                <strong>2009</strong><br>Основание
            </div>
            <div style="background:#ff69b4; color:white;">
                <strong>2015</strong><br>Интернет-магазин
            </div>
            <div style="background:#ffe4e1;">
                <strong>2018</strong><br>Монтажная служба
            </div>
            <div style="background:#ffb6c1;">
                <strong>2024</strong><br>15 лет успеха
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

<!-- СКРИПТ ДЛЯ ПЛАВНОЙ ПРОКРУТКИ -->
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
</script>
</body>
</html>