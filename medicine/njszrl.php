<?php
	/**
		获取南京市中医院的招聘信息
	*/
	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);
	//解决中文乱码
	//echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
	//引入抓取框架 
	include '../tools/Snoopy.class.php';

	//引入dom框架
	include '../tools/ParserDom.php';
	//初始化snoopy
	$snoopy = new Snoopy();

	//需要分析的地址
	$sourceURL = 'http://www.njszyy.cn/rlzy/rlzy.asp';
	//snoopy获取地址
	$snoopy->fetch($sourceURL);
    //分析地址内容
	$htmlResult = $snoopy->results;
	//网页内容dom
	$htmlParse = new \HtmlParser\ParserDom($htmlResult);
	//查找指定列表下面的内容->li
	$rlnews = $htmlParse->find('ul.nei-xwlb', 0)->find('li');

	$newslist = array();

	foreach ($rlnews as $li) {
		$title = $li->find('a', 0)->getPlainText();
		$date = $li->find('span.nei-newsli-date', 0)->getPlainText();
		$url = 'http://www.njszyy.cn/rlzy/' . $li->find('a', 0)->getAttr('href');
		$one_news = array('title'=>$title, 'date'=>$date, 'url'=>$url);
		array_push($newslist, $one_news);
	}

	$responseSuccess = array('resultCode' => '0', 'resultMsg' => 'success', 'newslist' => $newslist);

	echo json_encode($responseSuccess);


?>