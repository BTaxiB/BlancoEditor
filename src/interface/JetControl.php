<?php

namespace JetRefacto\Template;

/**
 * Logic with Ajax Handling
 */
interface JetControl {

    public static function setFile(?string $filename) : void;

    public static function getFile();
}