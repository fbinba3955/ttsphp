<?php 
	//地址：/tts

	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include '../infoCommon.php';

	//引入dom框架
	include '../tools/ParserDom.php';

	$shijianting = $_POST['shijianting'];
	$niuxiang = $_POST['niuxiang'];
	$cuiliqing = $_POST['cuiliqing'];
	$hangweiqing = $_POST['hangweiqing'];
	$yinjiachun = $_POST['yinjiachun'];
	$qianglusheng = $_POST['qianglusheng'];

	$result_final = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

	$result_final = $result_final . formateContent($shijianting, '史健廷');
	$result_final = $result_final . formateContent($niuxiang, '牛翔');
	$result_final = $result_final . formateContent($cuiliqing, '崔丽青');
	$result_final = $result_final . formateContent($hangweiqing, '杭卫青');
	$result_final = $result_final . formateContent($yinjiachun, '殷佳春');
	$result_final = $result_final . formateContent($qianglusheng, '强路生');

	$result = send_email('shijianting3955@163.com','日报整理',$result_final);

	if ($result) {
		echo json_encode(array('resultCode' => '0', 'resultMsg' => 'success'));
	}
	else {
		echo json_encode(array('resultCode' => '1', 'resultMsg' => '发送邮件失败'));
	}

	function formateContent($content, $user) {

		//网页内容dom
		$htmlParse = new \HtmlParser\ParserDom($content);

		$missions = $htmlParse->find('tr.text-center');

		$resultStr = '';

		$resultStr = $resultStr . $user . '<br>';

		if (!empty($content) && count(missions) > 0) {
			foreach ($missions as $mission) {
				$resultStr = $resultStr . $mission->outerHtml() . '<br>';
			}

			$resultStr = $resultStr . '<p></p>';

			return $resultStr;
		}
		else {
			$resultStr = $resultStr . '<b>无任务</b><p></p>';

			return $resultStr;
		}

		
	}
?>