<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta property="og:title" content="Pixel Place" />
    <meta property="og:description" content="국내 최대 카메라 커뮤니티 사이트" />
    <meta property="og:image" content="{{ url_for('img', filename='main_img.png') }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pixel Place</title>
    <link rel="icon" href="./img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="login_box">
            <div id="login_title">
                <h2>회원 탈퇴 확인</h2>
            </div>
            <form action="member_expire_action.php" method="post" name="loginBeforeForm" id="login_form">
                <p>정말 회원 탈퇴 하시겠습니까?</p>
                <div>
                    <input class="btn" type="submit" value="예">
                    <input class="btn" type="button" onclick="javascript:history.go(-1)" value="아니요">
                </div>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>