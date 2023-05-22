<?php

namespace Tests\Unit\Libraries;

use PHPUnit\Framework\TestCase;
use Impulzo\RestClientService\Libraries\RestClient;
use Impulzo\RestClientService\Libraries\CurlWrapper;
use Exception;

class RestClientTest extends TestCase
{
	protected $restClient;
	protected $curlMock;
	protected $exampleApi;
	protected $pokeApi;

	protected function setUp(): void
	{
		$this->restClient = new RestClient();
		$this->curlMock = $this->getMockBuilder(CurlWrapper::class)
			->getMock();
		$this->exampleApi = 'https://example.com/api/data';
		$this->pokeApi = 'https://pokeapi.co/api/v2/pokemon?limit=1&offset=0';
		$this->body = ['name' => 'Rick', 'last_name' => 'Sánchez'];
	}
	// GET
	public function testGetSuccess()
	{
		// Should response success object method GET
		$response = $this->restClient->get($this->pokeApi);
		$this->assertIsObject($response);
	}
	public function testGetErrorUrl()
	{
		// Should response error object method GET when url is empty
		$this->expectException(\Exception::class);
        $this->expectExceptionMessage('rest-client error [Get]: La url esta Vacía.');

		$response = $this->restClient->get('');
	}
	public function testGetWithHeaders()
	{
		// Should response success object method GET with headers
		$this->curlMock->expects($this->once())->method('exec')->willReturn('{"message":"run on test"}');
    	$this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);
		$headers = array('Content-Type:application/json');
		$response = $this->restClient->get($this->exampleApi, $headers);
		$this->assertIsObject($response);
	}
	public function testGetWithException()
	{
		// Should response error object method GET bad respose
        $expectedExceptionMessage = 'rest-client error [Get]: Error al obtener los datos.';

        $this->curlMock->expects($this->once())
			->method('exec')
			->willThrowException(new \Exception('Error al obtener los datos.'));
        $this->curlMock->expects($this->once())->method('close');

        $this->restClient->setCurl($this->curlMock);

		$this->expectException(\Exception::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

		$this->restClient->get($this->exampleApi);
	}

	// POST
	public function testPostSuccess()
	{
		// Should response success object method POST
		$this->curlMock->expects($this->once())
			->method('exec')
			->willReturn('{"message":"run on test"}');
        $this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);

		$response = $this->restClient->post($this->exampleApi, $this->body);
		$this->assertIsObject($response);
	}
	public function testPostErrorUrl()
	{
		// Should response error object method POST when url is empty
		$this->expectException(\Exception::class);
        $this->expectExceptionMessage('rest-client error [Post]: La url esta Vacía.');

		$response = $this->restClient->post('', $this->body);
	}
	public function testPostWithHeaders()
	{
		// Should response success object method POST with headers
		$this->curlMock->expects($this->once())->method('exec')->willReturn('{"message":"run on test"}');
    	$this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);
		$headers = array('Content-Type:application/json');
		$response = $this->restClient->post($this->exampleApi, $this->body, $headers);
		$this->assertIsObject($response);
	}
	public function testPostWithException()
	{
		// Should response error object method POST bad respose
        $expectedExceptionMessage = 'rest-client error [Post]: Error al obtener los datos.';

        $this->curlMock->expects($this->once())
			->method('exec')
			->willThrowException(new \Exception('Error al obtener los datos.'));
        $this->curlMock->expects($this->once())->method('close');

        $this->restClient->setCurl($this->curlMock);

		$this->expectException(\Exception::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

		$this->restClient->post($this->exampleApi, $this->body);
	}

	// PUT
	public function testPutSuccess()
	{
		// Should response success object method PUT
		$this->curlMock->expects($this->once())
			->method('exec')
			->willReturn('{"message":"run on test"}');
        $this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);

		$response = $this->restClient->put($this->exampleApi, $this->body);
		$this->assertIsObject($response);
	}
	public function testPutErrorUrl()
	{
		// Should response error object method PUT when url is empty
		$this->expectException(\Exception::class);
        $this->expectExceptionMessage('rest-client error [Put]: La url esta Vacía.');

		$response = $this->restClient->put('', $this->body);
	}
	public function testPutWithHeaders()
	{
		// Should response success object method PUT with headers
		$this->curlMock->expects($this->once())->method('exec')->willReturn('{"message":"run on test"}');
    	$this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);
		$headers = array('Content-Type:application/json');
		$response = $this->restClient->put($this->exampleApi, $this->body, $headers);
		$this->assertIsObject($response);
	}
	public function testPutWithException()
	{
		// Should response error object method PUT bad respose
        $expectedExceptionMessage = 'rest-client error [Put]: Error al obtener los datos.';

        $this->curlMock->expects($this->once())
			->method('exec')
			->willThrowException(new \Exception('Error al obtener los datos.'));
        $this->curlMock->expects($this->once())->method('close');

        $this->restClient->setCurl($this->curlMock);

		$this->expectException(\Exception::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

		$this->restClient->put($this->exampleApi, $this->body);
	}

	// DELETE
	public function testDeleteSuccess()
	{
		// Should response success object method DELETE
		$this->curlMock->expects($this->once())
			->method('exec')
			->willReturn('{"message":"run on test"}');
        $this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);

		$response = $this->restClient->delete($this->exampleApi, $this->body);
		$this->assertIsObject($response);
	}
	public function testDeleteErrorUrl()
	{
		// Should response error object method DELETE when url is empty
		$this->expectException(\Exception::class);
        $this->expectExceptionMessage('rest-client error [Delete]: La url esta Vacía.');

		$response = $this->restClient->delete('', $this->body);
	}
	public function testDeleteWithHeaders()
	{
		// Should response success object method DELETE with headers
		$this->curlMock->expects($this->once())->method('exec')->willReturn('{"message":"run on test"}');
    	$this->curlMock->expects($this->once())->method('close');
		$this->restClient->setCurl($this->curlMock);
		$headers = array('Content-Type:application/json');
		$response = $this->restClient->delete($this->exampleApi, $this->body, $headers);
		$this->assertIsObject($response);
	}
	public function testDeleteWithException()
	{
		// Should response error object method DELETE bad respose
        $expectedExceptionMessage = 'rest-client error [Delete]: Error al obtener los datos.';

        $this->curlMock->expects($this->once())
			->method('exec')
			->willThrowException(new \Exception('Error al obtener los datos.'));
        $this->curlMock->expects($this->once())->method('close');

        $this->restClient->setCurl($this->curlMock);

		$this->expectException(\Exception::class);
        $this->expectExceptionMessage($expectedExceptionMessage);

		$this->restClient->delete($this->exampleApi, $this->body);
	}
}
