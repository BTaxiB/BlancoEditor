<?php

namespace JetRefacto\Controller;

use JetRefacto\Boot\Editor;

class EditorController extends Controller {
    // protected static ?string $directory;
    protected static ?string $filename;
    protected static ?object $control;
    protected static ?string $content;
    protected static ?string $message;

    public function __construct() {
        self::setControl(new Editor);
    }

    public static function toJSON($data) {
        echo json_encode($data);
    }

    public static function saveFile($data) {
        return self::$control::save(self::getFile(), $data);
    }

    public function edit() {
        $data = $this->control::format($_POST['data'], $_POST['file']);
        $message = $this->control::save($_POST['file'], $data);
        $file = $this->control::getData($_POST['file']);

        self::getFile();

        self::toJSON([
            'html' => $file,
            'message' => $message,
        ]);
    }
}