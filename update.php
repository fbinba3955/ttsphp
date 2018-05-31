<?php 

	//地址：/

	//日志分析
	// ini_set("display_errors", On);
	// ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include 'infoCommon.php';

	$db = getDBObject();

	//查找符合token的用户
	$list = $db->select('table_versions', '*', [
		'ORDER'=>[
			'code'=>'DESC',
		]
	]);
	
	$responseCode = $_GET['version'];

	if (!empty($list[0])) {
		$code = $list[0]['code'];
		if (!empty($responseCode) && $code > $responseCode) {
			$name = $list[0]['name'];
			$content = $list[0]['content'];
			$filename = $list[0]['filename'];
			$pathname = 'http://139.162.36.106/download/' . $filename;
			$md5 = get_file_md5('download/' . $filename);
			$size = get_file_size('download/' . $filename);

			$responseList = array('hasUpdate'=>'true', 
				'isSilent'=>'false',
				'isForce'=>'false',
				'isAutoInstall'=>'true',
				'isIgnorable'=>'false',
				'versionCode'=>$code,
				'versionName'=>$name,
				'updateContent'=>$content,
				'url'=>$pathname,
				'md5'=>$md5,
				'size'=>$size);

			echo json_encode($responseList);
		}else {
			$responseList = array('hasUpdate'=>'false', 
				'isSilent'=>'false',
				'isForce'=>'false',
				'isAutoInstall'=>'true',
				'isIgnorable'=>'false',
				'versionCode'=>$code,
				'versionName'=>$name,
				'updateContent'=>$content,
				'url'=>$pathname,
				'md5'=>$md5,
				'size'=>$size);
			echo json_encode($responseList);
		}
	}else {
		$responseList = array('hasUpdate'=>'false');
		echo json_encode($responseList);
	}

?>