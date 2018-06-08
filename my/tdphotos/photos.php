<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>

<!-- Main -->
<div id="main">
	<div class="inner">
		<div class="columns">
				<?php

				//日志分析
				// ini_set("display_errors", On);
				// ini_set("error_reporting", E_ALL);
					//引入通用php
					include '../../infoCommon.php';

					$photos = read_files_type("images/", "jpg");
					foreach ($photos as $photo) {
						echo '<div class="image fit"><a href="detail1.html"><img src="' . $photo . '" alt="" /></a></div>';
					}
				?>

		</div>
	</div>
</div>

<!-- Footer -->
<footer id="footer">
	<a href="#" class="info fa fa-info-circle"><span>About</span></a>
	<div class="inner">
		<div class="content">
			<h3>Vestibulum hendrerit tortor id gravida</h3>
			<p>In tempor porttitor nisl non elementum. Nulla ipsum ipsum, feugiat vitae vehicula vitae, imperdiet sed risus. Fusce sed dictum neque, id auctor felis. Praesent luctus sagittis viverra. Nulla erat nibh, fermentum quis enim ac, ultrices euismod augue. Proin ligula nibh, pretium at enim eget, tempor feugiat nulla.</p>
		</div>
		<div class="copyright">
			<h3>Follow me</h3>
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
				<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
			</ul>
			Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a>
		</div>
	</div>
</footer>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
