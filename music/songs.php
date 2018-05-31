<?php 
	//地址：/music

	//日志分析
	// ini_set("display_errors", On);
	// ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include '../infoCommon.php';

	$songlist = read_mp3_files('songs/');

	$songs = array();

	foreach ($songlist as $song) {
		$songname = str_replace(array('songs/', '.mp3'), '', $song);
		$one = array('name'=>$songname, 
			'music'=>'http://139.162.36.106/music/songs/' . $songname . '.mp3', 
			'cover'=>'http://139.162.36.106/music/songs/' . $songname . '.jpg');
		array_push($songs, $one);
	}

	$response = getCommonResponse('0', 'Success', 'datalist', $songs);

	echo json_encode($response);
?>