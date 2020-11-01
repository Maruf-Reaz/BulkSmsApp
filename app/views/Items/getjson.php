<?php require APPROOT . '/views/inc/header.php'; ?>


    <script>
        $(document).ready(function () {
            var company_id = 5

            var dataString = 'company_id=' + company_id;
            $.ajax
            ({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/items/getJson",
                data: dataString,
                cache: false,
                success: function (objects) {
                    console.log(objects)
                    //console.log(objects)
                }
            })
        });
    </script>

<?php require APPROOT . '/views/inc/footer.php'; ?>