<?php
// display_csv.php

$file_name = 'accounts.csv';
$data = [];
$error = '';

if (($handle = fopen($file_name, "r")) !== FALSE) {
    $headers = fgetcsv($handle, 1000, ",");
    
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[] = $row;
    }
    
    fclose($handle);
    
} else {
    $error = "Lỗi: Không thể mở tệp tin '{$file_name}'. Vui lòng kiểm tra lại đường dẫn.";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển Thị Dữ Liệu CSV</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow-x: auto; }
        h1 { color: #5cb85c; text-align: center; }
        .data-table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .data-table th, .data-table td { border: 1px solid #ddd; padding: 10px; text-align: left; font-size: 0.9em; }
        .data-table th { background-color: #5cb85c; color: white; text-transform: uppercase; }
        .data-table tr:nth-child(even) { background-color: #f9f9f9; }
        .error { color: red; text-align: center; font-weight: bold; }
    </style>
</head>
<body>
    <div class="container">
        <h1>DỮ LIỆU</h1>
        
        <?php if ($error): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php elseif (empty($data)): ?>
            <p class="error">Tệp CSV không chứa dữ liệu (hoặc chỉ chứa tiêu đề).</p>
        <?php else: ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <?php 
                        // Hiển thị tiêu đề cột
                        foreach ($headers as $header) {
                            echo "<th>" . htmlspecialchars($header) . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Hiển thị dữ liệu
                    foreach ($data as $row) {
                        echo "<tr>";
                        foreach ($row as $cell) {
                            echo "<td>" . htmlspecialchars($cell) . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>