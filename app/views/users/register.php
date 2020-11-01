<?php require APPROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Create an Account</h2>
                <p>Please fill out this form to register with us</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <!--Name-->
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" id="" value="<?php echo $data['name']; ?>"
                               class="form-control form-control-md <?php echo ! empty($data['name_error']) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?php echo $data['name_error']; ?> </span>
                    </div>
                    <!--Email-->
                    <div class="form-group">
                        <label for="name">Email: <sup>*</sup></label>
                        <input type="email" name="email" id="" value="<?php echo $data['email']; ?>"
                               class="form-control form-control-md <?php echo ! empty($data['email_error']) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?> </span>
                    </div>
                    <!--Password-->
                    <div class="form-group">
                        <label for="name">Password: <sup>*</sup></label>
                        <input type="password" name="password" id="" value="<?php echo $data['password']; ?>"
                               class="form-control form-control-md <?php echo ! empty($data['password_error']) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?> </span>
                    </div>
                    <!--Confirm Password-->
                    <div class="form-group">
                        <label for="name">Confirm Password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" id="" value="<?php echo $data['confirm_password']; ?>"
                               class="form-control form-control-md <?php echo ! empty($data['confirm_password_error']) ? 'is-invalid' : '' ?>">
                        <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?> </span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Register" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light btn-block">Have an
                                account?Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>