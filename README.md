# REST CLIENT SERVICE
Servicio de Cliente Rest para Laravel

## Installation
  On Laravel And Lumen
  
  edit composer.json, add line in require: 
  ```
  "impulzo/rest_client_service": "dev-master",
  
  ```
  or execute
  ```
    composer require impulzo/rest_client_service
  ```
## Setting
  **Laravel**
  
  Add config/app.php
  ```
    \Impulzo\RestClientService\RestClientServiceProvider::class
  ```
  
  **Lumen**
  
  Add bootstrap/app.php
  ```
    $app->register(\Impulzo\RestClientService\RestClientServiceProvider::class);
  ```
## Use
  **import**
  ```
    use Impulzo\RestClientService\Libraries\Facade\RestClientFacade;
  ```
  and 
  ```
    //Inyect Dependency
    public function methodName(RestClientFacade $service){
      ....
    }
    
    //or
    
    //Create Class
    public function methodName(){
      $service = new RestClientFacade();
    }
  ```
  
  **GET**
  headers is optional, default null
  ```
    $service->post($urel, $headers);
  ```
   **POST**
  - headers is optional,headers is default null
  - $data becomes default json_encode
  - if you send headers json_encode is not applied
  ```
    $service->post($url, $data , $header);
  ```
  **PUT and DELETE**
  The same rules apply of method POST
  ```
    $service->put($url, $data , $headers);
    
    //or
    
    $service->delete($url, $data , $headers);
  ```
