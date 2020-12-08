$(document).ready(() => {
    loadSelectP('<?php echo $directory; ?>');

    $.ajax({
        url: 'ajaxP.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadP',
            dir: "<?php echo $directory; ?>",
        },
        success: (response) => {
            $("#editor").html(response)
        }
    });

    $.ajax({
        url: 'ajaxT.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadT',
            dir: "<?php echo $directory; ?>",
        },
        success: (response) => {
            $("#tweaks").html(response)
        }
    });

    $("#files").on('change', () => {
        loadP();
    });

    ("#editor").on('keydown', (event) => {
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