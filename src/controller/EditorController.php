<?php

namespace BlancoEditor\Controller;

use BlancoEditor\Boot\Editor;

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
     * @return string
     */
    public static function saveFile($data)
    {
        // $data = self::toString(self::getData());
        return self::getControl()::save(self::getFile(), $data);
    }


    /**
     * Save edited contents.
     * @return JSON
     */
    public function edit($data)
    {
        //$this->control::format($_POST['data'], self::getFile())
        // $data = self::toString(self::getData());
        $data = self::getControl()::format($data);
        self::setData();

        self::toJSON([
            'html' => self::getControl()::make(self::getData()),
            'message' => self::saveFile($data),
        ]);
    }

    /**
     * @return string
     */
    public function show()
    {
        self::setData();
        return self::getControl()::make(self::getData());
    }

    
    /**
     * @return void
     */
    public function initSelect()
    {
        self::getControl()::selectBox(self::getDirectory());
    }

    /**
     * @return void
     */
    public function initForm()
    {
        $files = self::getControl()::getCommands(self::getDirectory());
        self::getControl()::make(self::getControl()::getData(self::getDirectory()."/{$files[2]}"));
    }
}
