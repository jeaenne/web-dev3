<?php
include 'db_connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Получаем данные товара
$sql = "SELECT * FROM product WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
    header('Location: admin.php');
    exit;
}

// Обработка сохранения изменений
if (isset($_POST['update_product'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $short_desc = $conn->real_escape_string($_POST['short_description']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = floatval($_POST['price']);
    $image = $conn->real_escape_string($_POST['image']);
    $available = isset($_POST['available']) ? 1 : 0;
    
    $sql = "UPDATE product SET 
            name = '$name',
            short_description = '$short_desc',
            description = '$desc',
            price = $price,
            image = '$image',
            available = $available
            WHERE id = $id";
    
    if ($conn->query($sql)) {
        $success = "Товар обновлён!";
        // Обновляем данные в $product
        $result = $conn->query("SELECT * FROM product WHERE id = $id");
        $product = $result->fetch_assoc();
    } else {
        $error = "Ошибка: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование товара - Фаренгейт</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .edit-form {
            background-color: #fff0f5;
            border: 3px solid #ffb6c1;
            border-radius: 20px;
            padding: 30px;
            margin: 20px 0;
        }
        .edit-form input, .edit-form textarea {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 2px solid #ffb6c1;
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
        <div class="logo">🔥 Фаренгейт - Редактирование</div>
    </div>

    <div class="navbar">
        <a href="index.php">Главная</a>
        <a href="catalog.php">Каталог</a>
        <a href="admin.php">Админ</a>
    </div>
    <hr>

    <div class="content">
        <div class="main-content">
            <h1>Редактирование товара</h1>
            <hr>

            <?php if (isset($success)): ?>
                <div class="success">✅ <?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="error">❌ <?php echo $error; ?></div>
            <?php endif; ?>

            <div class="edit-form">
                <form method="post">
                    <label>Название товара:</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    
                    <label>Краткое описание:</label>
                    <textarea name="short_description" rows="2"><?php echo htmlspecialchars($product['short_description']); ?></textarea>
                    
                    <label>Полное описание:</label>
                    <textarea name="description" rows="4"><?php echo htmlspecialchars($product['description']); ?></textarea>
                    
                    <label>Цена (руб):</label>
                    <input type="number" step="0.01" name="price" value="<?php echo $product['price']; ?>" required>
                    
                    <label>Имя файла изображения:</label>
                    <input type="text" name="image" value="<?php echo htmlspecialchars($product['image']); ?>" required>
                    
                    <label>
                        <input type="checkbox" name="available" <?php echo $product['available'] ? 'checked' : ''; ?>> Доступен на складе
                    </label>
                    
                    <button type="submit" name="update_product" class="btn">💾 Сохранить изменения</button>
                    <a href="admin.php" class="btn" style="background:#ccc; color:#333; text-decoration:none; margin-left:10px;">Отмена</a>
                </form>
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