<?php
require_once 'src/Bootstrap.php';

if (isset($_POST['key'])) {
    $test::setDirectory(FOLDER);
    $test::setFile($_POST['file'] ?? null);
    switch ($_POST['key']) {
        case 'saveP':
           echo $test->edit($_POST['data']);
           break;

        case 'loadP':
            $test->initForm();
            break;

        case 'loadSelectP':
            $test->initSelect();
            break;

        case 'showP':
            $test->show();
            break;
        
        default:
            die("Testing AJAX Handler failed!");
            break;
    }
}
