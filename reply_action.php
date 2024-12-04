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
    echo "<script> alert('댓글 작성은 로그인 후 가능합니다!'); location:history.go(-1); </script>";
    exit;
}

$num = $_POST["num"];
$board_type = $_POST["board_type"];
$content = $_POST["content"];
$content = htmlspecialchars($content);
$regist_day = date("Y-m-d (H:i)");


$conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");

$sql = "INSERT INTO reply (num, board_type, id, name, content, regist_day) VALUES ($num, '$board_type', '$uid', '$name', '$content', '$regist_day')";

mysqli_query($conn, $sql);
mysqli_close($conn);

echo "<script> history.go(-1); </script>";
