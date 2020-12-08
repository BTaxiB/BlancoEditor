$(document).ready(() => {
    $("#files").on('change', () => {
        loadP();
    });

    $("#editor").on('keydown', (event) => {
        ctrlSaveP(event);
    });

    $("#windowT").on('click', () => {
        $("#path").hide();
        $("#tweaks").show();
        $("#path").hide();
    });

    $("#windowP").on('click', () => {
        $("#tweaks").hide();
        $("#path").show();
        $("#tweaks").hide();
    });

    // $("input[name='searchFile']").on('change', () => {
    //     var dir = "<?php echo $directory ?>";
    //     searchFile(dir);
    // });

    $(".save").click(() => {
        saveP();
    });
});

function initEditor(dir) {
    return $.ajax({
        url: 'ajaxP.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadP',
            dir: dir,
        },
        success: (response) =>{
            $("#editor").html(response)
        }
    });
}

function initTweaks(dir) {
    return $.ajax({
        url: 'ajaxT.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadT',
            dir: dir,
        },
        success: (response) =>{
            $("#tweaks").html(response)
        }
    });
}
