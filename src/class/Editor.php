<?php

namespace BlancoEditor\Boot;

use BlancoEditor\Boot\GeneralOptions;

class Editor extends GeneralOptions
{
    public static function getData(string $filename)
    {
        $lines = self::readFile($filename);
        $data = [];
        $i = 0;
        for ($i = 0; $i < count($lines); $i++) {
            if ($i < 1) {
                $data[] = '<span hidden>phptag</span>';
                continue;
            }
            if (stristr($lines[$i], "//editable")) {
                $data[] = "<span>{$lines[$i]}</span>" . PHP_EOL;
                $editable = trim($lines[$i + 1]) ?? null;
                $data[] = '<textarea class="form-control editable" rows="2" cols="10" style="resize: none;" oninput="convertP(this);">' . $editable . '</textarea></br>' . PHP_EOL . PHP_EOL;
                $i = $i + 2;
            } elseif (trim($lines[$i]) == '') {
                $data[] = trim($lines[$i]);
            } else {
                $data[] = "<span hidden>{$lines[$i]}</span>" . PHP_EOL;
            }
        }

        $data[] = "<input type='hidden' id='filename' value='$filename'/>";

        return $data;
    }

 
}
