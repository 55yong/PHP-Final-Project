<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta property="og:title" content="Pixel Place" />
    <meta property="og:description" content="국내 최대 카메라 커뮤니티 사이트" />
    <meta property="og:image" content="{{ url_for('img', filename='main_img.png') }}" />
    <title>Pixel Place</title>
    <link rel="icon" href="./img/favicon.png">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
    <link rel="stylesheet" type="text/css" href="./css/board.css">
</head>

<body>
    <header>
        <?php include "header.php"; ?>
    </header>
    <section>
        <div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="board_box">
            <h3 class="title">
                사진 갤러리 > 내용보기
            </h3>
            <?php
            $num = $_GET["num"];
            $page = $_GET["page"];

            $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
            $sql = "SELECT * FROM board_photo WHERE num=$num";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $name = $row["name"];
            $regist_day = $row["regist_day"];
            $subject = $row["subject"];
            $content = $row["content"];
            $file_name = $row["file_name"];
            $file_type = $row["file_type"];
            $file_copied = $row["file_copied"];
            $good = $row["good"];
            $location = "./data/$file_copied";

            $content = str_replace(" ", "&nbsp;", $content);
            $content = str_replace("\n", "<br>", $content);

            mysqli_query($conn, $sql);
            ?>
            <ul id="view_content">
                <li>
                    <span class="col1"><b>제목 :</b>
                        <?= $subject ?>
                    </span>
                    <span class="col2">
                        <?= $name ?> |
                        <?= $regist_day ?> |
                        <?= "추천수 : " . $good ?>
                    </span>
                </li>
                <li>
                    <?php
                    if ($file_name) {
                        $real_name = $file_copied;
                        $file_path = "./data/" . $real_name;
                        $file_size = filesize($file_path);

                        echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
						<a href='$file_path'>[저장]</a><br><br>";
                    }
                    ?>
                    <img class="image" src="<?= $location ?>" alt="<?= $location ?>"> <br><br>
                    <?= $content ?>
                </li>
            </ul>
            <ul class="buttons">
                <li><button
                        onclick="location.href='board_photo_good_action.php?num=<?= $num ?>&page=<?= $page ?>'">추천</button>
                </li>
                <li><button onclick="location.href='board_photo_list.php?page=<?= $page ?>'">목록</button></li>
                <li><button
                        onclick="location.href='board_photo_change.php?num=<?= $num ?>&page=<?= $page ?>'">수정</button>
                </li>
                <li><button
                        onclick="location.href='board_photo_delete_action.php?num=<?= $num ?>&page=<?= $page ?>'">삭제</button>
                </li>
                <li><button onclick="location.href='board_photo.php'">글쓰기</button></li>
            </ul>
            <ul id="reply">
                <form action="reply_action.php" class="reply" name="reply" method="POST">
                    <input type="hidden" name="num" value="<?= $num ?>">
                    <input type="hidden" name="board_type" value="photo">
                    <input type="text" name="content" class="text" autocomplete=off />
                    <input type="submit" class="button" name="submit" value="댓글 작성" />
                </form>

                <?php
                $sql = "SELECT * FROM reply WHERE num=$num AND board_type='photo' ORDER BY regist_day";
                $result = mysqli_query($conn, $sql);
                $total_record = mysqli_num_rows($result);

                for ($i = 0; $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    $row = mysqli_fetch_array($result);
                    // 하나의 레코드 가져오기
                    $reply_num = $row["reply_num"];
                    $num = $row["num"];
                    $board_type = $row["board_type"];
                    $name = $row["name"];
                    $content = $row["content"];
                    $regist_day = $row["regist_day"];
                    ?>
                    <li id="show_reply">
                        <span class="col1">
                            <?= $name ?> :
                        </span>
                        <span class="col2">
                            <?= $content ?>
                        </span>
                        <span class="col3">
                            <?= $regist_day ?>
                        </span>
                        <input type="button" value="X"
                            onclick="javascript:location.href='reply_delete_action.php?id=<?= $uid ?>&reply_num=<?= $reply_num ?>';">
                    </li>
                <?php }
                ?>
            </ul>
        </div> <!-- board_box -->
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>