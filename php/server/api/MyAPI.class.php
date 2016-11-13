<?php
require_once 'API.class.php';
require_once 'services.php';

class MyAPI extends API {
    protected $User;
    protected $impresos_service;

    public function __construct($request, $origin,$impresos_service = null) {
        parent::__construct($request);
        if (is_null($impresos_service)) {
            $impresos_service = new Services\ImpresosService();
        }
        $this->impresos_service = $impresos_service;
    }

    /**
     * areas Endpoint
     */
     protected function areas() {
        if ($this->method == 'GET') {  
            return $this->impresos_service->getAllAreas();
        } else {
            throw Exception("Only accepts GET requests");
        }
     }
 }
 ?>
 