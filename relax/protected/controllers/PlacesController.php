<?php

class PlacesController extends Controller
{
    protected $model = false;

    public function init() {
        $this->model = $this->getPlaceModel();
    }
    
    public function actionGetPlaces() {
        $models = $this->model->findAll();
        $arr = array();
        foreach($models as $model)
        {
            $arr[$model->id] = $model->attributes;
        }
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($arr);
        Yii::app()->end();
    }

    public function actionSearchNearBy($lon, $lat, $radius = 1000) {

        $res = $this->model->searchNearBy($lon, $lat, $radius);
        header('Content-type: application/json');
        echo CJavaScript::jsonEncode($res);
        Yii::app()->end();
    }

    public function actionAddPlace($userId, $title, $desc, $lon, $lat) {

        $this->model->title = $title;
        $this->model->use_id = $userId;
        $this->model->desc = $desc;
        $this->model->lat = $lat;
        $this->model->lon = $lon;
        $this->model->creat_date = date('Y-M-D H:m:s',time());
        if($this->model->validate()) {
            $this->model->save();
        }
    }

    protected function getPlaceModel() {
        return Places::model();
    }
}
