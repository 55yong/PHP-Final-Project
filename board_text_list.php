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
            <h3>
                정보 공유 게시판 > 목록보기
            </h3>
            <ul id="board_list">
                <li>
                    <form action="board_text_list.php" method="get">
                        <select name="sort" class="sel1">
                            <option value="01">시간순</option>
                            <option value="02">추천순</option>
                        </select>
                        <input type="submit" class="sel2" value="정렬">
                    </form>
                </li>
                <li>
                    <span class="col1">번호</span>
                    <span class="col2">제목</span>
                    <span class="col3">글쓴이</span>
                    <span class="col4">첨부</span>
                    <span class="col5">등록일</span>
                    <span class="col6">추천</span>
                </li>
                <?php
                if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;

                if (isset($_GET["sort"]))
                    $sort = $_GET["sort"];
                else
                    $sort = "01";

                $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");

                if ($sort == "01")
                    $sql = "SELECT * FROM board ORDER BY num DESC";
                else
                    $sql = "SELECT * FROM board ORDER BY good DESC, num DESC";

                $result = mysqli_query($conn, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글 수
                
                $scale = 10;

                // 전체 페이지 수($total_page) 계산 
                if ($total_record % $scale == 0)
                    $total_page = $total_record / $scale;
                else
                    $total_page = floor($total_record / $scale) + 1;

                // 표시할 페이지($page)에 따라 $start 계산  
                $start = ($page - 1) * $scale;

                $number = $total_record - $start;

                for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    // 가져올 레코드로 위치(포인터) 이동
                    $row = mysqli_fetch_array($result);
                    // 하나의 레코드 가져오기
                    $num = $row["num"];
                    $id = $row["id"];
                    $name = $row["name"];
                    $subject = $row["subject"];
                    $regist_day = $row["regist_day"];
                    $good = $row["good"];
                    if ($row["file_name"])
                        $file_image = "<img src='./img/file.gif'>";
                    else
                        $file_image = " ";
                    ?>
                    <li>
                        <span class="col1">
                            <?= $num ?>
                        </span>
                        <span class="col2"><a href="board_text_view.php?num=<?= $num ?>&page=<?= $page ?>"><?= $subject ?></a></span>
                        <span class="col3">
                            <?= $name ?>
                        </span>
                        <span class="col4">
                            <?= $file_image ?>
                        </span>
                        <span class="col5">
                            <?= $regist_day ?>
                        </span>
                        <span class="col6">
                            <?= $good ?>
                        </span>
                    </li>
                    <?php
                    $number--;
                }
                mysqli_close($conn);

                ?>
            </ul>
            <ul id="page_num">
                <?php
                if ($total_page >= 2 && $page >= 2) {
                    $new_page = $page - 1;
                    echo "<li><a href='board_text_list.php?sort=$sort&page=$new_page'>◀ 이전</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";

                // 게시판 목록 하단에 페이지 링크 번호 출력
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page == $i) // 현재 페이지 번호 링크 안함
                    {
                        echo "<li><b> $i </b></li>";
                    } else {
                        echo "<li><a href='board_text_list.php?sort=$sort&page=$i'> $i </a><li>";
                    }
                }
                if ($total_page >= 2 && $page != $total_page) {
                    $new_page = $page + 1;
                    echo "<li> <a href='board_text_list.php?sort=$sort&page=$new_page'>다음 ▶</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";
                ?>
            </ul> <!-- page -->
            <ul class="buttons">
                <li><button onclick="location.href='board_text_list.php'">목록</button></li>
                <li>
                    <?php
                    if ($uid) {
                        ?>
                        <button onclick="location.href='board_text.php'">글쓰기</button>
                        <?php
                    } else {
                        ?>
                        <a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </div> <!-- board_box -->
    </section>
    <footer>
        <?php include "footer.php"; ?>
    </footer>
</body>

</html>