<!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="assets/editor.js"></script>
    <script src="assets/tweaks.js"></script>
    <script type="text/javascript">
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
    </script>
</body>

</html>