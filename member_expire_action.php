<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["pass"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION["id"];
    $pass = $_SESSION["pass"];

    $conn = mysqli_connect('localhost', 'admin', 'qkfkathfl1@', 'workspace');
    $sql = "DELETE FROM members WHERE id='$id' AND $pass='$pass'";

    if (mysqli_query($conn, $sql)) {
        unset($_SESSION["num"]);
        unset($_SESSION["id"]);
        unset($_SESSION["pass"]);
        unset($_SESSION["name"]);

        mysqli_close($conn);
        echo "<script> javascript: alert('회원 탈퇴 되었습니다.'); javascript: location.href = 'index.php'; </script>";
    }
} else {
    mysqli_close($conn);
    echo "<script> javascript: alert('잘못된 접근입니다!'); javascript: location.href = 'index.php'</script>";

}