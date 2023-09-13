<meta charset="utf-8">
<?php
date_default_timezone_set('Asia/Seoul');
session_start();
if (isset($_SESSION["id"]))
    $uid = $_SESSION["id"];
else
    $uid = "";
if (isset($_SESSION["name"]))
    $name = $_SESSION["name"];
else
    $name = "";

if (!$uid) {
    echo "<script> alert('게시판 글쓰기는 로그인 후 이용해 주세요!'); location:history.go(-1); </script>";
    exit;
}

$subject = $_POST["subject"];
$content = $_POST["content"];

$subject = htmlspecialchars($subject, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);

$regist_day = date("Y-m-d (H:i)"); // 현재의 '년-월-일-시-분'을 저장

$upload_dir = './data/';

$upfile_name = $_FILES["upfile"]["name"];
$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
$upfile_type = $_FILES["upfile"]["type"];
$upfile_size = $_FILES["upfile"]["size"];
$upfile_error = $_FILES["upfile"]["error"];

if ($upfile_name && !$upfile_error) {
    $file = explode(".", $upfile_name);
    $file_name = $file[0];
    $file_ext = $file[1];

    $new_file_name = date("Y_m_d_H_i_s");
    $copied_file_name = $new_file_name . "." . $file_ext;
    $uploaded_file = $upload_dir . $copied_file_name;

    if ($upfile_size > 1000000) {
        echo "<script> alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! '); javascript:history.go(-1); </script>";
        exit;
    }

    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
        echo "<script> alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.'); javascript:history.go(-1); </script>";
        exit;
    }
} else {
    $upfile_name = "";
    $upfile_type = "";
    $copied_file_name = "";
}

$conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");

$sql = "INSERT INTO board (id, name, subject, content, regist_day, good,  file_name, file_type, file_copied) VALUES ('$uid', '$name', '$subject', '$content', '$regist_day', 0, '$upfile_name', '$upfile_type', '$copied_file_name')";
mysqli_query($conn, $sql); // $sql 에 저장된 명령 실행
mysqli_close($conn); // DB 연결 끊기

echo "<script> location.href = 'board_text_list.php'; </script>";
?>