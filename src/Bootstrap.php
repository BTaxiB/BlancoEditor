<?php
require_once 'vendor/autoload.php';
use JetRefacto\Boot\Editor as Editor;
use JetRefacto\Boot\Tweaks as Tweaks;
use JetRefacto\Controller\EditorController as test;

$test = new test;
$editor = new Editor;
$tweaks = new Tweaks;

$editor::setDirectory('test' ?? "");
DEFINE('FOLDER', $editor::getDirectory());
