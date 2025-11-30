<?php
// quantri.php
include 'flower.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Hoa Xuân Hè (CRUD)</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="admin-body">
    <div class="container">
        <h1 class="main-title">🛠️ QUẢN LÝ DANH SÁCH CÁC LOÀI HOA</h1>
        <a href="them_moi.php" class="btn btn-add">➕ Thêm Hoa Mới</a>
        <hr>

        <table class="flower-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Hoa</th>
                    <th>Mô Tả Tóm Tắt</th>
                    <th>Ảnh</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $hoa): ?>
                    <tr>
                        <td data-label="ID"><?php echo $hoa['id']; ?></td>
                        <td data-label="Tên Hoa" class="flower-name-cell"><?php echo $hoa['ten_hoa']; ?></td>
                        <td data-label="Mô Tả" class="description-cell">
                            <?php echo substr($hoa['mo_ta'], 0, 80) . '...';  ?>
                        </td>
                        <td data-label="Ảnh">
                            <img src="<?php echo $hoa['anh']; ?>" alt="Ảnh" class="thumb-img">
                        </td>
                        <td data-label="Thao Tác" class="actions-cell">
                            <a href="sua.php?id=<?php echo $hoa['id']; ?>" class="btn btn-edit">Sửa</a>
                            <a href="xoa.php?id=<?php echo $hoa['id']; ?>" class="btn btn-delete" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>