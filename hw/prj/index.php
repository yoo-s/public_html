<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - yooso's Project</title>
	<link rel="stylesheet" href="prj-style.css">
	<script type="text/Javascript" src="slideShow.js"></script>
</head>
<body onload="slideAuto(x);">
	<header>
		<center>
		<img id="cookie" src="http://i.imgur.com/Gj5Y7Bm.png" width="40%" /><br />
		</center>
	</header>
	<?php include 'homenav.php' ?><br>
	<section id="container">
		<img src="http://web.engr.oregonstate.edu/~yooso/cs290/hw/a3/images/LC-ep001-01.png" id="imgSS" />
		<div id="left"><img src="" onclick="slide(-1);" class="goleft" /></div>
		<div id="right"><img src="" onclick="slide(1);" class="goright"/></div>
	</section>
	<div class="push"></div>
	<center>
	<div class="footer">
	  <p id="copy" style="font-size:10px; text-align: center">Copyright &copy; 2015 Soo-Min Yoo</p>
	</div>
	</center>
</body>
</html>
