<?php 
	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);
	//解决中文乱码
	//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

	//引入dom框架
	include '../tools/ParserDom.php';

	//需要分析的地址
	$sourceURL = 'https://jp.hjenglish.com';
    //分析地址内容
	$htmlResult = file_get_contents($sourceURL);

	//网页内容dom
	$htmlParse = new \HtmlParser\ParserDom($htmlResult);
	//获取编辑推荐下面的条目
	$editorChoice = $htmlParse
	->find('ul.a-list', 1)
	->find('li.list-item');

	$list = array();

	foreach ($editorChoice as $li) {
		$type = $li->find('a.list-item-cate', 0)->getPlainText();
		$title = $li->find('a.list-item-title', 0)->getPlainText();
		$url = $sourceURL . $li->find('a.list-item-title',0)->getAttr('href');
		$one = array('title'=>$title, 'type'=>$type, 'url'=>$url);
		array_push($list, $one);
	}

	$responseSuccess = array('resultCode' => '0', 'resultMsg' => 'success', 'newslist' => $list);

	echo json_encode($responseSuccess);
?>