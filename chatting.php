<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta property="og:title" content="Pixel Place" />
  <meta property="og:description" content="국내 최대 카메라 커뮤니티 사이트" />
  <meta property="og:image" content="{{ url_for('img', filename='main_img.png') }}" />
  <title>Pixel Place</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="icon" href="./img/favicon.png">
  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <link rel="stylesheet" type="text/css" href="./css/chatting.css">
  <script type="text/javascript" src="./js/prototype.js"></script>
</head>

<body>
  <header>
    <?php include "header.php"; ?>
  </header>
  <section>
    <?php
    if ($name != "") {
      ?>
      <div id="main_img_bar">
        <img src="./img/main_img.png">
      </div>
      <div id="chatting">
        <h3>
          실시간 채팅
        </h3>
        <textarea id="content" rows=10 readonly></textarea>
        <p>
        <form action="" id="chat" name=test method="POST" onsubmit="doit( $('word') );return false;">
          <input type="text" name="word" id="word" class="word" value="" autocomplete=off />
          <input type="submit" class="button" name="submit" value="전송" />
        </form>
        </p>
      </div>
      <?php
    } else {
      echo "<script> alert('로그인 후 이용해주세요!'); location.href='javascript:history.go(-1)';</script>";
    }
    ?>
  </section>
  <footer>
    <?php include "footer.php" ?>
  </footer>

  <script type="text/javascript">
    // 제공된 코드 스니펫은 JavaScript로 작성되었으며 실시간 메시징을 위해 Comet(Reverse Ajax) 구현을 설정합니다. 다음은 코드 작동 방식에 대한 설명입니다.

    // name의 값을 할당합니다
    name = '<?= $name ?>';

    // text매개변수를 받는 doit 함수가 정의 됩니다 . comet.doRequest메서드를 호출하고 매개변수로 name, text.value을 전달합니다.
    function doit(text) {
      comet.doRequest(name, text.value);
    }

    // Comet 클래스는 Class.create()를 사용하여 생성됩니다. 이 클래스는 Comet 구현을 처리하기 위한 다양한 메서드와 속성을 정의합니다.
    var Comet = Class.create();
    Comet.prototype = {

      timestamp: 0,
      url: './chatting_action.php',
      noerror: true,

      // Comet 클래스에 initialize 메서드가 있지만 비어 있고 아무 작업도 수행하지 않습니다.
      initialize: function () { },
      // connect 메서드는 AJAX를 사용하여 서버에 대한 연결 설정을 담당합니다. 지정된 URL( ./chatting_action.php)로 POST 요청을 하고 매개변수로 타임스탬프를 포함합니다.
      connect: function () {
        this.ajax = new Ajax.Request(this.url, {
          method: 'POST',
          parameters: { 'timestamp': this.timestamp },
          // onSuccess 함수는 서버의 응답을 처리하고 타임스탬프를 업데이트하며 handleResponse 메서드를 호출합니다.
          onSuccess: function (transport) {
            // handle the server response
            var response = transport.responseText.evalJSON();
            this.comet.timestamp = response['timestamp'];
            this.comet.handleResponse(response);
            this.comet.noerror = true;
            $('word').value = ''; // 전송완료후 input값 비우기
          },
          // onComplete 함수는 요청이 완료된 후 호출되며 서버에 다시 연결하거나 오류가 있는 경우 재연결에 대한 시간 제한을 설정합니다.
          onComplete: function (transport) {
            // 이 요청이 완료되면 새 AJAX 요청을 보냅니다.
            if (!this.comet.noerror)
              // 연결 문제가 발생하면 6초마다 다시 연결 시도
              setTimeout(function () { comet.connect() }, 6000);
            else
              this.comet.connect();
            this.comet.noerror = false;
          }
        });
        this.ajax.comet = this;
      },

      // disconnect 메서드가 비어 있고 아무 작업도 수행하지 않습니다. 필요한 경우 Comet 연결을 끊는 데 사용할 수 있습니다.
      disconnect: function () {
      },

      // handleResponse 메소드는 서버의 응답을 매개변수로 수신하고 수신된 메시지( response['msgs'])를 content ID가 있는 HTML 요소에 추가합니다.
      handleResponse: function (response) {
        $('content').innerHTML += response['msgs'] + '\n';
      },

      // doRequest 메서드는 제공된 name및 msgs매개 변수를 사용하여 서버에 요청을 보내는 데 사용됩니다. connect 메서드 와 동일한 URL로 POST 요청을 보냅니다.
      doRequest: function (name, msgs) {
        new Ajax.Request(this.url, {
          method: 'POST',
          parameters: { 'name': name, 'msgs': msgs }
        });
      }
    }

    // Comet 클래스의 인스턴스가 생성되고 connect 메서드가 호출되어 서버에 대한 연결을 시작합니다.
    var comet = new Comet();
    comet.connect();
  </script>
</body>

</html>