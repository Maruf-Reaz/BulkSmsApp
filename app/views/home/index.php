<?php /*require APPROOT . '/views/inc/header.php'; */?>
<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    card {
        margin-top: 0px;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
            $.notify({
                title: '<strong>Greetings!</strong>',
                icon: 'fas fa-comment-alt',
                url: 'https://www.emanagementsys.com/',
                target: '_blank',
                message: "Welcome to E-Management System!"
            }, {
                type: 'success',
                animate: {
                    enter: 'animated lightSpeedIn',
                    exit: 'animated lightSpeedOut'
                },
                placement: {
                    from: "top",
                    align: "right"
                },
                offset: {
                    x: 50,
                    y: 100
                },
                spacing: 10,
                z_index: 1031,
                delay: 3000,
            });
        });
</script>

<?php /*require APPROOT . '/views/inc/footer.php'; */?>
<?php require APPROOT . '/views/layouts/footer.php' ?>