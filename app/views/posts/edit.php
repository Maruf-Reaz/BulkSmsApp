<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts/" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Edit Post</h2>
        <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
            <!--TitleS-->
            <div class="form-group">
                <label for="title">Title: <sup>*</sup></label>
                <input type="text" name="title" id=""
                       class="form-control form-control-md <?php echo ! empty($data['title_error']) ? 'is-invalid' : '' ?>"
                       value="<?php echo $data['title']; ?>">
                <span class="invalid-feedback"><?php echo $data['title_error']; ?> </span>
            </div>
            <!--Body-->
            <div class="form-group">
                <label for="title">Body: <sup>*</sup></label>
                <textarea name="body" id=""
                          class="form-control form-control-md <?php echo ! empty($data['body_error']) ? 'is-invalid' : '' ?>"
                ><?php echo $data['body']; ?></textarea>
                <span class="invalid-feedback"><?php echo $data['body_error']; ?> </span>
            </div>
            <!--Submit-->
            <input type="submit" class="btn btn-suucess" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>