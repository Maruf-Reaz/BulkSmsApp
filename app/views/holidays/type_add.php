<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/24/2018
 * Time: 2:21 PM
 */
?>
<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6" style="margin:auto ">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="fa fa-pencil-alt"></i>Holiday Type</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php URLROOT ?>/holidays/holiday-types/store"
                                              enctype="multipart/form-data" method="post" id="register-form">
                                            <!--Name-->
                                            <div class="form-group">
                                                <div class="input-group-addon2">Name</div>
                                                <div class="input-group">
                                                    <input placeholder="Name" type="text" name="name"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <!--Short Form-->
                                            <div class="form-group">
                                                <div class="input-group-addon2">Short Form</div>
                                                <div class="input-group">
                                                    <input placeholder="eg-SL,PH" type="text" name="short_form"
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <!--End Name-->
                                            <div class="form-group">
                                                <div class="input-group-addon2">Is Group ? (Select 'Yes' If this type is
                                                    going to applied on Group)
                                                </div>
                                                <div class="input-group">
                                                    <label class="radiobutton">Yes <input type="radio" name="is_group"
                                                                                          value="1" required><span
                                                                class="radiocheckmark"></span></label>
                                                    <label class="radiobutton">No <input type="radio" name="is_group"
                                                                                         value="0" checked><span
                                                                class="radiocheckmark"></span></label>
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require APPROOT . '/views/layouts/footer.php' ?>