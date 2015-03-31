<?php namespace Apolune\Core\Contracts;

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

	/**
	 * Perform post installation actions.
	 *
	 * @return void
	 */
	public function installation();

}
