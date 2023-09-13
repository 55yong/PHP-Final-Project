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
	<link rel="stylesheet" type="text/css" href="./css/admin.css">
</head>

<body>
	<header>
		<?php include "header.php"; ?>
	</header>
	<section>
		<?php

		if (isset($_SESSION["num"]))
			$unum = $_SESSION["num"];
		else
			$unum = "";

		if ($unum == 1) {
			?>
			<div id="admin_box">
				<h3 id="member_title">
					관리자 모드 > 회원 관리
				</h3>
				<ul id="member_list">
					<li>
						<span class="col1">번호</span>
						<span class="col2">아이디</span>
						<span class="col3">이름</span>
						<span class="col4"></span>
						<span class="col5"></span>
						<span class="col6">가입일</span>
						<span class="col7"></span>
						<span class="col8">삭제</span>
					</li>
					<?php
					$con = mysqli_connect("localhost", "admin", "qkfkathfl1@", "workspace");
					$sql = "SELECT * FROM members ORDER BY num DESC";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result); // 전체 회원 수
				
					$number = $total_record;

					while ($row = mysqli_fetch_array($result)) {
						$num = $row["num"];
						$id = $row["id"];
						$name = $row["name"];
						$regist_day = $row["regist_day"];
						?>

						<li>
							<form method="post" action="admin_member_update_action.php?num=<?= $num ?>">
								<span class="col1">
									<?= $num ?>
								</span>
								<span class="col2">
									<?= $id ?></a>
								</span>
								<span class="col3">
									<?= $name ?>
								</span>
								<span class="col4"></span>
								<span class="col5"></span>
								<span class="col6">
									<?= $regist_day ?>
								</span>
								<span class="col7"></span>
								<span class="col8"><button type="button"
										onclick="location.href='admin_member_delete_action.php?num=<?= $num ?>'">삭제</button></span>
							</form>
						</li>

						<?php
						$number--;
					}
					?>
				</ul>
				<h3 id="member_title">
					관리자 모드 > 정보 공유 게시판 관리
				</h3>
				<ul id="board_list">
					<li class="title">
						<span class="col1">선택</span>
						<span class="col2">번호</span>
						<span class="col3">이름</span>
						<span class="col4">제목</span>
						<span class="col5">첨부파일명</span>
						<span class="col6">작성일</span>
					</li>
					<form method="post" action="admin_text_delete_action.php">
						<?php
						$sql = "SELECT * FROM board ORDER BY num DESC";
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); // 전체 글의 수
					
						$number = $total_record;

						while ($row = mysqli_fetch_array($result)) {
							$num = $row["num"];
							$name = $row["name"];
							$subject = $row["subject"];
							$file_name = $row["file_name"];
							$regist_day = $row["regist_day"];
							$regist_day = substr($regist_day, 0, 10)
								?>
							<li>
								<span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
								<span class="col2">
									<?= $num ?>
								</span>
								<span class="col3">
									<?= $name ?>
								</span>
								<span class="col4">
									<?= $subject ?>
								</span>
								<span class="col5">
									<?= $file_name ?>
								</span>
								<span class="col6">
									<?= $regist_day ?>
								</span>
							</li>
							<?php
							$number--;
						}
						?>
						<button type="submit">선택된 글 삭제</button>
					</form>
				</ul>
				<h3 id="member_title">
					관리자 모드 > 사진 갤러리 관리
				</h3>
				<ul id="board_list">
					<li class="title">
						<span class="col1">선택</span>
						<span class="col2">번호</span>
						<span class="col3">이름</span>
						<span class="col4">제목</span>
						<span class="col5">첨부파일명</span>
						<span class="col6">작성일</span>
					</li>
					<form method="post" action="admin_photo_delete_action.php">
						<?php
						$sql = "SELECT * FROM board_photo ORDER BY num DESC";
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); // 전체 글의 수
					
						$number = $total_record;

						while ($row = mysqli_fetch_array($result)) {
							$num = $row["num"];
							$name = $row["name"];
							$subject = $row["subject"];
							$file_name = $row["file_name"];
							$regist_day = $row["regist_day"];
							$regist_day = substr($regist_day, 0, 10)
								?>
							<li>
								<span class="col1"><input type="checkbox" name="item[]" value="<?= $num ?>"></span>
								<span class="col2">
									<?= $num ?>
								</span>
								<span class="col3">
									<?= $name ?>
								</span>
								<span class="col4">
									<?= $subject ?>
								</span>
								<span class="col5">
									<?= $file_name ?>
								</span>
								<span class="col6">
									<?= $regist_day ?>
								</span>
							</li>
							<?php
							$number--;
						}
						?>
						<button type="submit">선택된 글 삭제</button>
					</form>
				</ul>
				<h3 id="member_title">
					관리자 모드 > 댓글 관리
				</h3>
				<ul id="board_list">
					<li class="title">
						<span class="col1">선택</span>
						<span class="col2">번호</span>
						<span class="col3">이름</span>
						<span class="col4">내용</span>
					</li>
					<form method="post" action="admin_reply_delete_action.php">
						<?php
						$sql = "SELECT * FROM reply ORDER BY reply_num DESC";
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); // 전체 글의 수
					
						$number = $total_record;

						while ($row = mysqli_fetch_array($result)) {
							$reply_num = $row["reply_num"];
							$name = $row["name"];
							$content = $row["content"];
							?>
							<li>
								<span class="col1"><input type="checkbox" name="item[]" value="<?= $reply_num ?>"></span>
								<span class="col2">
									<?= $reply_num ?>
								</span>
								<span class="col3">
									<?= $name ?>
								</span>
								<span class="col4">
									<?= $content ?>
								</span>
							</li>
							<?php
							$number--;
						}
						mysqli_close($con);
						?>
						<button type="submit">선택된 댓글 삭제</button>
					</form>
				</ul>
			</div> <!-- admin_box -->
		</section>
		<footer>
			<?php include "footer.php"; ?>
		</footer>
	</body>

	</html>
	<?php
		} else {
			echo "<script> alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!'); javascript:history.go(-1); </script>";
		}