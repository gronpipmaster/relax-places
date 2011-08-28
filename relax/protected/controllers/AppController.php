<?php

class AppController extends Controller
{
	public function actionIndex()
	{
        $lastPlaces = array();
        $lastUserPlaces = array();

        $places = $this->getPlacesModel();
        $lastPlaces = $places->last(10)->findAll();
        if(!Yii::app()->user->isGuest) {
            $lastUserPlaces = $places->my(Yii::app()->user->id)->findAll();
        }
		$this->render('index', array('lastPlaces' => $lastPlaces,
                                     'lastUserPlaces' => $lastUserPlaces));
	}


    public function actionGetGeom($what) {
        $filials = Yii::app()->webapi->getGeom($what);
        $this->layout = false;
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($filials);
        Yii::app()->end();
    }

    protected function getPlacesModel() {
        return Places::model();
    }
    
}
