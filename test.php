<?php
require_once 'src/Bootstrap.php';

if (isset($_POST['key'])) {
    $test::setDirectory(FOLDER);
    switch ($_POST['key']) {
        case 'saveP':
           $test->edit();
           break;

        case 'loadP':
            $test->initForm();
            break;

        case 'loadSelectP':
            $test->initSelect();
            break;

        case 'showP':
            echo $test->show();
            break;
        
        default:
            die("Testing AJAX Handler failed!");
            break;
    }
}
