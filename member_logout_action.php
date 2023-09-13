<?php
session_start();
if (isset($_SESSION["num"]) && isset($_SESSION["id"]) && isset($_SESSION["name"])) {
    unset($_SESSION["num"]);
    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    echo "<script> javascript:location.href = 'index.php'; </script>";
} else {
    echo "<script> javascript:alert('잘못된 접근입니다!'); javascript:location.href = 'index.php'</script>";
}