<?php /*require APPROOT . '/views/inc/header.php'; */?>
<?php require APPROOT . '/views/layouts/header.php' ?>

<style>
    .pos-a {
        position: absolute !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .c-red-500,
    .cH-red-500:hover {
        color: #f44336 !important;
    }

    .lh-1 {
        line-height: 1 !important;
    }

    .fw-900 {
        font-weight: 900 !important;
    }

    .mB-30 {
        margin-bottom: 30px !important;
    }

    .c-red-500,
    .cH-red-500:hover {
        color: #f44336 !important;
    }

    .lh-1 {
        line-height: 1 !important;
    }

    .fw-900 {
        font-weight: 900 !important;
    }

    .mB-30 {
        margin-bottom: 30px !important;
    }

    .c-grey-900,
    .cH-grey-900:hover {
        color: #313435 !important;
    }

    .c-grey-900,
    .cH-grey-900:hover {
        color: #212121 !important;
    }

    .fsz-lg {
        font-size: 22.4px !important;
        font-size: 1.4rem !important;
    }

    .tt-c {
        text-transform: capitalize !important;
    }

    .mB-10 {
        margin-bottom: 10px !important;
    }

    .c-grey-900,
    .cH-grey-900:hover {
        color: #313435 !important;
    }

    .c-grey-900,
    .cH-grey-900:hover {
        color: #212121 !important;
    }

    .fsz-lg {
        font-size: 22.4px !important;
        font-size: 1.4rem !important;
    }

    .tt-c {
        text-transform: capitalize !important;
    }

    .mB-10 {
        margin-bottom: 10px !important;
    }

    .c-grey-700,
    .cH-grey-700:hover {
        color: #72777a !important;
    }

    .c-grey-700,
    .cH-grey-700:hover {
        color: #616161 !important;
    }

    .fsz-def {
        font-size: 16px !important;
        font-size: 1rem !important;
    }

    .mB-30 {
        margin-bottom: 30px !important;
    }

    .c-grey-700,
    .cH-grey-700:hover {
        color: #72777a !important;
    }

    .c-grey-700,
    .cH-grey-700:hover {
        color: #616161 !important;
    }

    .fsz-def {
        font-size: 16px !important;
        font-size: 1rem !important;
    }

    .mB-30 {
        margin-bottom: 30px !important;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <center>
                   
                    <div class="pos-a t-0 l-0 bgc-white w-100 h-100 d-f fxd-r fxw-w ai-c jc-c pos-r p-30">
                        <div class="mR-60"><img alt="#" src="<?php echo URLROOT; ?>/images/icon/404.png"></div>
                        <div class="d-f jc-c fxd-c">
                            <h1 class="mB-30 fw-900 lh-1 c-red-500" style="font-size:60px">Access Denied !</h1>
                            <h3 class="mB-10 fsz-lg c-grey-900 tt-c">Oops! The page you are trying to access is restricted!</h3>
                            <p class="mB-30 fsz-def c-grey-700">You attempted to access the page that needs superior permission.</p>
                            <div><a href="<?php echo URLROOT; ?>/" type="primary" class="btn btn-primary">Go to Home</a></div>
                        </div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>


<?php /*require APPROOT . '/views/inc/footer.php'; */?>
<?php require APPROOT . '/views/layouts/footer.php' ?>