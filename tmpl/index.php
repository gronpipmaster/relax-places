<?php
require_once './config.php';
?>
<!DOCTYPE html >
<html xml:lang="ru-RU" lang="ru-RU" >
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?=$source?>css/ui.css" />
	<title><?=$title?></title>
	<script type="text/javascript" src="http://yandex.st/jquery/1.6.2/jquery.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?=$source?>js/ui.js" charset="utf-8"></script>
</head><body>
	<div class="wrapper">
		<div class="inner">
			<h1><?=$title?></h1>
			<form class="form search" action="">
				<input tipe="text" name="who" />
				<input tipe="text" name="radius" />
				<input type="submit" value="search" />
			</form>
			<div class="map" id="map_canvas"></div>
			<div class="sidebar">
				<div class="block">
					<h2>Timeline</h2>
					<div class="block-inner">
						<ul>
							<li></li>
						</ul>
					</div>
				</div>
				<div class="block">
					<h2>Self</h2>
					<div class="block-inner">
						<ul>
							<li></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body></html>