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
	<div class="logins">
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="actionLogin" class="form">
			<input type="hidden" name="r" value="app/actionLogin" />
			<input type="text" name="name" class="text" />
			<input type="password" name="pass" class="text" />
			<input type="submit" value="Login" class="submit" />
		</form>
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="actionLogout" class="form">
			<input type="hidden" name="r" value="app/actionLogout" />
			<input type="submit" value="Logout" class="submit" />
		</form>
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="actionRegister" class="form">
			<input type="hidden" name="r" value="app/actionRegister" />
			<input type="text" name="name" class="text" />
			<input type="text" name="email" class="text" />
			<input type="password" name="pass" class="text" />
			
			<input type="submit" value="Registr" class="submit" />
		</form>
	</div>
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
                <?php
                $myPlaces = $this->widget('CLastPlaces',array(
                    'lastPlaces' => $lastUserPlaces
                ));
                $myPlaces->renderWidget();
                ?>
			</div>
		</div>
	</div>
        <?php }?>
</div>
