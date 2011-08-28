<?php $this->pageTitle=Yii::app()->name; ?>
<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>

	<form class="form search" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="search">
			<input type="hidden" name="r" value="app/getGeom" />
			<input type="text" name="what" id="what" class="text" />
			<ul class="result">
			</ul>

	</form>
	<form class="form searchNearBy" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="searchNearBy">
		<input type="hidden" name="r" value="app/searchNearBy" />
		<input type="hidden" name="lat" value="" />
		<input type="hidden" name="lon" value="" />
		<input type="text" name="radius" id="radius" class="text" />
		<input type="submit" value="Search" class="submit" />
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