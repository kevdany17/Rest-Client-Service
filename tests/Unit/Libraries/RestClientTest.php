<?php

namespace Tests\Unit\Libraries;

use PHPUnit\Framework\TestCase;
use Impulzo\RestClientService\Libraries\RestClient;
use Exception;

class RestClientTest extends TestCase
{
	protected $restClient;
	protected $mock;

	protected function setUp(): void
	{
		$this->restClient = new RestClient();
		$this->mock = $this->getMockBuilder(RestClient::class)
			->disableOriginalConstructor()
			->getMock();
	}
	public function testGetSuccess()
	{
		// Should response success object method GET
		// $this->mock->expects($this->once())
        //     ->method('get')
        //     ->willReturn($this->mock);

		$response = $this->restClient->get("https://pokeapi.co/api/v2/pokemon?limit=1&offset=0");
		$this->assertIsObject($response);
	}
	public function testGetErrorUrl()
	{
		// Should response error object method GET when url is empty
		try {
			$response = $this->restClient->get("");
		} catch (\Exception $ex) {
			$this->assertEquals('La url esta Vacía.', $ex->getMessage());
		}
	}
}
