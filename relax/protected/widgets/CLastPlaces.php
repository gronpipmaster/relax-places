<?

class CLastPlaces extends CWidget
{
    public $lastPlaces = false;

    public function init()
    {
        parent::init();
    }

    public function renderWidget()
    {
        $this->render('lastplaces', array('lastPlaces' => $this->lastPlaces));
    }
}
