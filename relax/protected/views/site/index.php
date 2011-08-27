<?php $this->pageTitle=Yii::app()->name; ?>
<h1><?php echo CHtml::encode(Yii::app()->name); ?></h1>
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
			</div>
		</div>
		<div class="block">
			<h2>Self</h2>
			<div class="block-inner">
			</div>
		</div>
</div>