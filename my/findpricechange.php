<?php
  //地址：/my

  //日志分析
  // ini_set("display_errors", On);
  // ini_set("error_reporting", E_ALL);

  //引入通用php
  include '../infoCommon.php';

  $db = getDBObject();

  $list = $db->select('table_price_change', '*');

  if (count($list) > 0) {
    foreach ($list as $data) {
      
    }
  }


?>
