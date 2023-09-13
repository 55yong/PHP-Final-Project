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
    <link rel="stylesheet" type="text/css" href="./css/member.css">
    <script>
        function inputCheck() {
            // 아이디 입력 확인
            if (!document.getElementById("uid").value) {
                alert("아이디를 입력하세요!");
                document.getElementById("uid").focus();
                return;
            }
            // 비밀번호 확인
            if (document.getElementById("pass01").value !== document.getElementById("pass02").value) {
                alert("비밀번호를 확인하세요!");
                document.getElementById("pass01").focus();
                return;
            }
            // 이름 확인
            if (!document.getElementById("uname").value) {
                alert("이름을 입력하세요!");
                document.getElementById("uname").focus();
                return;
            }
            // 다 확인 후 submit
            document.getElementById("uid").disabled = false;
            document.getElementById("inputForm").submit();
        }

        function idCheck() {
            uid = document.getElementById("uid").value;
            if (uid) {
                url = "member_id_check_action.php?uid=" + uid;
                window.open(url, "check_action", "width=400, height=200");
            } else {
                alert("아이디를 입력하세요");
            }
        }

        function decide() {
            document.inputForm.uid.disabled = true;
            document.inputForm.join.disabled = false;
        }

        function rewrite() {
            document.inputForm.uid.value = "";
            document.inputForm.uid.focus();
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
        <div id="main_content">
            <div id="join_box">
                <form action="member_regist_action.php" method="post" name="inputForm" id="inputForm">
                    <h2>회원가입</h2>
                    *표는 필수 입력란입니다.
                    <div class="form id">
                        <div class="col1">아이디 *</div>
                        <div class="col2"><input type="text" name="uid" id="uid" maxlength="15"></div>
                        <div class="col3">
                            <a href="#"><img src="./img/check_id.gif" onclick="idCheck()"></a>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">비밀번호 *</div>
                        <div class="col2"><input type="password" name="pass01" id="pass01" minlength="8" maxlength="15">
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">비밀번호 확인 * </div>
                        <div class="col2"><input type="password" name="pass02" id="pass02" minlength="8" maxlength="15">
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">이름 *</div>
                        <div class="col2"><input type="text" name="uname" id="uname" maxlength="5"></div>
                    </div>
                    <div class="clear"></div>

                    <div class="form">
                        <div class="col1">이메일</div>
                        <div class="col2"><input type="email" name="email1" maxlength="30">@<input type="email"
                                name="email2" maxlength="20"></div>
                    </div>
                    <div class="clear"></div>

                    <div class="bottom_line"></div>

                    <div class="buttons">
                        <input type="button" value="가입하기" onclick="javascript:inputCheck()" name="join" disabled=true>
                        <input type="reset" value="취소하기" onclick="javascript:history.go(-1)">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>