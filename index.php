<?php
$folder = 'uploads/';
$files = scandir($folder);
$count = 1;

foreach ($files as $file) {
    $filePath = $folder . $file;

    // تأكد أنه ملف وليس مجلد، وأنه صورة
    if (is_file($filePath) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $newName = 'pic_' . $count . '.' . $ext;
        $newPath = $folder . $newName;

        if (rename($filePath, $newPath)) {
            echo "✅ changed to : <b>$file</b> → <b>$newName</b><br>";
            $count++;
        } else {
            echo "❌ fail : <b>$file</b><br>";
        }
    }
}
?>
