<?php

namespace JetRefacto\Controller;

use JetRefacto\Boot\Editor;
use PDO;

class EditorController extends Controller
{
    protected static ?string $directory;
    protected static ?string $filename;
    protected static ?object $control;
    protected static ?string $content;
    protected static ?string $message;

    public function __construct()
    {
        self::setControl(new Editor);
    }

    /**
     * @return void
     */
    public static function toJSON(?array $data)
    {
        echo json_encode($data);
    }

    /**
     * @return string
     */
    public static function saveFile()
    {
        return self::$control::save(self::getFile(), self::getData());
    }


    /**
     * Save edited contents.
     * @return JSON
     */
    public function edit()
    {
        //$this->control::format($_POST['data'], self::getFile())
        self::setData();
        self::toJSON([
            'html' => self::getData(),
            'message' => self::saveFile(),
        ]);
    }

    /**
     * @return string
     */
    public function show()
    {
        return self::$control::make(self::getData());
    }

    
    /**
     * @return void
     */
    public function initSelect()
    {
        self::$control::selectBox(self::getDirectory());
    }

    /**
     * @return void
     */
    public function initForm()
    {
        $files = self::$control::getCommands(self::getDirectory());
        self::$control::make(self::$control::getData(self::getDirectory()."/{$files[2]}"));
    }
}
