<?php
$filename = dirname(__FILE__) . '/chatting_data.txt';

// 새 메시지를 파일에 저장
$msgs = isset($_REQUEST['msgs']) ? $_REQUEST['msgs'] : '';
if ($msgs != '') {
  file_put_contents($filename, $_REQUEST['name'] . ': ' . $msgs);
  die();
}

// 데이터 파일이 수정되지 않을 때까지 무한 루프
$lastmodif = isset($_REQUEST['timestamp']) ? $_REQUEST['timestamp'] : 0;
$currentmodif = filemtime($filename);
while ($currentmodif <= $lastmodif) // 데이터 파일이 수정되었는지 확인
{
  usleep(10000); // CPU 언로드를 위해 10ms sleep
  clearstatcache();
  $currentmodif = filemtime($filename);
}

// json 배열을 반환
$response = array();
$response['msgs'] = file_get_contents($filename);
$response['timestamp'] = $currentmodif;
echo json_encode($response);
flush();

?>