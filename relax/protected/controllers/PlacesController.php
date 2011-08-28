<?php

class PlacesController extends Controller
{
    protected $model = false;

    public function init() {
        $this->model = $this->getPlaceModel();
    }
    public function actionGetPlaces() {
        $models = $this->model->findAll();
    }

    public function actionSearchNearBy($lon, $lat, $radius = 1000) {

        $res = $this->model->searchNearBy($lon, $lat, $radius);
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
