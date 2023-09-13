<?php
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
    echo "<script> alert('잘못된 접근입니다!'); javascript:history.go(-1); </script>";
    exit;
}

$num = $_GET["num"];
$page = $_GET["page"];

$subject = $_POST["subject"];
$content = $_POST["content"];

$con = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
$sql = "UPDATE board_photo SET subject='$subject', content='$content' WHERE num=$num";
mysqli_query($con, $sql);

mysqli_close($con);

echo "<script> location.href = 'board_photo_list.php?page=$page'; </script>";