<?php
if (!isset($_GET["id"]) && !isset($_GET["reply_num"])) {
    echo "<script> alert('권한이 없습니다!'); history.go(-1); </script>";
}

$id = $_GET["id"];
$reply_num = $_GET["reply_num"];
$conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
$sql = "SELECT id FROM reply WHERE reply_num=$reply_num";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if ($id == $row["id"]) {
    $sql = "DELETE FROM reply WHERE reply_num = $reply_num AND id = '$id'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "<script> alert('댓글 삭제!'); history.go(-1); </script>";
} else {
    mysqli_close($conn);
    echo "<script> alert('권한이 없습니다!'); history.go(-1); </script>";
}