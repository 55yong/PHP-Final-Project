<?php

echo "<title> ID 확인 </title>";
$uid = $_GET["uid"];

$conn = mysqli_connect('localhost', 'admin', 'qkfkathfl1@', 'workspace');
$sql = "SELECT id FROM members WHERE id='$uid'";
$result = mysqli_fetch_array(mysqli_query($conn, $sql));
mysqli_close($conn);

if ($result) {
    echo "사용 불가능한 ID입니다." ?>
    <br>
    <input type="button" value="재입력" onclick="javascript:window.close(); javascript:window.opener.rewrite()">
    <?php
} else {
    echo "사용 가능한 ID입니다." ?>
    <br>
    <input type="button" value="확인" onclick="javascript:window.close(); javascript:window.opener.decide()">
    <input type="button" value="재입력" onclick="javascript:window.close(); javascript:window.opener.rewrite()">
<?php } ?>