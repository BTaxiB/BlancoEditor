<?php

namespace Source;

class Tweaks
{
    public static function format($data)
    {
        $data = htmlspecialchars_decode($data);
        $data = strip_tags($data) . PHP_EOL;
        $data = str_replace('phptag', '<?php ' . PHP_EOL, $data);
        return $data;
    }

    public static function save($file, $data, $mode = "w")
    {
        $handle = fopen($file, $mode) or die("Can't open file for writing.");
        fwrite($handle, $data);
        fclose($handle);
        $filename = basename($file);
        return str_replace(".php", "", "Edited {$filename} successfully!");
    }

    public static function make($data)
    {
        foreach ($data as $d) {
            echo htmlspecialchars_decode($d);
        }
    }

    public static function getData($filename)
    {
        $lines = file($filename, FILE_IGNORE_NEW_LINES);
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

    public static function getCommands($directory)
    {
        return scandir($directory);
    }

    public static function getFile($directory, $file)
    {
        $folder = self::getCommands($directory);
        $data = [];
        foreach ($folder as $d) {
            $check = strtolower(basename($d));
            if (stristr($check, strtolower($file))) {
                $data[] = $file;
            }
        }
        return $data;
    }

    public static function selectFile($directory)
    {
        $data = [];
        $options = self::getCommands($directory);

        foreach ($options as $o) {
            if ($o !== '.' && $o !== '..') {
                $label = str_replace("Command.php", "", $o);
                $data[] = "<option value='{$directory}/{$o}'>$label</option>";
            }
        }
        return $data;
    }

    public static function selectBox($directory)
    {
        foreach (self::selectFile($directory) as $option) {
            echo $option;
        }
    }
}
