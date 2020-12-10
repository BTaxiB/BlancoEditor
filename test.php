<?php
require_once 'src/Bootstrap.php';

if (isset($_POST['key'])) {
    switch ($_POST['key']) {
        case 'saveP':
           $control->edit();
           break;

        case 'loadP':
            $control->initForm();
            break;

        case 'loadSelectP':
            $control->initSelect();
            break;

        case 'showP':
            echo $control->show();
            break;
        
        default:
            die("Testing AJAX Handler failed!");
            break;
    }
}
