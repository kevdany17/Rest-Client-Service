<?php

namespace Impulzo\RestClientService\Libraries;

use Exception;

class RestClient
{
	//Obtiene los Datos, Apartir de una URL
	public function get($url, $headers = null)
	{
		if ($url == "") {
			throw new Exception("La url esta Vacía.");
		}
		$response = array();
		try {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			if ($headers != null) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			}
			$curl_response = curl_exec($curl);
			$response = json_decode($curl_response);
			curl_close($curl);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($ex->getMessage());
		}
		return $response;
	}
	//Post Envía Datos, en una URL
	public function post($url, $data, $headers = null)
	{
		if ($url == "") {
			throw new Exception("La url esta Vacía.");
		}
		$response = array();
		try {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_POST, true);
			if ($headers != null) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			} else {
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);
			$response = json_decode($curl_response);
			curl_close($curl);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($ex->getMessage());
		}
		return $response;
	}
	//PUT
	public function put($url, $data, $headers = null)
	{
		if ($url == "") {
			throw new Exception("La url esta Vacía.");
		}
		$response = array();
		try {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
			if ($headers != null) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			} else {
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);
			$response = json_decode($curl_response);
			curl_close($curl);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($ex->getMessage());
		}
		return $response;
	}
	//DELETE
	public function delete($url, $data, $headers = null)
	{
		if ($url == "") {
			throw new Exception("La url esta Vacía.");
		}
		$response = array();
		try {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
			if ($headers != null) {
				curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			} else {
				curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
			}
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);
			$response = json_decode($curl_response);
			curl_close($curl);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($ex->getMessage());
		}
		return $response;
	}
}
