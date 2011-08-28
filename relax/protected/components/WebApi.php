<?

class WebApi extends CComponent {
   
   public $apiKey = '';
   public $apiUrl = '';
   public $version = '';

   protected $client = false;

   public function init() {
        $this->client = Yii::app()->webBrowser;
   }

   public function getGeom($where) {
        return json_decode($this->sendRequest('geom', array('q' => 'Новосибирск, '.$where, 'limit' => 10, 'project' => 1)));
   }

   protected function sendRequest($action, array $params) {
        $reqUrl = $this->buildReqUrl($action, $params);
        $this->client->get($reqUrl);
        $response = $this->client->getResponseText();
        return $response;
   }

   protected function buildReqUrl($action, array $params) {
        $baseUrl = $this->apiUrl . '/' . $action . '?key=' . $this->apiKey .'&version=' . $this->version;
        foreach($params as $key => $value) {
            $baseUrl .= '&' . $key .'=' . $value;
        }
        return $baseUrl;
   }

}
