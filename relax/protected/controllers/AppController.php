<?php

class AppController extends Controller
{
	public function actionIndex()
	{
    		$this->render('index');
	}


    public function actionGetGeom($what) {
        $filials = Yii::app()->webapi->getGeom($what);
        $this->layout = false;
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($filials);
        Yii::app()->end();
    }
    
}
