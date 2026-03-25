<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_feedback'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $gender = $conn->real_escape_string($_POST['gender'] ?? '');
    $rating = intval($_POST['rating']);
    $source = isset($_POST['source']) ? implode(", ", $_POST['source']) : '';
    $message = $conn->real_escape_string($_POST['message']);
    
    $sql = "INSERT INTO feedback (name, gender, rating, source, message) 
            VALUES ('$name', '$gender', $rating, '$source', '$message')";
    
    if ($conn->query($sql)) {
        $success = "Спасибо за отзыв!";
    } else {
        $error = "Ошибка: " . $conn->error;
    }
}

$feedbacks = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
?>
<?php include 'header.php'; ?>

<div class="content">
    <div class="main-content">
        <h1>Гостевая книга</h1>
        <hr>

        <div style="background:#fff0f5; border:3px solid #ffb6c1; border-radius:20px; padding:30px; margin:20px 0;">
            <h2 style="color:#ff69b4;">📝 Оставить отзыв</h2>
            <?php if (isset($success)): ?>
                <div style="background:#e8f5e9; color:#2e7d32; padding:10px; border-radius:5px;">✅ <?php echo $success; ?></div>
            <?php endif; ?>
            
            <form method="post">
                <div style="margin-bottom:15px;">
                    <input type="text" name="name" placeholder="Ваше имя" required style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px;">
                </div>
                <div style="margin-bottom:15px;">
                    <select name="gender" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px;">
                        <option value="">Пол</option>
                        <option value="Мужской">Мужской</option>
                        <option value="Женский">Женский</option>
                    </select>
                </div>
                <div style="margin-bottom:15px;">
                    <select name="rating" style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px;">
                        <option value="5">5 ★ Отлично</option>
                        <option value="4">4 ★ Хорошо</option>
                        <option value="3">3 ★ Нормально</option>
                        <option value="2">2 ★ Плохо</option>
                        <option value="1">1 ★ Ужасно</option>
                    </select>
                </div>
                <div style="margin-bottom:15px;">
                    <select name="source[]" size="3" multiple style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px;">
                        <option>Интернет</option>
                        <option>Друзья</option>
                        <option>Реклама</option>
                        <option>Соцсети</option>
                    </select>
                    <small>Зажмите Ctrl, чтобы выбрать несколько</small>
                </div>
                <div style="margin-bottom:15px;">
                    <textarea name="message" rows="5" placeholder="Ваш отзыв..." required style="width:100%; padding:10px; border:2px solid #ffb6c1; border-radius:5px;"></textarea>
                </div>
                <button type="submit" name="submit_feedback" style="background:#ff69b4; color:white; padding:10px 20px; border:none; border-radius:5px; cursor:pointer;">✉ Отправить</button>
            </form>
        </div>

        <div style="background:#fff0f5; border:3px solid #ffb6c1; border-radius:20px; padding:30px; margin:20px 0;">
            <h2>💬 Отзывы посетителей</h2>
            <?php if ($feedbacks->num_rows > 0): ?>
                <?php while($row = $feedbacks->fetch_assoc()): ?>
                <div style="background:#ffe4e1; padding:15px; margin:15px 0; border-radius:10px;">
                    <div style="font-weight:bold; color:#ff69b4;"><?php echo htmlspecialchars($row['name']); ?></div>
                    <div style="font-size:12px; color:#666;"><?php echo $row['created_at']; ?></div>
                    <div>⭐ Оценка: <?php echo $row['rating']; ?> / 5</div>
                    <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Пока нет отзывов. Будьте первым!</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="right-banners">
        <div>Акция на котлы!</div>
        <div>Бесплатная доставка</div>
        <div>Теплые полы</div>
    </div>
</div>

<?php include 'footer.php'; ?>