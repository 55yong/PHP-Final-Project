<div id="main_img_bar">
    <img src="./img/main_img.png">
</div>
<div id="main_content">
    <div id="text_latest">
        <h4>정보 공유 게시판</h4>
        <ul>
            <?php
            $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
            $sql = "SELECT * FROM board ORDER BY num DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $regist_day = substr($row["regist_day"], 0, 10);
                ?>
                <li>
                    <span>
                        <?= $row["subject"] ?>
                    </span>
                    <span>
                        <?= $row["name"] ?>
                    </span>
                    <span>
                        <?= $regist_day ?>
                    </span>
                </li>
                <?php
            }
            ?>
    </div>
    <div id="photo_latest">
        <h4>사진 게시판</h4>
        <ul>
            <?php
            $conn = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
            $sql = "SELECT * FROM board_photo ORDER BY num DESC LIMIT 5";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_array($result)) {
                $regist_day = substr($row["regist_day"], 0, 10);
                ?>
                <li>
                    <span>
                        <?= $row["subject"] ?>
                    </span>
                    <span>
                        <?= $row["name"] ?>
                    </span>
                    <span>
                        <?= $regist_day ?>
                    </span>
                </li>
                <?php
            }
            mysqli_close($conn);
            ?>
    </div>

</div>