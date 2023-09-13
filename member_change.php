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
            // 비밀번호 확인
            if (document.getElementById("pass01").value !== document.getElementById("pass02").value) {
                alert("비밀번호를 확인하세요!");
                document.getElementById("pass01").focus();
                return;
            }
            // 이름 확인
            if (!document.getElementById("name").value) {
                alert("이름을 입력하세요!");
                document.getElementById("name").focus();
                return;
            }
            document.getElementById("inputForm").submit();
        }
    </script>
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <?php
    if (isset($_SESSION["id"])) {
        $uid = $_SESSION["id"];
        $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
        $sql = " SELECT * FROM members WHERE id='$uid'";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);

        $row = mysqli_fetch_array($result);
        $email = explode("@", $row["email"]);

        ?>
        <section>
            <div id="main_img_bar">
                <img src="./img/main_img.png">
            </div>
            <div id="main_content">
                <div id="join_box">
                    <form action="member_change_action.php" method="post" name="inputForm" id="inputForm">
                        <h2>회원정보 수정</h2>
                        <div class="form id">
                            <div class="col1">아이디 *</div>
                            <div class="col2">
                                <input type="text" name="uid" id="uid" value="<?= $uid ?>" disabled>
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">비밀번호 *</div>
                            <div class="col2">
                                <input type="password" name="pass01" id="pass01" value="<?= $row["pass"] ?>" minlength="8"
                                    maxlength="15">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">비밀번호 확인 *</div>
                            <div class="col2">
                                <input type="password" name="pass02" id="pass02" value="<?= $row["pass"] ?>" minlength="8"
                                    maxlength="15">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form">
                            <div class="col1">이름 *</div>
                            <div class="col2">
                                <input type="text" name="name" id="name" value="<?= $row["name"] ?>" maxlength="5">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="form input">
                            <div class="col1">이메일</div>
                            <div class="col2">
                                <input type="text" name="email1" value="<?= $email[0] ?>" maxlength="30">@<input type="text"
                                    name="email2" value="<?= $email[1] ?> " maxlength="20">
                            </div>
                        </div>
                        <div class="clear"></div>
                        <div class="bottom_line"></div>
                        <div class="buttons">
                            <input type="button" value="수정하기" onclick="javascript:inputCheck()">
                            <input type="reset" value="취소하기" onclick="javascript:history.go(-1)">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <footer>
            <?php include "footer.php" ?>
        </footer>
        <?php
    } else {
        echo "<script> javascript:alert('잘못된 접근입니다!'); javascript:location.href = 'index.php'</script>";
    }
    ?>
</body>

</html>