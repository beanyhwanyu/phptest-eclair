<?php

namespace Eric\Support;

class Thema
{
    private static $layout = null;
    public static function setLayout($layout) {
        self::$layout = $layout;
    }
    public static function view($view, $vars = []) {
        foreach ($vars as $key => $value) {
            $$key = $value;
        }
        return require_once $self::$layout;
    }
}
