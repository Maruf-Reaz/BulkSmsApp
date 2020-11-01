<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
    <?php flash('post_message') ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Catagory Name</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data['items'] as $item): ?>
            <tr>
                <td><?php echo $item->id; ?></td>
                <td><?php echo $item->name; ?></td>
                <td><?php echo $item->company_name; ?></td>
                <td><?php echo $item->catagory_name; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
