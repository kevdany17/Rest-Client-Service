<?php

namespace RestClient\Test\Unit\Libraries;

use PHPUnit\Framework\TestCase;

class RestClientTest extends TestCase
{
	// protected function setUp()
	// {
	// 	$this->restClient = new \RestClient\RestClient();
	// }
	public function testSuccessGet()
	{
		echo "test run";
		$reponse = null; //$this->restClient->get("");
		echo $response;
		$this->assertIsObject($response);
	}
}
