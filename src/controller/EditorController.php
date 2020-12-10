<?php

namespace JetRefacto\Controller;

use JetRefacto\Boot\Editor;

class EditorController extends Controller
{
    // protected static ?string $directory;
    protected static ?string $filename;
    protected static ?object $control;
    protected static ?string $content;
    protected static ?string $message;

    public function __construct()
    {
        self::setControl(new Editor);
    }

    public static function toJSON($data)
    {
        echo json_encode($data);
    }

    public static function saveFile()
    {
        return self::$control::save(self::getFile(), self::getData());
    }


    public function edit()
    {
        //$this->control::format($_POST['data'], self::getFile())
        self::setData();
        self::toJSON([
            'html' => self::getData(),
            'message' => self::saveFile(),
        ]);
    }
}
