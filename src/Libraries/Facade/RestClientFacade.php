<?php

namespace Impulzo\RestClientService\Libraries\Facade;

use Exception;

class RestClientFacade
{
    //Obtiene los Datos, Apartir de una URL
    public function get($url){
        if($url == ""){
            throw new Exception("La url esta Vacía.");
        }
        $response = array();
        try
        {
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,$url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = json_decode(curl_exec($curl));
            curl_close($curl);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
        return $response;
    }
    //Post Envía Datos, en una URL
    public function post($url,$data){
        if($url == ""){
            throw new Exception("La url esta Vacía.");
        }
        $response = array();
        try
        {
            $curl = curl_init();
            curl_setopt($curl,CURLOPT_URL,$url);
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = json_decode(curl_exec($curl));
            curl_close($curl);
        }catch (\Exception $ex){
            throw new \Exception($ex->getMessage());
        }
        return $response;
    }
    //Pendiente Crear los Metodos PUT y DELETE
}
