<?php 

	//地址：/my

	//日志分析
	// ini_set("display_errors", On);
	// ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include '../infoCommon.php';

	$token = getToken('post');

	$db = getDBObject();

	//查找符合token的用户
	$list = $db->select('table_user', '*', [
		'token'=>$token
	]);

	//未登录状态下的用户值
	$userlevel = 0;

	if (!empty($list[0]) && !empty($list[0]['level'])) {
		$userlevel = $list[0]['level'];
	}

	$list = $db->select('table_my', '*');

	$arraylist = array();

	foreach ($list as $data) {
		$title = $data['title'];
		$description = $data['description'];
		$url = $data['url'];
		$newsLevel = $data['level'];
		if ($newsLevel <= $userlevel) {
			$one = array('title'=>$title, 'description'=>$description, 'url'=>$url);
			array_push($arraylist, $one);
		}
	}

	$responseObject = getCommonResponse('0', 'Success', 'newslist', $arraylist);

	echo json_encode($responseObject);
?>