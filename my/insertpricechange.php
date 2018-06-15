<?php
  //输入京东商品地址与商品id
  //把这条要记录的商品入库，加入价格监控
  //地址：/my

  //日志分析
  // ini_set("display_errors", On);
  // ini_set("error_reporting", E_ALL);

  //商品地址
  $url = $_POST['url'];

  $id = $_POST['id'];

  //引入通用php
  include '../infoCommon.php';

  $db = getDBObject();

  //分析地址内容
  $htmlResult = file_get_contents($url);

  //网页内容dom
  $htmlParse = new \HtmlParser\ParserDom($htmlResult);

  //图片url
  $imageUrl = $htmlParse->find('img[id=spec-img]', 0)->getAttr('jpimg');
  //商品名称
  $name = $htmlParse->find('div.sku-name', 0)->getPlainText();
  $priceclass = 'J-p-' . $id;
  //当前价格
  $price = $htmlParse->find('span.'. $priceclass, 0)->getPlainText();

  //如果存在
  if ($db->has('table_price_change', ['id'=>$id])) {
    $oldprice = $db->select('table_price_change', [
      'currentprice'
    ],[
      'id'=>$id
    ]);
    //把库里的当前价格设置为老价格
    $oldpricestr = $oldprice['currentprice'];
    $db->update('table_zentao_missions', [
      'name'=>$name,
      'image'=>$imageUrl,
      'oldprice'=>$oldpricestr,
      'currentprice'=>$price
    ], [
      'id'=>$id
    ]);
  }
  else{
    $db->insert('table_zentao_missions', [
      'id'=>$id,
      'level'=>$level,
      'iteration'=>$iteration,
      'name'=>$name,
      'plantime'=>$plan,
      'consumetime'=>$comsume,
      'remindtime'=>$remind,
      'deadline'=>$deadline,
      'status'=>$status,
      'user'=>$user
    ]);
  }
?>
