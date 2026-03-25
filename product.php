<?php
include 'db_connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM product WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

if (!$product) {
    header('Location: catalog.php');
    exit;
}

$props_sql = "SELECT * FROM product_properties WHERE product_id = $id";
$props_result = $conn->query($props_sql);
?>
<?php include 'header.php'; ?>

<div class="content">
    <div class="sidebar">
        <h3 style="margin-top:0; text-align:center;">🔥 Категории</h3>
        <a href="#">Котлы газовые</a>
        <a href="#">Котлы электрические</a>
        <a href="#">Радиаторы</a>
        <a href="#">Трубы и фитинги</a>
        <a href="#">Насосы</a>
        <a href="#">Системы отопления</a>
        <a href="#">Водоснабжение</a>
        <a href="#">Запорная арматура</a>
    </div>

    <div class="main-content">
        <div style="background:#fff0f5; border:3px solid #ffb6c1; border-radius:20px; padding:30px; margin:20px 0;">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <hr>

            <div style="display:flex; gap:30px; margin-bottom:30px;">
                <div style="flex:1; text-align:center;">
                    <a href="images/<?php echo $product['image']; ?>" target="_blank">
                        <img src="images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="max-width:100%; border:3px solid #ffb6c1; border-radius:15px;">
                    </a>
                    <p><a href="images/<?php echo $product['image']; ?>" target="_blank" style="color:#ff69b4;">🔍 Открыть в полном размере</a></p>
                </div>
                <div style="flex:1;">
                    <div style="font-size:28px; font-weight:bold; color:#ff69b4;">💰 <?php echo number_format($product['price'], 0, '', ' '); ?> руб.</div>
                    <div style="color:#707070; font-size:14px; font-style:italic; line-height:16px; margin:15px 0;">
                        <strong>Краткое описание:</strong><br>
                        <?php echo htmlspecialchars($product['short_description']); ?>
                    </div>
                </div>
            </div>

            <div style="background:#ffe4e1; padding:20px; border-radius:15px; margin:20px 0;">
                <h2>Характеристики товара</h2>
                <ul style="list-style-image: url('images/marker.png');">
                    <?php while($prop = $props_result->fetch_assoc()): ?>
                    <li><strong><?php echo htmlspecialchars($prop['property_name']); ?>:</strong> <?php echo htmlspecialchars($prop['property_value']); ?></li>
                    <?php endwhile; ?>
                </ul>
            </div>

            <h2>Подробное описание товара</h2>
            <div style="color:#484343; font-size:16px; line-height:24px;">
                <?php echo nl2br(htmlspecialchars($product['description'])); ?>
            </div>

            <a href="catalog.php" style="display:inline-block; margin-top:20px; color:#ff69b4;">← Вернуться в каталог</a>
        </div>
    </div>

    <div class="right-banners">
        <div>Акция на котлы!</div>
        <div>Бесплатная доставка</div>
        <div>Теплые полы</div>
    </div>
</div>

<?php include 'footer.php'; ?>