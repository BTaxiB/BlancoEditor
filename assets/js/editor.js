

function convertP(self) {
    self.innerHTML = self.value;
};

function ctrlSaveP(e) {
    switch (e) {
        case e.key === 's' && e.ctrlKey:
            save();
            e.preventDefault();
            return false;

        // case e.key === 'f' && e.ctrlKey && e.shiftKey:
        //     $("input[name='searchFile']").show();
        //     e.preventDefault();
        //     return false;
    
        default:
            break;
    }
}

function loadP() {
    var title = $("#files option:selected").html();
    var filename = $("#files option:selected").val();
    $.ajax({
        url: 'test.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'showP',
            file: filename
        },
        success: (response) => {
            $("#editor").html(response)
            $("#fileTitle").html(title)
        }

    });
}

function saveP(){
    var code = $("#editor").text();
    var file = $("#filename").val();
    $.ajax({
        url: 'test.php',
        type: 'POST',
        dataType: 'json',
        data: {
            key: 'saveP',
            data: code,
            file: file
        },
        success: (response) => {
            $("#editor").html(response.html)
            $("#response").show();
            $("#response").addClass("alert alert-success");
            $("#response").text(response.message);
            setTimeout(() => {
                $("#response").hide();
            }, 1000);
        }
    });
}

function searchFileP(dir) {
    console.log($("input[name='searchFile']").val())
    $.ajax({
        url: 'ajaxP.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'searchP',
            dir: dir,
            file: $("input[name='searchFile']").val()
        },
        success: (response) => {
            var select = document.getElementById("files");
            select.size = response.size;
            select.innerHTML = response.html
        }

    });
}

function loadSelectP(dir) {
    $.ajax({
        url: 'test.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadSelectP',
            dir: dir,
        },
        success: (response) => {
            $("#files").html(response);
            $("#fileTitle").html($("#files option:selected").html());
        }
    });
}