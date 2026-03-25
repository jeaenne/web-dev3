<?php
include 'db_connect.php';

$search_query = isset($_GET['query']) ? trim($_GET['query']) : '';
$results = [];

if (!empty($search_query)) {
    $search = $conn->real_escape_string($search_query);
    $sql = "SELECT * FROM product WHERE name LIKE '%$search%' OR short_description LIKE '%$search%' AND available = 1";
    $results = $conn->query($sql);
}
?>
<?php include 'header.php'; ?>

<div class="content">
    <div class="main-content">
        <h1>Поиск товаров</h1>
        <hr>

        <div style="background:#fff0f5; border:3px solid #ffb6c1; border-radius:20px; padding:30px; margin:20px 0; text-align:center;">
            <form method="get">
                <input type="text" name="query" placeholder="Введите название товара..." value="<?php echo htmlspecialchars($search_query); ?>" style="width:70%; padding:12px; font-size:16px; border:2px solid #ffb6c1; border-radius:8px;">
                <button type="submit" style="background:#ff69b4; color:white; padding:12px 25px; border:none; border-radius:8px; cursor:pointer;">🔍 Найти</button>
            </form>
        </div>

        <?php if (!empty($search_query)): ?>
            <h2>Результаты поиска по запросу: "<?php echo htmlspecialchars($search_query); ?>"</h2>
            <?php if ($results->num_rows > 0): ?>
                <?php while($row = $results->fetch_assoc()): ?>
                <div style="border:2px solid #ffb6c1; border-radius:15px; padding:20px; margin:20px 0; display:flex; gap:20px;">
                    <img src="images/<?php echo $row['image']; ?>" style="width:100px; height:100px; object-fit:cover; border-radius:10px;">
                    <div>
                        <div style="font-size:18px; font-weight:bold; color:#ff69b4;"><?php echo htmlspecialchars($row['name']); ?></div>
                        <p><?php echo htmlspecialchars($row['short_description']); ?></p>
                        <strong>💰 <?php echo number_format($row['price'], 0, '', ' '); ?> руб.</strong><br>
                        <a href="product.php?id=<?php echo $row['id']; ?>" style="color:#ff69b4;">Подробнее →</a>
                    </div>
                </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>😕 Товары не найдены. Попробуйте другой запрос.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="right-banners">
        <div>Акция на котлы!</div>
        <div>Бесплатная доставка</div>
        <div>Теплые полы</div>
    </div>
</div>

<?php include 'footer.php'; ?>