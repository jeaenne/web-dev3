<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Фаренгейт - Вакансии</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .vacancy-card {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        
        .vacancy-card:hover {
            border-color: #ff69b4;
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.2);
        }
        
        .vacancy-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ffb6c1;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        
        .vacancy-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        
        .vacancy-salary {
            background-color: #ff69b4;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            font-size: 18px;
        }
        
        .vacancy-tags {
            display: flex;
            gap: 10px;
            margin: 15px 0;
            flex-wrap: wrap;
        }
        
        .vacancy-tag {
            background-color: #ffe4e1;
            color: #ff69b4;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }
        
        .vacancy-section {
            margin: 20px 0;
        }
        
        .vacancy-section h4 {
            color: #ff69b4;
            margin-bottom: 10px;
        }
        
        .vacancy-section ul {
            list-style-type: square;
            color: #333;
        }
        
        .vacancy-section li {
            margin: 8px 0;
        }
        
        .apply-button {
            background-color: #ff69b4;
            color: white;
            border: none;
            padding: 15px 40px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s;
            border: 2px solid #ff1493;
            width: 100%;
        }
        
        .apply-button:hover {
            background-color: #ff1493;
            transform: scale(1.02);
        }
        
        .benefits-grid {
            display: flex;
            gap: 15px;
            margin: 30px 0;
            flex-wrap: wrap;
        }
        
        .benefit-item {
            flex: 1;
            min-width: 200px;
            background: linear-gradient(135deg, #fff0f5, #ffe4e1);
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            border: 2px solid #ffb6c1;
        }
        
        .benefit-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }
        
        /* Стили для информационных блоков */
        .info-section {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 30px;
            margin: 30px 0;
            scroll-margin-top: 100px;
        }
        
        .info-section h2 {
            color: #ff69b4;
            border-bottom: 2px solid #ffb6c1;
            padding-bottom: 10px;
        }
        
        .info-cards {
            display: flex;
            gap: 20px;
            margin-top: 20px;
            flex-wrap: wrap;
        }
        
        .info-card {
            flex: 1;
            min-width: 250px;
            background: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(255, 105, 180, 0.1);
        }
        
        .review-card {
            background: white;
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #ff69b4;
        }
        
        .review-author {
            font-weight: bold;
            color: #ff69b4;
        }
        
        .review-position {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }
        
        .review-stars {
            color: #ffb600;
            margin-bottom: 10px;
        }
        
        .review-text {
            font-style: italic;
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
<div class="container" id="top">

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
                <a href="login.html">регистрация</a>
            </div>
        </div>
    </div>

    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="contacts.php">Контакты</a>
        <a href="guestbook.php">Гостевая</a>
        <a href="search_form.php">Поиск</a>
        
    </div>
    <hr>

    <div class="content">
        <div class="sidebar">
            <h3 style="margin-top:0; text-align:center;">💼 Карьера</h3>
            <a href="history.php">История фирмы</a>
            <a href="employees.php">Сотрудники</a>
            <a href="vacancies.php" style="background-color:#ff69b4; color:white;">Вакансии</a>
            
            <!-- ВНУТРЕННЯЯ НАВИГАЦИЯ ПО СТРАНИЦЕ -->
            <hr>
            <h4 style="text-align:center; margin:10px 0;">На странице:</h4>
            <a href="#internship">📚 Стажировка</a>
            <a href="#conditions">🏖 Условия работы</a>
            <a href="#reviews">⭐ Отзывы сотрудников</a>
            <a href="#top" style="background-color:#ffe4e1;">↑ Наверх</a>
        </div>

        <div class="main-content">
            <!-- ВЕРХНЯЯ НАВИГАЦИЯ -->
            <div class="page-navigation">
                <a href="#internship">📚 Стажировка</a>
                <a href="#conditions">🏖 Условия работы</a>
                <a href="#reviews">⭐ Отзывы сотрудников</a>
            </div>
            
            <h1>Вакансии компании «Фаренгейт»</h1>
            <hr>
            
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">💰</div>
                    <div>Конкурентная зарплата</div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">🏖</div>
                    <div>Официальное трудоустройство</div>
                </div>
                <div class="benefit-item">
                    <div class="benefit-icon">📈</div>
                    <div>Карьерный рост</div>
                </div>
            </div>
            
            <!-- Вакансия 1 -->
            <div class="vacancy-card">
                <div class="vacancy-header">
                    <span class="vacancy-title">Менеджер по продажам</span>
                    <span class="vacancy-salary">от 80 000 ₽</span>
                </div>
                
                <div class="vacancy-tags">
                    <span class="vacancy-tag">Опыт от 1 года</span>
                    <span class="vacancy-tag">Полный день</span>
                    <span class="vacancy-tag">Москва</span>
                </div>
                
                <div class="vacancy-section">
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Консультирование клиентов по инженерному оборудованию</li>
                        <li>Оформление заказов и работа с документацией</li>
                        <li>Выполнение личного плана продаж</li>
                        <li>Ведение базы клиентов в CRM</li>
                    </ul>
                </div>
                
                <div class="vacancy-section">
                    <h4>Требования:</h4>
                    <ul>
                        <li>Опыт продаж (желательно в сфере сантехники/отопления)</li>
                        <li>Уверенный пользователь ПК</li>
                        <li>Грамотная устная и письменная речь</li>
                        <li>Желание зарабатывать и развиваться</li>
                    </ul>
                </div>
                
                <button class="apply-button" onclick="alert('Заявка отправлена! Мы свяжемся с вами.')">📩 Откликнуться</button>
            </div>
            
            <!-- Вакансия 2 -->
            <div class="vacancy-card">
                <div class="vacancy-header">
                    <span class="vacancy-title">Инженер-проектировщик</span>
                    <span class="vacancy-salary">от 100 000 ₽</span>
                </div>
                
                <div class="vacancy-tags">
                    <span class="vacancy-tag">Опыт от 3 лет</span>
                    <span class="vacancy-tag">Полный день</span>
                    <span class="vacancy-tag">Москва</span>
                </div>
                
                <div class="vacancy-section">
                    <h4>Обязанности:</h4>
                    <ul>
                        <li>Разработка проектов отопления и водоснабжения</li>
                        <li>Подбор оборудования под техническое задание</li>
                        <li>Выезд на объекты для замеров</li>
                        <li>Согласование проектов с заказчиками</li>
                    </ul>
                </div>
                
                <div class="vacancy-section">
                    <h4>Требования:</h4>
                    <ul>
                        <li>Высшее техническое образование</li>
                        <li>Знание AutoCAD, Revit</li>
                        <li>Понимание принципов работы инженерных систем</li>
                        <li>Опыт работы с нормативной документацией</li>
                    </ul>
                </div>
                
                <button class="apply-button" onclick="alert('Заявка отправлена! Мы свяжемся с вами.')">📩 Откликнуться</button>
            </div>
            
            <!-- РАЗДЕЛ СТАЖИРОВКА -->
            <div id="internship" class="info-section">
                <h2>📚 Программа стажировки</h2>
                <p>Мы предлагаем программу стажировки для студентов и выпускников без опыта работы. Вы получите реальный опыт в инженерной сфере и возможность дальнейшего трудоустройства.</p>
                
                <div class="info-cards">
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">🎓 Для кого</h3>
                        <ul>
                            <li>Студенты старших курсов технических вузов</li>
                            <li>Выпускники без опыта работы</li>
                            <li>Молодые специалисты до 25 лет</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">📋 Что вы получите</h3>
                        <ul>
                            <li>Оплачиваемая стажировка от 40 000 ₽</li>
                            <li>Наставник из числа опытных сотрудников</li>
                            <li>Обучение работе в профессиональных программах</li>
                            <li>Возможность трудоустройства после стажировки</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">⏱ Длительность</h3>
                        <ul>
                            <li>3 месяца (с возможностью продления)</li>
                            <li>Гибкий график (совмещение с учебой)</li>
                            <li>Занятость от 20 часов в неделю</li>
                        </ul>
                    </div>
                </div>
                
                <button style="background:#ff69b4; color:white; border:none; padding:15px 30px; border-radius:30px; margin-top:20px; cursor:pointer;" onclick="alert('Заявка на стажировку отправлена!')">📝 Подать заявку на стажировку</button>
            </div>
            
            <!-- РАЗДЕЛ УСЛОВИЯ РАБОТЫ -->
            <div id="conditions" class="info-section">
                <h2>🏖 Условия работы</h2>
                
                <div class="info-cards">
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">💰 Оплата</h3>
                        <ul>
                            <li>Конкурентная заработная плата (обсуждается на собеседовании)</li>
                            <li>Ежеквартальные премии по результатам работы</li>
                            <li>Годовые бонусы</li>
                            <li>Индексация зарплаты раз в год</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">🏢 Офис</h3>
                        <ul>
                            <li>Современный офис в центре Москвы (м. Строителей)</li>
                            <li>Гибридный формат работы (офис + удаленка)</li>
                            <li>Вкусные обеды за счет компании</li>
                            <li>Спортивный зал и зона отдыха</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">🎁 Соцпакет</h3>
                        <ul>
                            <li>ДМС со стоматологией</li>
                            <li>Оплата мобильной связи</li>
                            <li>Корпоративные скидки на продукцию</li>
                            <li>Английский язык за счет компании</li>
                        </ul>
                    </div>
                    
                    <div class="info-card">
                        <h3 style="color:#ff69b4;">⏰ График</h3>
                        <ul>
                            <li>5/2 с 10:00 до 19:00</li>
                            <li>Возможность гибкого начала дня</li>
                            <li>Оплачиваемый отпуск 28 дней</li>
                            <li>Больничные листы полностью оплачиваются</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- РАЗДЕЛ ОТЗЫВЫ СОТРУДНИКОВ -->
            <div id="reviews" class="info-section">
                <h2>⭐ Отзывы сотрудников</h2>
                
                <div class="review-card">
                    <div class="review-author">Алексей Петров</div>
                    <div class="review-position">Инженер-проектировщик, работает 3 года</div>
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">«Отличная компания для профессионального роста. Руководство всегда поддерживает инициативы, платят вовремя, коллектив дружный. Рад что пришел сюда!»</div>
                </div>
                
                <div class="review-card">
                    <div class="review-author">Мария Иванова</div>
                    <div class="review-position">Менеджер по продажам, работает 1.5 года</div>
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">«Пришла без опыта в сантехнике, научили всему с нуля. Сейчас вхожу в топ продаж. Зарплата достойная, плюс бонусы. Очень довольна!»</div>
                </div>
                
                <div class="review-card">
                    <div class="review-author">Дмитрий Соколов</div>
                    <div class="review-position">Бригадир монтажников, работает 5 лет</div>
                    <div class="review-stars">★★★★☆</div>
                    <div class="review-text">«Работаем качественно, заказов много. Инструмент и материалы предоставляют, зарплата сдельная - можно хорошо заработать. Рекомендую.»</div>
                </div>
                
                <div class="review-card">
                    <div class="review-author">Екатерина Волкова</div>
                    <div class="review-position">Специалист техподдержки, работает 2 года</div>
                    <div class="review-stars">★★★★★</div>
                    <div class="review-text">«Работаю удаленно, что очень удобно. Коллеги всегда на связи, помогают. Руководство адекватное. Отличное место работы!»</div>
                </div>
                
                <!-- Кнопка "Оставить отзыв" -->
                <div style="text-align:center; margin-top:30px;">
                    <button style="background:#ff69b4; color:white; border:none; padding:15px 30px; border-radius:30px; cursor:pointer;" onclick="alert('Спасибо за отзыв!')">✏ Оставить свой отзыв</button>
                </div>
            </div>
            
            <!-- Блок с резюме -->
            <div style="background-color:#ffe4e1; padding:30px; border-radius:20px; text-align:center; margin:30px 0;">
                <h3 style="color:#ff69b4;">Не нашли подходящую вакансию?</h3>
                <p>Отправьте нам свое резюме, и мы рассмотрим вас на другие позиции!</p>
                <button style="background:#ff69b4; color:white; border:none; padding:15px 30px; border-radius:30px; font-weight:bold; cursor:pointer;" onclick="alert('Форма отправки резюме')">📎 Отправить резюме</button>
            </div>
        </div>

        <div class="right-banners">
            <h3 style="margin-top:0;">🎯 Почему мы?</h3>
            <div style="background:#ffb6c1;">
                <strong>Стабильность</strong><br>15 лет на рынке
            </div>
            <div style="background:#ff69b4; color:white;">
                <strong>Рост</strong><br>Карьерные перспективы
            </div>
            <div style="background:#ffe4e1;">
                <strong>Коллектив</strong><br>Дружная команда
            </div>
            
        </div>
    </div>
    
    <!-- Кнопка "Наверх" -->
    <a href="#top" class="back-to-top" title="Наверх">↑</a>
    
    <hr>

    <div class="footer">
        <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
    </div>

</div>

<!-- Плавная прокрутка для всех якорей -->
<script>
    // Плавная прокрутка при клике на якорные ссылки
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const target = document.querySelector(this.getAttribute('href'));
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