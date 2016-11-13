<?php
      /*Restful implementation credits to Corey Maynard 2013: 
        http://coreymaynard.com/blog/creating-a-restful-api-with-php/
      */
      abstract class API {
        protected $X_HTTP_METHOD_KEY = 'HTTP_X_HTTP_METHOD';
        protected $CORS_HEADERS = ['Access-Control-Allow-Orgin: *',
                                   'Access-Control-Allow-Methods: *',
                                   'Content-Type: application/json'];
        // The HTTP method this request was made in, either GET, POST, PUT or DELETE
        protected $method = '';
        // The Model requested in the URI. eg: /files
        protected $endpoint = '';
        /* An optional additional descriptor about the endpoint, used for things that can
         * not be handled by the basic methods. eg: /files/process*/
        protected $verb = '';
        /* Any additional URI components after the endpoint and verb have been removed, in our
         * case, an integer ID for the resource. eg: /<endpoint>/<verb>/<arg0>/<arg1>
         * or /<endpoint>/<arg0> */
        protected $url_args = Array();
        // Stores the input of the PUT request
        protected $file = Null;


        protected function initHeaders($header_list) {
            foreach ($header_list as $header) {
                 header($header);
            }
        }

        protected function getArgs($url_request) {
          return explode('/', rtrim($url_request, '/'));
        }

        // Allow for CORS, assemble and pre-process the data
        public function __construct($request) {
            $this->initHeaders($this->CORS_HEADERS);

            $this->url_args = $this->getArgs($request); 
            $this->endpoint = array_shift($this->url_args); //pops first arg
            if (array_key_exists(0, $this->url_args) && !is_numeric($this->url_args[0])) {
                $this->verb = array_shift($this->url_args);
            }

            $this->method = $_SERVER['REQUEST_METHOD'];
            if ($this->method == 'POST' && array_key_exists($this->X_HTTP_METHOD_KEY, $_SERVER)) {
                $x_method = $_SERVER[$this->X_HTTP_METHOD_KEY];
                if (!in_array($x_method,['DELETE','PUT'])) {
                    throw new Exception("Unexpected Header");
                } 
                $this->method = $x_method;
            }

            $this->handleMethod($this->method);
        }

        protected function handleMethod($method_request) {
            $handlers = [
              'DELETE' => (function () { }), //do nothing
              'POST'   => (function () { $this->cleanInputs($_POST); }),
              'GET'    => (function () { $this->cleanInputs($_GET); }),
              'PUT'    => (function () { 
                              $this->cleanInputs($_GET);
                              $this->file = file_get_contents("php://input");
                           })
            ];

            if (!array_key_exists($method_request,$handlers)){
              $this->APIResponse('Invalid Method', 405);
              return;
            }
            $handlers[$method_request]();
        }


        public function processAPI() {
            if (method_exists($this, $this->endpoint)) {
                return $this->APIResponse($this->{$this->endpoint}($this->url_args));
            }
            return $this->APIResponse("No Endpoint: $this->endpoint", 404);
        }

        protected function APIResponse($data, $status = 200) {
            header("HTTP/1.1 " . $status . " " . $this->getStatusMessage($status));
            return json_encode($data);
        }

        protected function cleanInputs($data) {
          if (!is_array($data)) {
            return trim(strip_tags($data));
          }
          $clean_input = Array();
          foreach ($data as $key => $value) {
            $clean_input[$key] = $this->cleanInputs($value);
          }
          return $clean_input;
        }

        protected function getStatusMessage($code) {
            $status = array(  
                200 => 'OK',
                404 => 'Not Found',   
                405 => 'Method Not Allowed',
                500 => 'Internal Server Error',
            ); 
            return (($status[$code]) ? $status[$code] : $status[500]); 
        }
    } //end abstract class API 
?>
