<?php

namespace BlancoEditor\Boot;

use BlancoEditor\Boot\GeneralOptions;

class Editor extends GeneralOptions
{
    public static function getData(string $filename) : array
    {
        $lines = self::readFile($filename);
        $data = [];
        $i = 0;
        for ($i = 0; $i < count($lines); $i++) {
            if ($i < 1) {
                $data[] = self::hideContent("phptag");
                continue;
            }
            
            if (self::isEditable($lines[$i])) {
                $data[] = self::wrapComment($lines[$i]);
                $editable = trim($lines[$i + 1]);
                $data[] = self::wrapEditable($editable);
                $i = $i + 2;
            }
            
            if (self::isEmpty($lines[$i])) {
                $data[] = $lines[$i];
            } else {
                $data[] = self::hideContent($lines[$i]);
            }
        }
        $data[] = self::fileID($filename ?? null);

        return $data;
    }
}
