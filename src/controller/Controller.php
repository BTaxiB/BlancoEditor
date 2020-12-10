<?php

namespace JetRefacto\Controller;

use JetRefacto\Template\JetControl;

class Controller implements JetControl
{
    // protected static ?string $directory;
    protected static ?string $filename;
    protected static ?object $control;
    protected static ?string $data;

    public static function setControl(?object $control) : void {
        self::$control = $control;
    }

    public static function setFile(?string $filename) : void {
        self::$filename = $filename;
    }

    public static function getFile() {
        return self::$filename;
    }

    public static function setData(?string $data) : void {
        self::$data = $data;
    }

    public static function getData() {
        return self::$data;
    }
}
