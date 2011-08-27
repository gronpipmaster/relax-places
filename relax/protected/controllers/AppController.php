<?php

class AppController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionGetFilials($what) {
        $filials = Yii::app()->webapi->getFirmsByName($what, Yii::app()->params['defaultLocation']);
        $this->layout = false;
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($filials);
        Yii::app()->end();
    }

}
