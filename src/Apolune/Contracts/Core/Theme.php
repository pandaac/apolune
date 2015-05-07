<?php namespace Apolune\Contracts\Core;

interface Theme {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot();
	
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register();

}
