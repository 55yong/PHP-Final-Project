<?php
session_start();
if (isset($_SESSION["num"]))
    $unum = $_SESSION["num"];
else
    $unum = "";
if (isset($_SESSION["id"]))
    $uid = $_SESSION["id"];
else
    $uid = "";
if (isset($_SESSION["name"]))
    $name = $_SESSION["name"];
else
    $name = "";
?>
<div id="top">
    <a href="index.php">
        <h3>
            Pixel Place
        </h3>
        <h4>
            국내 최대 카메라 커뮤니티 사이트
        </h4>
    </a>
    <ul id="top_menu">
        <?php
        if (!$uid) {
            ?>
            <li><a href="member_regist.php">회원 가입</a> </li>
            <li> | </li>
            <li><a href="member_login.php">로그인</a></li>
            <?php
        } else {
            $logged = "반갑습니다,<b> " . $name . "(" . $uid . ")</b>님!";
            ?>
            <li>
                <?= $logged ?>
            </li>
            <li> | </li>
            <li><a href="member_logout_action.php">로그아웃</a> </li>
            <li> | </li>
            <li><a href="member_change.php">정보 수정</a></li>
            <li> | </li>
            <li><a href="member_expire.php">회원 탈퇴</a></li>
            <?php
        }
        if ($unum == 1) {
            ?>
            <li> | </li>
            <li><a href="admin.php">관리자 모드</a></li>
            <?php
        }
        ?>
    </ul>
</div>
<div id="menu_bar">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="chatting.php">실시간 채팅</a></li>
        <li><a href="board_text_list.php">정보 공유 게시판</a></li>
        <li><a href="board_photo_list.php">사진 갤러리</a></li>
    </ul>
</div>