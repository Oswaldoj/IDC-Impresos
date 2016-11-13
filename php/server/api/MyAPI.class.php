<?php
require_once 'API.class.php';
require_once 'models.php';
require_once 'services.php';

class MyAPI extends API {
    protected $User;
    protected $model_service;

    public function __construct($request, $origin,$model_service = null) {
        parent::__construct($request);
        if (is_null($model_service)) {
            $model_service = new Services\ModelService();
        }
        $this->model_service = $model_service;

        /* TODO Authentication and api key validation*/
        // Abstracted out for example
        $APIKey = new Models\APIKey();
        $User = new Models\User();

       /* if (!array_key_exists('apiKey', $this->request)) {
            throw new Exception('No API Key provided');
        } else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
            throw new Exception('Invalid API Key');
        } else if (array_key_exists('token', $this->request) &&
             !$User->get('token', $this->request['token'])) {

            throw new Exception('Invalid User Token');
        }*/

        $this->User = $User;
    }

    /**
     * areas Endpoint
     */
     protected function areas() {
        if ($this->method == 'GET') {  
            return $this->model_service->getAllAreas();
        } else {
            return "Only accepts GET requests";
        }
     }
 }
 ?>
 