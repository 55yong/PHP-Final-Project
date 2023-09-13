<?php
session_start();

if (isset($_SESSION["id"]) && ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $uid = $_SESSION["id"];
    $pass = $_POST["pass01"];
    $name = $_POST["uname"];
    $email = $_POST["email1"] . "@" . $_POST["email2"];

    $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
    $sql = " UPDATE members SET pass = '$pass', name = '$name', email = '$email' WHERE id = '$uid'";
    mysqli_query($conn, $sql);
    mysqli_close($conn);

    unset($_SESSION["id"]);
    echo "<script> javascript:alert('변경 완료! 다시 로그인 해 주세요'); javascript:location.href = 'index.php'; </script>";
} else {
    echo "<script> javascript:alert('잘못된 접근입니다!'); javascript:location.href = 'index.php'</script>";
}