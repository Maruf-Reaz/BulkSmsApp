<?php require APPROOT . '/views/inc/header.php'; ?>
    <a href="<?php echo URLROOT; ?>/posts/index" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
    <div class="card card-body bg-light mt-5">
        <h2>Add an Item</h2>
        <p>Register an item with this form</p>
        <form action="<?php echo URLROOT; ?>/items/add" method="post">
            <!--Names-->
            <div class="form-group">
                <label for="title">Name: <sup>*</sup></label>
                <input type="text" name="name" id=""
                       class="form-control form-control-md <?php echo ! empty($data['name_error']) ? 'is-invalid' : '' ?>"
                       value="<?php echo $data['name']; ?>">
                <span class="invalid-feedback"><?php echo $data['name_error']; ?> </span>
            </div>
            <!--Company Name-->
            <div class="form-group">
                <label for="title">Company Name: <sup>*</sup></label>
                <input type="text" name="company_name" id=""
                       class="form-control form-control-md <?php echo ! empty($data['company_name_error']) ? 'is-invalid' : '' ?>"
                       value="<?php echo $data['company_name']; ?>">
                <span class="invalid-feedback"><?php echo $data['company_name_error']; ?> </span>
            </div>
            <!--Catagory Name-->
            <div class="form-group">
                <label for="title">Catagory Name: <sup>*</sup></label>
                <input type="text" name="catagory_name" id=""
                       class="form-control form-control-md <?php echo ! empty($data['catagory_name_error']) ? 'is-invalid' : '' ?>"
                       value="<?php echo $data['catagory_name']; ?>">
                <span class="invalid-feedback"><?php echo $data['catagory_name_error']; ?> </span>
            </div>
            <!--Submit-->
            <input type="submit" class="btn btn-suucess" value="Submit">
        </form>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>