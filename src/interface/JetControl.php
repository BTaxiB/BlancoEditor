<?php

namespace JetRefacto\Template;

/**
 * Logic with Ajax Handling
 */
interface JetControl {

    public static function setControl(?object $control) : void;

    public static function setFile(?string $filename) : void;

    public static function getFile();   
    
    public static function setData() : void;

    public static function getData();
}