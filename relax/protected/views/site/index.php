<?php $this->pageTitle=Yii::app()->name; ?>
<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
	<form class="form search" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="search">
			<input type="hidden" name="r" value="app/getGeom" />
			<input type="text" name="what" id="what" />
			<input type="text" name="radius" id="radius" />
			<ul class="result">
			</ul>
			<input type="submit" value="search" />
	</form>
	<div class="map" id="map_canvas"></div>
	<div class="sidebar">
		<div class="block">
			<h2>Timeline</h2>
			<div class="block-inner">
			</div>
		</div>
		<div class="block">
			<h2>Self</h2>
			<div class="block-inner">
			</div>
		</div>
</div>