<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/24/2018
 * Time: 12:29 PM
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
                <div class="col-md-8 col-lg-12" style="margin-top: 50px">
                    <div class="card" style="margin-top: 0px;">
                        <div class="card-body">
                            <!-- <h4 class="box-title">Chandler</h4> -->
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
        </div><!-- /.card -->
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php' ?>
