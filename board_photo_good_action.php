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
$sql = "SELECT * FROM board_photo WHERE num = $num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

$good = $row["good"];
$new_good = $good + 1;

$sql = "UPDATE board_photo SET good=$new_good WHERE num=$num";
mysqli_query($conn, $sql);
mysqli_close($conn);

echo "<script> location.href = 'javascript:history.go(-1)'; </script>";