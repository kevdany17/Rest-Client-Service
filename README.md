# REST CLIENT SERVICE
Servicio de Cliente Rest para Laravel

- In the new version remplace **RestClientFacade** for **RestClient**.
- Versión 2.0 - 22 May 2023 deployed in master.

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
    use Impulzo\RestClientService\Libraries\RestClient;
  ```
  and 
  ```
    //Inyect Dependency
    public function methodName(RestClient $service){
      ....
    }
    
    //or
    
    //Create Class
    public function methodName(){
      $service = new RestClient();
    }
  ```
  
  **GET**
  headers is optional, default null
  ```
    $service->get($url, $headers);
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
