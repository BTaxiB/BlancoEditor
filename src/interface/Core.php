<?php

namespace BlancoEditor\Template;

use DOMDocument;

interface Core
{

    public static function setDOM() : void;

    public static function getDOM() : DOMDocument;

    public static function textEditor(?string $data) : DOMDocument;
}
