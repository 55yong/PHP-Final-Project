# PHP 기말 프로젝트 - Plxel Place (사진 공유 커뮤니티)
Apache, PHP, MySQL(APM)을 이용한 DB 연동 웹 사이트   
   
제작기간 : 2주   
   
![image](https://github.com/55yong/PHP_Project/assets/132319467/c3ac74dd-64fa-404f-ad76-c5bb72c08af6)


## DB 구조
![DB구조](https://github.com/55yong/PHP_Project/assets/132319467/effbad15-d6ad-49ce-b7a1-104d8cc4a541")

---

## 소스파일별 기능과 파일 연결 흐름도
![흐름도](https://github.com/55yong/PHP_Project/assets/132319467/df76a677-a16b-4978-a118-de30a94a8e97)

**admin.php** : 관리자 모드 폼 php파일   
**admin_member_delete_action.php** : 멤버를 삭제 시 backend에서 동작하는 php 파일       
**admin_photo_delete_action.php** : 사진 게시판 게시물 삭제 시 backend에서 동작하는 php 파일      
**admin_reply_delete_action.php** : 댓글 삭제 시 backend에서 동작하는 php 파일      
**admin_text_delete_action.php** : 자유 게시판의 게시물 삭제 시 backend에서 동작하는 php 파일      
   
**board_text_list.php** : 자유 게시판 목록 폼 php 파일   
**board_text_action.php** : 자유 게시판 게시물 작성 시 backend에서 작동하는 php 파일   
**board_text_change_action.php** : 자유 게시판 게시물 수정 시 backend에서 작동하는 php 파일   
**board_text_delete_action.php** : 자유 게시판 게시물 삭제 시 backend에서 작동하는 php 파일   
**board_text_good_action.php** : 자유 게시판 추천 버튼 클릭 시 backend에서 작동하는 php 파일   
**board_text.php** : 자유 게시판 게시물 작성 폼 php 파일   
**board_text_view.php** : 자유 게시판 작성된 게시물을 볼 수 있는 php 파일   
**board_photo_list.php** : 사진 게시판 목록 폼 php 파일   
**board_photo_action.php** : 사진 게시판 게시물 작성 시 backend에서 작동하는 php 파일   
**board_photo_change_action.php** : 사진 게시판 게시물 수정 시 backend에서 작동하는 php 파일   
**board_photo_delete_action.php** : 사진 게시판 게시물 삭제 시 backend에서 작동하는 php 파일   
**board_photo_good_action.php** : 사진 게시판 추천버튼 클릭 시 backend에서 작동하는 php 파일   
**board_photo.php** : 사진 게시판 게시물 작성 폼 php 파일   
**board_photo_view.php** : 사진 게시판 작성된 게시물을 볼 수 있는 php 파일   
   
**chatting.php** : 실시간 채팅 폼 php 파일   
**chatting_action.php** : 실시간 채팅 입력 시 backend에서 작동하는 php 파일     
**chatting_data.txt** : 실시간 채팅 데이터가 들어가있는 txt 파일   
**prototype.js** : 실시간 채팅 관련 JavaScript 파일   
      
**member_login.php** : 로그인 폼 php 파일      
**member_login_action.php** : 로그인 시 backend에서 작동하는 php 파일   
**member_change.php** : 회원 정보 변경 폼 php 파일   
**member_change_action.php** : 회원 정보 변경 시 backend에서 작동하는 php 파일   
**member_expire.php** : 회원 탈퇴 폼 php 파일   
**member_expire_action.php** : 회원 탈퇴 시 backend에서 작동하는 php 파일   
**member_regist.php** : 회원 가입 폼 php 파일   
**member_id_check_action.php** : 회원 가입 시 ID 중복 확인하는 php 파일   
**member_regist_action.php** : 회원 가입 시 backend에서 작동하는 php 파일   
**member_logout_action.php** : 로그아웃 시 backend에서 작동하는 php 파일   
   
**reply_action.php** : 댓글 작성 시 backend에서 작동하는 php 파일   
**reply_delete_action.php** : 댓글 삭제 시 backend에서 작동하는 php 파일   
   
   
기능 도움 : [전승현](https://github.com/jjsh0208)   
디자인 도움 : [홍가영](https://github.com/kaouo)
