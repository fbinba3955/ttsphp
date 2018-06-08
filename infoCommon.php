<?php

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// If you installed via composer, just use this code to requrie autoloader on the top of your projects.
	require 'vendor/autoload.php';

	require 'ParserDom.php';

	// Using Medoo namespace
	use Medoo\Medoo;

	//返回通用的网络请求结构
	function getCommonResponse($code, $msg, $listname, $listdata) {
		$responseSuccess = array('resultCode' => $code, 'resultMsg' => $msg, $listname => $listdata);
		return $responseSuccess;
	}

	//返回基本信息
	function getFailCommonResponse($code, $msg) {
		$responseFail = array('resultCode' => $code, 'resultMsg' => $msg);
		return $responseFail;
	}

	//返回数据库操作对象
	function getDBObject() {
		//数据库初始化
		$database = new Medoo([
    		'database_type' => 'mysql',
    		'database_name' => 'sjt',
    		'server' => 'localhost',
    		'username' => 'root',
    		'password' => 'sjt3953395'
		]);
		return $database;
	}

	//获取token
	//type get post请求方式
	function getToken($type) {
		$token = '';
		if ($type == 'get') {
			$token = $_GET['token'];
		}
		if ($type == 'post') {
			$token = $_POST['token'];
		}
		return $token;
	}

	function getUserLevel($token, $type) {
		$token = getToken($type);

		//查找符合token的用户
		$list = $db->select('table_user', 'level', [
			'token'=>$token
		]);
	}

	//控制台打印
	//调试后需要删除，否则会影响json数据
	function console($data)
	{
    	if (is_array($data) || is_object($data))
    	{
        	echo("<script>console.log('".json_encode($data)."');</script>");
    	}
    	else
    	{
        echo("<script>console.log('".$data."');</script>");
    	}
	}

	//遍历文件夹--返回目录与文件带路径
	function read_files_path($dir) {
		$files=array();
    	$queue=array($dir);
    	while($data=each($queue)){
        	$path=$data['value'];
        	if(is_dir($path) && $handle=opendir($path)){
            	while($file=readdir($handle)){
                	if($file=='.'||$file=='..') continue;
                	$files[] = $real_path=$path.'/'.$file;
                	if (is_dir($real_path)) $queue[] = $real_path;
            	}
        	}
        	closedir($handle);
    	}
     	return $files;
	}

	//遍历文件夹--返回目录与文件
	function read_files_withoutpath($dir) {
		$files=array();
    	$queue=array($dir);
    	while($data=each($queue)){
        	$path=$data['value'];
        	if(is_dir($path) && $handle=opendir($path)){
            	while($file=readdir($handle)){
                	if($file=='.'||$file=='..') continue;
                	$files[] = $real_path=$file;
                	if (is_dir($real_path)) $queue[] = $real_path;
            	}
        	}
        	closedir($handle);
    	}
     	return $files;
	}


	//遍历文件夹mp3文件
	function read_mp3_files($dir) {
   		$files = glob($dir . "*.mp3");//获取/tmp/目录下的所有目录和文件
   		return $files;
	}

	//遍历文件夹下指定类型文件--单文件名
	function read_files_type($dir, $type) {
		$files = glob($dir . "*." . $type);//获取/tmp/目录下的所有目录和文件
		return $files;
	}

	//获取文件md5值 32位
	function get_file_md5($path) {
		$md5file = md5_file($path);
		return $md5file;
	}

	//获取文件大小
	function get_file_size($path) {
		$size = filesize($path);
		return $size;
	}

	//比较两个日期
	//true data1>data2
	//false data1<data2
	function compareDate($data1, $data2) {
		 // 日期1是否大于日期2
		 $month1 = date("m", strtotime($date1));
		 $month2 = date("m", strtotime($date2));
		 $day1 = date("d", strtotime($date1));
		 $day2 = date("d", strtotime($date2));
		 $year1 = date("Y", strtotime($date1));
		 $year2 = date("Y", strtotime($date2));
		 $from = mktime(0, 0, 0, $month1, $day1, $year1);
		 $to = mktime(0, 0, 0, $month2, $day2, $year2);
		 if ($from > $to) {
		 return true;
		 } else {
		 return false;
		 }
	}

	//获取当前日期
	function getNowDate() {
		$time = time();
		return date("y-m-d",$time);
	}

	//使用shijianting001@sohu.com账户发送邮件
	//return 是否发送成功
	function send_email($receiver, $title, $body) {
		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
		try {
    		//Server settings
    		$mail->CharSet='UTF-8';
    		$mail->isSMTP();                                      // Set mailer to use SMTP
    		$mail->Host = 'smtp.sohu.com';  // Specify main and backup SMTP servers
    		$mail->SMTPAuth = true;                               // Enable SMTP authentication
    		$mail->Username = 'shijianting001@sohu.com';                 // SMTP username
    		$mail->Password = 'sjt3953395';                           // SMTP password

    		//Recipients
    		$mail->setFrom('shijianting001@sohu.com', 'shijianting');
    		$mail->addAddress($receiver);               // Name is optional

    		//Content
    		$mail->isHTML(true);                                  // Set email format to HTML
    		$mail->Subject = $title;
    		$mail->Body    = $body;

    		$mail->send();
    		return true;
		} catch (Exception $e) {
    		return false;
		}
	}
?>
