 <!-- jQuery and JS bundle w/ Popper.js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="assets/editor.js"></script>
    <script type="text/javascript">
    $(document).ready(() => {
        loadSelect('<?php echo $directory; ?>');

        $.ajax({
            url: 'ajax.php',
            type: 'POST',
            dataType: 'text',
            data: {
                key: 'load',
                dir: "<?php echo $directory; ?>",
            },
            success: (response) => {
                $("#editor").html(response)
            }
        });

        // $("input[name='searchFile']").on('change', () => {
        //     var dir = "<?php echo $directory ?>";
        //     searchFile(dir);
        // });

        $(".save").click(() => {
            save();
        });
    });
    </script>
</body>

</html>