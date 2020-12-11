<?php
require_once 'vendor/autoload.php';
use BlancoEditor\Boot\Editor as Editor;
use BlancoEditor\Boot\Tweaks as Tweaks;
use BlancoEditor\Controller\EditorController as test;

$test = new test;
$editor = new Editor;
$tweaks = new Tweaks;

$editor::setDirectory('test' ?? "");
DEFINE('FOLDER', $editor::getDirectory());
