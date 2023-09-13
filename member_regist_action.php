<?php
date_default_timezone_set('Asia/Seoul');
$br = "<br>";
$date = date("Y-m-d H:i:s");

if (($_SERVER["REQUEST_METHOD"] == "POST") && isset($_POST["uid"]) && isset($_POST["pass01"]) && isset($_POST["uname"])) {
    $uid = $_POST["uid"];
    $pass = $_POST["pass01"];
    $uname = $_POST["uname"];
    $email = $_POST["email1"] . "@" . $_POST["email2"];
    $regist_day = $date;

    $con = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
    $sql = "INSERT INTO members(id, pass, name, email, regist_day) VALUES ('$uid', '$pass', '$uname', '$email', '$regist_day')";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "<script> javascript:alert('회원가입 성공!'); javascript:location.href = 'index.php'; </script>";
} else {
    echo "<script> javascript:alert('잘못된 접근입니다!'); javascript:location.href = 'index.php'</script>";
}