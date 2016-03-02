<?php

namespace Apolune\Core\Exceptions;

use Closure;
use Exception;
use Whoops\Run as Whoops;
use Illuminate\Http\Response;
use Whoops\Handler\PrettyPageHandler;
use GrahamCampbell\Exceptions\ExceptionHandler;

abstract class Handler extends ExceptionHandler
{
    /**
     * Holds all the exception handlers.
     *
     * @var array
     */
    protected static $handlers = [];

    /**
     * Add a handler to a specific exception.
     *
     * @param  string  $exception
     * @param  \Closure  $callback
     * @return void
     */
    public function handle($exception, Closure $callback)
    {
        static::$handlers[$exception] = $callback;
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($handler = $this->getHandler($e)) {
            return call_user_func($handler, $e, $this);
        }

        return parent::render($request, $e);
    }

    /**
     * Retrieve a custom handler based on the exception definition.
     *
     * @param  \Exception  $exception
     * @return \Closure|null
     */
    protected function getHandler(Exception $exception)
    {
        $class = get_class($exception);

        return isset(static::$handlers[$class]) ? static::$handlers[$class] : null;
    }
}
