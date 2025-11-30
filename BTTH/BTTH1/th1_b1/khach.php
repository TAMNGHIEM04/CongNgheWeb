<?php
// khach.php
include 'flower.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loài Hoa Tuyệt Đẹp Dịp Xuân Hè</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="main-title">🌸 14 LOÀI HOA TUYỆT ĐẸP THÍCH HỢP TRỒNG DỊP XUÂN HÈ</h1>
        <hr>

        <?php foreach ($flowers as $hoa): ?>
            <article class="flower-item">
                <h2 class="flower-name"><?php echo $hoa['id'] . '. ' . $hoa['ten_hoa']; ?></h2>
                <div class="image-wrapper">
                    <img src="<?php echo $hoa['anh']; ?>" alt="Hình ảnh <?php echo $hoa['ten_hoa']; ?>">
                </div>
                <p class="flower-description">
                    <?php echo $hoa['mo_ta']; ?>
                </p>
            </article>
        <?php endforeach; ?>

    </div>
</body>
</html>