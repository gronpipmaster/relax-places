<?

class WebApi extends CComponent {
   
   public $apiKey = '';
   public $apiUrl = '';
   public $version = '';

   public function init() {

   }

   public function getFirmsByName($firmName, $where) {
        return json_decode($this->sendRequest('search', array('what' => $firmName, 'where' => $where)));
   }

   public function getGeom($where) {
        return json_decode($this->sendRequest('geom', array('q' => $where, 'limit' => 100)));
   }

   protected function sendRequest($action, array $params) {
        $reqUrl = $this->buildReqUrl($action, $params);
        return file_get_contents($reqUrl);
   }

   protected function buildReqUrl($action, array $params) {
        $baseUrl = $this->apiUrl . '/' . $action . '?key=' . $this->apiKey .'&version=' . $this->version;
        foreach($params as $key => $value) {
            $baseUrl .= '&' . $key .'=' . $value;
        }
        return $baseUrl;
   }

}
