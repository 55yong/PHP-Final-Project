<?php
session_start();
if (isset($_SESSION["num"]))
    $unum = $_SESSION["num"];
else
    $unum = "";

if ($unum != 1) {
    echo "<script> alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!'); javascript:history.go(-1); </script>";
    exit;
}

$num = $_GET["num"];

$con = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
$sql = "DELETE FROM members WHERE num = $num";
mysqli_query($con, $sql);

mysqli_close($con);

echo "<script> location.href ='admin.php'; </script>";