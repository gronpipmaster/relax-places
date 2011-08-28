<!DOCTYPE html >
<html xml:lang="ru-RU" lang="ru-RU" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ui.css" />

	<script type="text/javascript" >
		var baseurl = '<?php echo Yii::app()->request->baseUrl; ?>'
	</script>
	<script type="text/javascript" src="http://yandex.st/jquery/1.6.2/jquery.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ui.js" charset="utf-8"></script>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="wrapper">
		<div class="inner">
			<?php echo $content; ?>
		</div>
	</div>
</body>
</html>