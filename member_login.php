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
    <script>
        function inputCheck() {
            // 아이디 입력 확인
            if (!document.getElementById("uid").value) {
                alert("아이디를 입력하세요!");
                document.getElementById("uid").focus();
                return;
            }
            // 비밀번호 확인
            if (!document.getElementById("pass").value) {
                alert("비밀번호를 입력하세요!");
                document.getElementById("pass").focus();
                return;
            }
            document.getElementById("login_form").submit();
        }
    </script>
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
                <h2>로그인</h2>
            </div>
            <form action="member_login_action.php" method="post" name="loginBeforeForm" id="login_form">
                <ul>
                    <li><input type="text" id="uid" name="uid" placeholder="ID"></li>
                    <li><input type="password" id="pass" name="pass" placeholder="Password" maxlength=15></li>
                </ul>
                <div id="login_btn">
                    <input type="button" value="로그인" onclick="javascript:inputCheck()">
                </div>
            </form>
        </div>
    </section>
    <footer>
        <?php include "footer.php" ?>
    </footer>
</body>

</html>