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
        self::setData($this->control::format($_POST['data'], self::getFile()));

        self::toJSON([
            'html' => $this->control::getData(self::getFile()),
            'message' => $this->control::save(self::getFile(), self::getData()),
        ]);
    }
}
