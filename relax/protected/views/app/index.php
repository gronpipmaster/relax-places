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
                <?php
                $lastPlaces = $this->widget('CLastPlaces',array(
                    'lastPlaces' => $lastPlaces
                ));
                $lastPlaces->renderWidget();
                ?>
			</div>
		</div>
        <?php if(!Yii::app()->user->isGuest) {?>
		<div class="block">
			<h2>Self</h2>
			<div class="block-inner">
			</div>
		</div>
<<<<<<< HEAD
<<<<<<< HEAD
	</div>
=======
=======
        <?}?>
>>>>>>> 4d90b0df760b1ec2fa672d719cf64943d5c0bd7e
</div>
>>>>>>> 048069b577068eaef54216f1a026dd4ee227e7af
