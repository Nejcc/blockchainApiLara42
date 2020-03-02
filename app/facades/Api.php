<?php

namespace App\Facades;

use App\Helpers\Facade;

/**
 * response event provider
 */
class Api extends Facade
{

    /**
     * @return string
     */
    protected static function getClass()
    {
        return 'App\Helpers\Api';
    }

}