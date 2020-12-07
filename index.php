<?php include 'layouts/header.php';?>

<div class="row main">
    <!-- <input type="text" name="searchFile"> -->
    <div class="switch border border-primary">
        <div class="windowP">
        <label for="windowP" id="windowP" class="label label-default">Editor</label><br>
    </div>
    <div class="windowT">
        <label for="windowT" id="windowT" class="label label-default">Tweaks</label><br>
    </div>
    </div>

    <div class="message-box" id="response">
    </div>
    <!---------
    Path editor
    ---------->
    <?php include 'layouts/partials/editor.html';?>
    <!-------->
    <!---------
        Tweaks
    ---------->
    <?php include 'layouts/partials/tweaks.html';?>
    <!-------->

</div>
<?php include 'layouts/footer.php';?>