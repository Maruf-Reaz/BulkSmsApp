<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <?php flash('post_message') ?>
    <form action="<?php echo URLROOT; ?>/items/add" method="post">
        <!--Names-->
        <label for="catagoy" class="col-sm-3 col-form-label">Select Catagory:</label>
        <select name="catagoy" id="catagoy" class="form-control" required>
            <option value="" selected>select a value</option>
            <?php foreach ($data['items'] as $item): ?>
                <option value="<?php echo $item->catagory_name ?>"><?php echo $item->catagory_name; ?></option>
            <?php endforeach; ?>
        </select>
        <!--Submit-->
        <input type="submit" class="btn btn-suucess" value="Submit">
    </form>
    <br>
    <!--<table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Catagory Name</th>
        </tr>
        </thead>
        <tbody>
        <?php /*foreach ($data['items'] as $item): */?>
            <tr>
                <td><?php /*echo $item->id; */?></td>
                <td><?php /*echo $item->name; */?></td>
                <td><?php /*echo $item->company_name; */?></td>
                <td><?php /*echo $item->catagory_name; */?></td>
            </tr>
        <?php /*endforeach; */?>
        </tbody>
    </table>-->
</div>

<script>
    $(document).ready(function () {

        $("#catagoy").change(function () {
            var catagoy = $(this).val();
            var dataString = 'catagory=' + catagoy;
            console.log(dataString);
            $.ajax({
                type: "POST",
                dataType: 'json',
                url: "http://localhost/items/searchItemsByCatagory",
                data: dataString,
                //cache: false,
                success: function (object) {
                    console.log(object);
                }
            });

        });
    });
</script>
<?php require APPROOT . '/views/inc/footer.php'; ?>
