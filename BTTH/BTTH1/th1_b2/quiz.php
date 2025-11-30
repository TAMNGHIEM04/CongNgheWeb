<?php
// Tên tệp tin dữ liệu
$file_name = 'Quiz.txt';
$quiz_data = [];

// 1. Đọc nội dung tệp tin
if (file_exists($file_name)) {
    // Đọc toàn bộ nội dung tệp tin
    $file_content = file_get_contents($file_name);
    
    // Tách nội dung thành các khối câu hỏi, sử dụng hai ký tự xuống dòng (\n\n) làm dấu phân cách
    $question_blocks = preg_split("/\n\s*\n/", $file_content, -1, PREG_SPLIT_NO_EMPTY);

    // 2. Phân tích cú pháp từng khối câu hỏi
    foreach ($question_blocks as $block) {
        // Tách khối thành các dòng
        $lines = array_filter(explode("\n", trim($block)));
        
        if (count($lines) < 6) continue; // Bỏ qua nếu khối không đủ dữ liệu

        $question_text = array_shift($lines); // Dòng đầu tiên là câu hỏi
        $answer_line = array_pop($lines);     // Dòng cuối cùng là đáp án
        
        // Trích xuất đáp án đúng (ví dụ: "ANSWER: C" -> "C")
        $correct_answer = trim(str_replace('ANSWER:', '', $answer_line));
        
        $options = [];
        foreach ($lines as $line) {
            // Lấy ký tự đầu tiên (A, B, C, D)
            $option_key = substr(trim($line), 0, 1); 
            // Lấy nội dung đáp án (bỏ "A. ", "B. ", ...)
            $option_value = trim(substr(trim($line), 3)); 
            
            if (!empty($option_key) && strlen($option_key) == 1 && $option_key >= 'A' && $option_key <= 'D') {
                $options[$option_key] = $option_value;
            }
        }
        
        // Lưu trữ dữ liệu vào mảng chính
        $quiz_data[] = [
            'question' => $question_text,
            'options' => $options,
            'answer' => $correct_answer
        ];
    }
} else {
    $error_message = "Lỗi: Không tìm thấy tệp tin Quiz.txt.";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Thi Trắc Nghiệm Android</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h1 { color: #333; text-align: center; }
        .question-block { border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; border-radius: 5px; background-color: #fff; }
        .question-text { font-weight: bold; margin-bottom: 10px; color: #0056b3; }
        .option-label { display: block; margin-bottom: 5px; cursor: pointer; }
        .error { color: red; text-align: center; font-weight: bold; }
        input[type="radio"] { margin-right: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bài Thi Trắc Nghiệm </h1>
        
        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php elseif (empty($quiz_data)): ?>
            <p class="error">Không có câu hỏi nào được tải từ tệp tin.</p>
        <?php else: ?>
            <form action="submit_quiz.php" method="post">
                <?php $q_number = 1; ?>
                <?php foreach ($quiz_data as $quiz): ?>
                    <div class="question-block">
                        <p class="question-text">Câu <?php echo $q_number; ?>: <?php echo $quiz['question']; ?></p>
                        
                        <?php foreach ($quiz['options'] as $key => $value): ?>
                            <label class="option-label">
                                <input type="radio" name="q_<?php echo $q_number; ?>" value="<?php echo $key; ?>">
                                <b><?php echo $key; ?>.</b> <?php echo $value; ?>
                            </label>
                        <?php endforeach; ?>
                        
                        </div>
                    <?php $q_number++; ?>
                <?php endforeach; ?>
                
                <div style="text-align: center; margin-top: 20px;">
                    <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Nộp Bài</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>