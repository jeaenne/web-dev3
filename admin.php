<?php
include 'db_connect.php';

// Обработка добавления товара
if (isset($_POST['add_product'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $alias = $conn->real_escape_string($_POST['alias']);
    $short_desc = $conn->real_escape_string($_POST['short_description']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $image = $conn->real_escape_string($_POST['image']);
    $available = isset($_POST['available']) ? 1 : 0;
    
    $sql = "INSERT INTO product (manufacturer_id, name, alias, short_description, description, price, image, available, meta_keywords, meta_description, meta_title) 
            VALUES (1, '$name', '$alias', '$short_desc', '$desc', $price, '$image', $available, '$name', '$short_desc', '$name')";
    
    if ($conn->query($sql) === TRUE) {
        $success = "Товар добавлен!";
    } else {
        $error = "Ошибка: " . $conn->error;
    }
}

// Получаем список товаров
$products = $conn->query("SELECT * FROM product ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .admin-form {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
        }
        .admin-form input, .admin-form textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 2px solid #ffb6c1;
            border-radius: 5px;
        }
        .product-list {
            margin-top: 30px;
        }
        .product-item {
            background-color: #ffe4e1;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
        .btn {
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .success {
            background-color: #e8f5e9;
            color: #2e7d32;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
        .error {
            background-color: #ffebee;
            color: #c62828;
            padding: 10px;
            border-radius: 5px;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <div class="logo">🔥 Фаренгейт - Админ-панель</div>
    </div>

    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="admin.php">Админ</a>
    </div>
    <hr>

    <div class="content">
        <div class="main-content">
            <h1>Управление товарами</h1>
            <hr>

            <?php if (isset($success)): ?>
                <div class="success">✅ <?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error">❌ <?php echo $error; ?></div>
            <?php endif; ?>

            <!-- Форма добавления товара -->
            <div class="admin-form">
                <h2>➕ Добавить новый товар</h2>
                <form method="post">
                    <label>Название товара:</label>
                    <input type="text" name="name" required>
                    
                    <label>Алиас (для URL):</label>
                    <input type="text" name="alias" required>
                    
                    <label>Краткое описание:</label>
                    <textarea name="short_description" rows="2"></textarea>
                    
                    <label>Полное описание:</label>
                    <textarea name="description" rows="4"></textarea>
                    
                    <label>Цена (руб):</label>
                    <input type="number" step="0.01" name="price" required>
                    
                    <label>Имя файла изображения (например, boiler_small.jpg):</label>
                    <input type="text" name="image" required>
                    
                    <label>
                        <input type="checkbox" name="available" checked> Доступен на складе
                    </label>
                    
                    <button type="submit" name="add_product" class="btn">➕ Добавить товар</button>
                </form>
            </div>

            <!-- Список товаров -->
            <div class="product-list">
                <h2>📋 Существующие товары</h2>
                <?php while($row = $products->fetch_assoc()): ?>
                <div class="product-item">
    <strong><?php echo $row['id']; ?>.</strong> <?php echo $row['name']; ?>
    - 💰 <?php echo number_format($row['price'], 0, '', ' '); ?> руб.
    <a href="product.php?id=<?php echo $row['id']; ?>" style="color:#ff69b4; margin-left:15px;">Просмотр</a>
    <a href="edit_product.php?id=<?php echo $row['id']; ?>" style="color:#ff69b4; margin-left:15px;">✏ Редактировать</a>
</div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <hr>
    <div class="footer">
        <p>&copy; 2024 Фаренгейт. Все права защищены.</p>
    </div>
</div>

</body>
</html>