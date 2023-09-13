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

$conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
$check_sql = "SELECT id FROM board WHERE num=$num";
$check_result = mysqli_query($conn, $check_sql);
$check_row = mysqli_fetch_array($check_result);

if ($check_row["id"] == $_SESSION["id"]) {
    $sql = "SELECT * FROM board WHERE num = $num";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

    if ($copied_name) {
        $file_path = "./data/" . $copied_name;
        unlink($file_path);
    }

    $sql = "DELETE FROM board WHERE num = $num";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    echo "<script> location.href = 'board_text_list.php?page=$page'; </script>";
} else {
    echo "<script> alert('권한이 없습니다!'); location.href='javascript:history.go(-1)';</script>";
}