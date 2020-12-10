<?php
require_once 'src/Bootstrap.php';
if (isset($_POST['key'])) {
    if ($_POST['key'] == 'saveP') {
        $data = $editor::format($_POST['data'], $_POST['file']);
        $message = $editor::save($_POST['file'], $data);
        $file = $editor::getData($_POST['file']);

        /**
         * todo later
         */
        // if(system('git add .')){
        //     if(system("git commit -m 'Edited {$_POST['file']} by USERNAME'")){
        //         $status = system('git push origin uploaderi');
        //     }
        // }
        // ($status) ? $message = "Edited {$_POST['file']} successfully" : die('Failed to push');

        // var_dump($file);
        echo json_encode([
            'html' => $file,
            'message' => $message,
        ]);
    }

    if ($_POST['key'] == 'showP') {
        echo $editor::make($editor::getData($_POST['file']));
    }

    if ($_POST['key'] == 'loadP') {
        $files = $editor::getCommands(FOLDER);
        echo $editor::make($editor::getData(FOLDER."/{$files[2]}"));
    }

    if ($_POST['key'] == 'loadSelectP') {
        $editor::selectBox(FOLDER);
    }

    if ($_POST['key'] == 'selectP') {
        $options = $editor::getCommands(FOLDER);

        foreach ($options as $o) {
            if ($o !== '.' && $o !== '..') {
                $label = basename($o);
                echo "<option value='".FOLDER."/{$o}'>$label</option>";
            }
        }
    }

    if ($_POST['key'] == 'search') {
        $options = $editor::getFile(FOLDER, $_POST['file']);
        $size = count($options);
        $html = "" ?? null;
        foreach ($options as $o) {
            $html .= "<option value='".FOLDER."/{$o}.php'>$o</option>";
        }

        echo json_encode(['html' => $html, 'size' => $size]);
    }
}
