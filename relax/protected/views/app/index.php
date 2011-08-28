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
	<div class="logins">
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="login" class="form">
			<input type="hidden" name="r" value="user/login" />
			<input type="text" name="name" class="text" />
			<input type="password" name="pass" class="text" />
			<input type="submit" value="Login" class="submit" />
		</form>
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="logout" class="form">
			<input type="hidden" name="r" value="user/logout" />
			<input type="submit" value="Logout" class="submit" />
		</form>
		<form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php" id="register" class="form">
			<input type="hidden" name="r" value="user/register" />
			<input type="hidden" name="ajax" value="register-form" />
			<input type="text" name="name" class="text" />
			<input type="text" name="email" class="text" />
			<input type="password" name="pass" class="text" />

			<input type="submit" value="Registr" class="submit" />
		</form>
	</div>
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
