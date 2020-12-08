<!-- jQuery and JS bundle w/ Popper.js -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
</script>
<script src="assets/js/editor.js"></script>
<script src="assets/js/tweaks.js"></script>
<script src="assets/js/targets.js"></script>
<script>
loadSelectP("<?php echo FOLDER; ?>");
initEditor("<?php echo FOLDER; ?>");
initTweaks("<?php echo FOLDER; ?>");
</script>
</body>

</html>