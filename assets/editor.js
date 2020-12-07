

function display(self) {
    self.innerHTML = self.value;
};

function ctrlSave(e) {
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

function load() {
    var title = $("#files option:selected").html();
    var filename = $("#files option:selected").val();
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'show',
            file: filename
        },
        success: (response) => {
            $("#editor").html(response)
            $("#fileTitle").html(title)
        }

    });
}

function save(){
    var code = $("#editor").text();
    var file = $("#filename").val();
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'json',
        data: {
            key: 'save',
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

function searchFile(dir) {
    console.log($("input[name='searchFile']").val())
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'search',
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

function loadSelect(dir) {
    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        dataType: 'text',
        data: {
            key: 'loadSelect',
            dir: dir,
        },
        success: (response) => {
            $("#files").html(response);
            $("#fileTitle").html($("#files option:selected").html());
        }
    });
}