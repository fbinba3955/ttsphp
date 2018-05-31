<?php 

	//路径：/my

	//日志分析
	ini_set("display_errors", On);
	ini_set("error_reporting", E_ALL);
	//解决中文乱码
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';

	//引入dom框架
	include '../tools/ParserDom.php';

	//需要分析的地址
	$sourceURL = 'http://www.pc841.com/article/21173_all.html';
    //分析地址内容
	$htmlResult = file_get_contents($sourceURL);

	//网页内容dom
	$htmlParse = new \HtmlParser\ParserDom($htmlResult);

	$content = $htmlParse->find('div[id=content]', 0);

	echo $content->innerHtml();
?>