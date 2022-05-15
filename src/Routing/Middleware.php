<?php

namespace Eric\Routing;

abstract class Middleware
{
    abstract public static function process();
}

?>