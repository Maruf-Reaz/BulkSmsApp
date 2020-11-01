<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php /*require APPROOT . '/views/layouts/mobile_header.php' */?>
<!--Menu Sidebar with navbar-->
<?php /*require APPROOT . '/views/layouts/menu_sidebar.php' */?>
<!--Desktopn header with navbar and header file-->
<?php /*require APPROOT . '/views/layouts/desktop_header.php' */?>

<style>
    .login-logo {
        width: 200px;
        margin: auto;
    }
    .login-logo a center img {
        width: 80%; margin: 30px 0;
    }
    .main-content {
        padding-top: 80px;
    }
    .au-input::placeholder {
        text-align: center;
    }
</style>

<!-- <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php /*flash('register_success') */?>
                <h2>Login</h2>
                <form action="<?php /*echo  URLROOT; */?>/users/login" method="post">

                    <div class="form-group">
                        <label for="name">Email: <sup>*</sup></label>
                        <input type="text" name="email" id=""
                               class="form-control form-control-md <?php /*echo ! empty($data['email_error']) ? 'is-invalid' : '' */?>">
                        <span class="invalid-feedback"><?php /*echo $data['email_error']; */?> </span>
                    </div>

                    <div class="form-group">
                        <label for="name">Password: <sup>*</sup></label>
                        <input type="password" name="password" id=""
                               class="form-control form-control-lg <?php /*echo ! empty($data['password_error']) ? 'is-invalid' : '' */?>">
                        <span class="invalid-feedback"><?php /*echo $data['password_error']; */?> </span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php /*echo URLROOT;*/?>/users/register" class="btn btn-light btn-block">No account?Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>-->
<div class="main-content">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <center>
                           <img src="<?php /*echo  URLROOT; */?>/images/icon/ems-2.png" alt="EMS Logo">
                        </center>
                    </a>
                </div>
                <div class="login-form">
                    <form action="" method="post">
                        <div class="form-group">
                            
                            <input class="au-input au-input--full <?php echo ! empty($data['email_error']) ? 'is-invalid' : '' ?>" type="email" name="email" placeholder="Email">
                            <span class="invalid-feedback">
                                <?php echo $data['email_error']; ?> </span>
                        </div>
                        <div class="form-group">
                            
                            <input class="au-input au-input--full <?php echo ! empty($data['password_error']) ? 'is-invalid' : '' ?>" type="password" name="password" placeholder="Password">
                            <span class="invalid-feedback">
                                <?php echo $data['password_error']; ?> </span>
                        </div>
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /*require APPROOT . '/views/inc/footer.php'; */?>
<?php require APPROOT . '/views/layouts/footer.php' ?>