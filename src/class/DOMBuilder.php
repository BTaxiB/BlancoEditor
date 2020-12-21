<?php

namespace  BlancoEditor\Boot;

use BlancoEditor\Template\Core;
use DOMDocument;

class DOMBuilder implements Core
{
    protected static DOMDocument $document;

    public function __construct() {
        $this->setDom();
    }

    public static function textEditor(?string $data) : DOMDocument
    {
        $document = self::getDom()->createElement('textarea', $data);

        return $document;
    }

    public static function setDom() : void
    {
        self::$document = new DOMDocument();
    }

    public static function getDom() : DOMDocument
    {
        return self::$document;
    }
}
