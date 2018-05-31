<?php 
	
	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);

	$id = $_GET['id'];

	switch ($id) {
		//欢迎页
		case '1001':
		echo formatUrlJson('http://139.162.36.106/ttsphp/images/welcome.jpg');
			break;
		
		default:
		echo formateErrorUrlJson();
			break;
	}

	function formatUrlJson($url) {
		$jsonarry = array('resultCode'=>'0', 'resultMsg'=>'success', 'url'=>$url);
		return json_encode($jsonarry);
	}

	function formateErrorUrlJson() {
		$jsonarry = array('resultCode'=>'101', 'resultMsg'=>'not find request image');
		return json_encode($jsonarry);
	}
?>