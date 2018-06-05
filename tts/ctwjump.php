<!DOCTYPE html>
<html>
<head>
	<title>app内部跳转测试</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
	<p>Android</p>
	<p style="font-size:32px"><a href="router://m.changtu.com/scenery/detail?touristId=45108">明孝陵</a></p>
	<p style="font-size:32px"><a href="router://m.changtu.com/my/mycenter">我的畅途（子模块）</a></p>
	<p style="font-size:32px"><a href="router://m.changtu.com/my/ctopmember?isCtop=Y">ctop</a></p>
	<br>

	<p>iOS</p>
	<p style="font-size:32px"><a href="trip8080://openinapp/my://userInfo?loginBean={userGradId=3&picUrl=http=//172.19.3.28=18080/publicservice/images/">个人信息页</a></p>
	<p style="font-size:32px"><a href="trip8080://openinapp/order://history">历史行程</a></p>
	<p style="font-size:32px"><a href="trip8080://openinapp/my://red">我的红包</a></p>
	<p style="font-size:32px"><a href="trip8080://openinapp/my://cTopMember">C-Top会员</a></p>
	<p style="font-size:32px"><a href="trip8080://openinapp/my://refund?refundBankMoney=0&transferFlag=1&transferMoney=2.61">我要退款</a></p>
	<p style="font-size:32px"><a href='trip8080://openinapp/my://modifyNickName?profile={"levelName":"普通会员测","userGradId":0,"picUrl":"http:\/\/172.19.3.28:18080\/publicservice\/images\/eb2cbfd8293d0dd910390789789febb35134fd29876a9204.jpg","isRVerified":"Y","havePayPwd":"Y","smsMobile":"13952093110","leftExp":16408,"userName":"ct1502271","leftOrders":0,"nickName":"立即支付","mobileVerifyFlag":"0","userTypeId":"3","userMobile":"13952093110","userCode":"立即支付","expPercent":0,"expBalance":3593}'>修改昵称-参数较复杂</a></p>
	<p style="font-size:32px"><a href='trip8080://openinapp/my://cTopMember?versionCode=500'>版本过低提示</a></p>
	<p style="font-size:32px"><a href='trip8080://openinapp/my://cTopMember'>未登录时跳转到需要登录的页面</a></p>
</body>
</html>