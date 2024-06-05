<?php
// upload.php
// 我要修改文件
// 这个是master分支
// 我要创建第三个版本
// 检查是否有文件上传
if(isset($_FILES['fileToUpload'])) {
    $targetDirectory = "uploads/"; // 文件上传到的目录
    $targetFile =$targetDirectory . basename($_FILES['fileToUpload']['name']);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // 检查文件是否已经存在
    if (file_exists($targetFile)) {
        echo "很抱歉，文件已经存在。";
        $uploadOk = 0;
    }

    // 限制文件类型为 txt
    if($fileType != "txt") {
        echo "很抱歉，只能上传 TXT 文件。";
        $uploadOk = 0;
    }

    // 检查 $uploadOk 是否设置为 0 因文件问题
    if ($uploadOk == 0) {
        echo "很抱歉，你的文件没有上传。";
    // 如果一切正常，尝试上传文件
    } else {
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$targetFile)) {
            echo "文件 ". htmlspecialchars( basename( $_FILES['fileToUpload']['name'])). " 已上传。";
        } else {
            echo "很抱歉，上传文件时发生了错误。";
        }
    }
} else {
    echo "请选择一个文件进行上传。";
}
?>
