<?php
require_once 'vendor/autoload.php';
use BlancoEditor\Controller\EditorController as test;

$test = new test;
DEFINE('FOLDER', $editor::getDirectory());
