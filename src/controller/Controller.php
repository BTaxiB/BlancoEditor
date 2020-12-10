<?php

namespace JetRefacto\Controller;

use JetRefacto\Boot\Editor;
use JetRefacto\Template\JetControl;

class Controller implements JetControl
{
    protected static ?string $directory;
    protected static ?string $filename;

    public static function setFile(?string $filename) : void {
        self::$filename = $filename;
    }
    
    public static function getFile() {
        return self::$filename;
    }
}
