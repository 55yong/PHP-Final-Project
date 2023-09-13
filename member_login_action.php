<?php
session_start();
if (isset($_POST["uid"]) && isset($_POST["pass"])) {
    $uid = $_POST["uid"];
    $pass = $_POST["pass"];

    $conn = mysqli_connect('localhost', 'admin', 'qkfkathfl1@', 'workspace');
    $sql = "SELECT * FROM members WHERE id='$uid' AND pass='$pass'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    mysqli_close($conn);

    if (mysqli_num_rows($result) == 0) {
        echo "<script> javascript:alert('ID 또는 비밀번호를 잘못 입력하셨습니다...'); javascript:location.href = 'member_login.php'; </script>";
    } else {
        $_SESSION["num"] = $row["num"];
        $_SESSION["id"] = $row["id"];
        $_SESSION["pass"] = $row["pass"];
        $_SESSION["name"] = $row["name"];
        echo "<script> javascript:alert('로그인 성공!'); javascript:location.href='index.php'; </script>";
    }
} else {
    echo "<script> javascript:alert('잘못된 접근입니다!'); javascript:location.href = 'index.php'</script>";
}