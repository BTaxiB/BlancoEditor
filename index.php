<?php include 'layouts/header.php';?>

<div class="row main">
    <!-- <input type="text" name="searchFile"> -->
    <div class="message-box" id="response">
    </div>
    <div id="fileTitle" class="h3"></div>
    <div class="editor">
        <select id='files' class='form-control w-50' onready="" onchange='load();'></select>
        <form method="post" id="editor" class="form-control col-6" onkeydown="ctrlSave(event);"></form>
        <button class="form-control save">Save</button>
    </div>
</div>
<?php include 'layouts/footer.php';?>