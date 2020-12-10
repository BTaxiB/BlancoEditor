<?php

namespace JetRefacto\Boot;

use JetRefacto\Template\Document;

class GeneralOptions implements Document
{
    /**Working file directory. */
    protected static ?string $directory;

    public static function setDirectory($directory) : void
    {
        self::$directory = $directory;
    }

    public static function getDirectory() : string
    {
        return self::$directory;
    }

    public static function readFile(?string $filename) : array
    {
        return file($filename, FILE_IGNORE_NEW_LINES);
    }

    public static function make(array $data) : void
    {
        foreach ($data as $d) {
            echo htmlspecialchars_decode($d);
        }
    }

    public static function format(string $data) : string
    {
        $data = htmlspecialchars_decode($data);
        $data = strip_tags($data) . PHP_EOL;
        $data = str_replace('phptag', '<?php ' . PHP_EOL, $data);
        return $data;
    }

    public static function save(string $file, string $data, string $mode = "w") : string
    {
        $handle = fopen($file, $mode) or die("Can't open file for writing.");
        fwrite($handle, $data);
        fclose($handle);
        $filename = basename($file);
        return str_replace(".php", "", "Edited {$filename} successfully!");
    }

    public static function getCommands() : array
    {
        return scandir(self::getDirectory());
    }

    public static function getFile(string $file) : array
    {
        $folder = self::getCommands();
        $data = [];
        foreach ($folder as $d) {
            $check = strtolower(basename($d));
            if (stristr($check, strtolower($file))) {
                $data[] = $file;
            }
        }
        return $data;
    }

    public static function selectFile() : array
    {
        $data = [];
        $directory = self::getDirectory();
        $options = self::getCommands();

        foreach ($options as $o) {
            if ($o !== '.' && $o !== '..') {
                $label = str_replace("Command.php", "", $o);
                $data[] = "<option value='{$directory}/{$o}'>$label</option>";
            }
        }
        return $data;
    }

    public static function selectBox() : void
    {
        foreach (self::selectFile(self::getDirectory()) as $option) {
            echo $option;
        }
    }
}
