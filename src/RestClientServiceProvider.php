<?php

namespace Impulzo\RestClientService;

use Illuminate\Support\ServiceProvider;

class RestClientServiceProvider extends ServiceProvider
{
   /**
	* Register services.
	*
	* @return void
	*/
	public function register()
	{
		$this->app->singleton('RestClient', function () {
			return new \Impulzo\RestClientService\Libraries\RestClient();
		});
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}
}
