<?php
namespace App\Helpers;

class Facade
{
    private static $objects = [];

    /**
     * @param $fname
     * @param $args
     * @return mixed
     */
    public static function __callStatic($fname, $args)
    {
        $child = get_called_class();
        $class = $child::getClass();
        $object = null;

        if (isset(self::$objects[$class])) {
            $object = self::$objects[$class];
        } else {
            $object = self::$objects[$class] = new $class;
        }

        return call_user_func_array([$object, $fname], $args);
    }

}