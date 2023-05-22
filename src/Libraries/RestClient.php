<?php

namespace Impulzo\RestClientService\Libraries;

use Exception;

class RestClient
{
	private $curl;

	public function __construct(CurlWrapper $curl = null)
	{
		$this->curl = $curl ?? new CurlWrapper();
	}

	public function setCurl(CurlWrapper $curl)
	{
		$this->curl = $curl;
	}
	// METHODS
	// GET Obtiene los Datos, Apartir de una URL
	public function get($url, $headers = null)
	{
		$response = null;
		try {
			$this->isEmptyUrl($url);

			$this->curl->setOption(CURLOPT_URL, $url);
			$this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
			$this->curl->setOption(CURLOPT_FOLLOWLOCATION, true);
			if (!empty($headers)) {
				$this->curl->setOption(CURLOPT_HTTPHEADER, $headers);
			}
			$curl_response = $this->curl->exec();
			$response = json_decode($curl_response);
			if ($response === null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($this->getStringLog('Get', $ex->getMessage()));
		} finally {
			$this->curl->close($this->curl);
		}
		return $response;
	}
	// POST Envía Datos, en una URL
	public function post($url, $data, $headers = null)
	{
		$response = array();
		try {
			$this->isEmptyUrl($url);

			$this->curl->setOption(CURLOPT_URL, $url);
			$this->curl->setOption(CURLOPT_POST, true);
			$this->curl->setOption(CURLOPT_FOLLOWLOCATION, true);
			if (!empty($headers)) {
				$this->curl->setOption(CURLOPT_HTTPHEADER, $headers);
				$this->curl->setOption(CURLOPT_POSTFIELDS, $data);
			} else {
				$this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				$this->curl->setOption(CURLOPT_POSTFIELDS, json_encode($data));
			}
			$this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
			$curl_response = $this->curl->exec($this->curl);
			$response = json_decode($curl_response);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($this->getStringLog('Post', $ex->getMessage()));
		} finally {
			$this->curl->close($this->curl);
		}
		return $response;
	}
	//PUT
	public function put($url, $data, $headers = null)
	{
		$response = null;
		try {
			$this->isEmptyUrl($url);

			$this->curl->setOption(CURLOPT_URL, $url);
			$this->curl->setOption(CURLOPT_CUSTOMREQUEST, 'PUT');
			$this->curl->setOption(CURLOPT_FOLLOWLOCATION, true);
			if (!empty($headers)) {
				$this->curl->setOption(CURLOPT_HTTPHEADER, $headers);
				$this->curl->setOption(CURLOPT_POSTFIELDS, $data);
			} else {
				$this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				$this->curl->setOption(CURLOPT_POSTFIELDS, json_encode($data));
			}
			$this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
			$curl_response = $this->curl->exec($this->curl);
			$response = json_decode($curl_response);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($this->getStringLog('Put', $ex->getMessage()));
		} finally {
			$this->curl->close($this->curl);
		}
		return $response;
	}
	//DELETE
	public function delete($url, $data, $headers = null)
	{
		$response = null;
		try {
			$this->isEmptyUrl($url);

			$this->curl->setOption(CURLOPT_URL, $url);
			$this->curl->setOption(CURLOPT_CUSTOMREQUEST, 'DELETE');
			$this->curl->setOption(CURLOPT_FOLLOWLOCATION, true);
			if (!empty($headers)) {
				$this->curl->setOption(CURLOPT_HTTPHEADER, $headers);
				$this->curl->setOption(CURLOPT_POSTFIELDS, $data);
			} else {
				$this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
				$this->curl->setOption(CURLOPT_POSTFIELDS, json_encode($data));
			}
			$this->curl->setOption(CURLOPT_RETURNTRANSFER, true);
			$curl_response = $this->curl->exec($this->curl);
			$response = json_decode($curl_response);
			if ($response == null) {
				$response = $curl_response;
			}
		} catch (\Exception $ex) {
			throw new \Exception($this->getStringLog('Delete', $ex->getMessage()));
		} finally {
			$this->curl->close($this->curl);
		}
		return $response;
	}

	// METHODS PRIVATE
	private function isEmptyUrl($url)
	{
		if ($url == '') {
			throw new Exception('La url esta Vacía.');
		}
		return;
	}

	private function getStringLog($method, $message)
	{
		return 'rest-client error [' . $method . ']: ' . $message;
	}
}
