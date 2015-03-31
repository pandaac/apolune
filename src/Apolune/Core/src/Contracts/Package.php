<?php namespace Apolune\Core\Contracts;

interface Package {

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
