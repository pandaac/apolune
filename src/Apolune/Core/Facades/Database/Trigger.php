<?php

namespace Apolune\Core\Facades\Database;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Apolune\Core\Database\Eloquent\Trigger
 */
class Trigger extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Apolune\Core\Handlers\TriggerHandler';
    }
}
