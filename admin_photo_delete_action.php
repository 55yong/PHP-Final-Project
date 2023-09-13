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

if (isset($_POST["item"]))
    $num_item = count($_POST["item"]);
else
    echo "<script> alert('삭제할 게시글을 선택해주세요!'); javascript:history.go(-1); </script>";

$con = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");

for ($i = 0; $i < count($_POST["item"]); $i++) {
    $num = $_POST["item"][$i];

    $sql = "SELECT * FROM board_photo WHERE num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

    if ($copied_name) {
        $file_path = "./data/" . $copied_name;
        unlink($file_path);
    }

    $sql = "DELETE FROM board_photo WHERE num = $num";
    mysqli_query($con, $sql);
}

mysqli_close($con);

echo "<script> location.href = 'admin.php'; </script>";