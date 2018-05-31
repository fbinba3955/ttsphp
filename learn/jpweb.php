<?php 

	//地址：/learn

	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include '../infoCommon.php';

	$db = getDBObject();

	$list = $db->select('table_jp_web', '*');

	$arraylist = array();

	foreach ($list as $data) {
		$title = $data['title'];
		$description = $data['description'];
		$url = $data['url'];
		$one = array('title'=>$title, 'description'=>$description, 'url'=>$url);
		array_push($arraylist, $one);
	}

	$responseObject = getCommonResponse('0', 'Success', 'newslist', $arraylist);

	echo json_encode($responseObject);
?>