<?php 

	//路径：/user

	//日志分析
	// ini_set("display_errors", On);
	// ini_set("error_reporting", E_ALL);
	
	//引入通用php
	include '../infoCommon.php';

	$username = $_POST['username'];

	$password = $_POST['password'];

	$token = $_POST['token'];

	$db = getDBObject();

	//账号密码登录
	if (!empty($username) && !empty($password)) {
		
		$token = initRandomToken();
		//根据用户名密码，插入一个新的token
		$db->update('table_user',[
			'token'=>$token
		],[
			'username'=>$username,
			'password'=>$password
		]);
		//查找符合token的用户
		$list = $db->select('table_user', '*', [
			'token'=>$token
		]);

		//是否查询到用户
		if (!empty($list) && count($list) > 0) {
			$level = -1;//默认的level
			$levelname = '';
			$nickname = '';
			foreach ($list as $data) {
				$level = $data['level'];
				$levelname = $data['levelname'];
				$nickname = $data['nickname'];
			}
			$userResponse = array('token'=>$token, 'level'=>$level, 'levelname'=>$levelname, 'nickname'=>$nickname);

			$response = getCommonResponse('0', 'Success', 'user', $userResponse);

			echo json_encode($response);
		}
		else {
			echo json_encode(getFailCommonResponse('1001', '用户名密码错误'));
		}
	}
	//token登录
	else if (!empty($token)) {
		//查找符合token的用户
		$list = $db->select('table_user', '*', [
			'token'=>$token
		]);

		//是否查询到用户
		if (!empty($list) && count($list) > 0) {
			$level = -1;//默认的level
			$levelname = '';
			$nickname = '';
			foreach ($list as $data) {
				$level = $data['level'];
				$levelname = $data['levelname'];
				$nickname = $data['nickname'];
			}
			$userResponse = array('token'=>$token, 'level'=>$level, 'levelname'=>$levelname, 'nickname'=>$nickname);

			$response = $responseObject = getCommonResponse('0', 'Success', 'user', $userResponse);

			echo json_encode($response);
		}
		else {
			echo json_encode(getFailCommonResponse('1001', '用户名密码错误'));
		}

	}

	//生成一个随机32位token
	function initRandomToken() {
		$str="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    	$key = "";
    	for($i=0;$i<32;$i++)
     	{
         	$key .= $str{mt_rand(0,32)};    //生成php随机数
     	}
     	return $key;
	}
?>