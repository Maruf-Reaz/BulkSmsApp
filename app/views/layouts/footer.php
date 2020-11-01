<!-- footer-->
<footer class="footer">
    <div class="row">
        <div class="col-md-12">
            <div class="copyright">
                <p>Copyrights &copy; 2018 All Rights Reserved by <a target="_blank" href="http://www.emanagementsys.com">eManagementSystem</a></p>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- confirmation initialize-->
<script type="text/javascript">
    $('a.delete-confirm').confirm({
        content: "Are you sure you want to delete this item? This cannot be undone.",
        type: 'red',
        theme: 'supervan',
        typeAnimated: true,
    });
    $('a.delete-confirm').confirm({

        buttons: {
            hey: function() {
                location.href = this.$target.attr('href');
            }
        }

    });
</script>

<script type="text/javascript">
    $('.alert-okay').on('click', function() {
        $.alert({
            title: 'Alert!',
            content: 'This is an alert! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel fugit, quasi sequi aliquid ex fuga, similique officiis!',
            /*backgroundDismiss: true,*/
            typeAnimated: true,
            theme: 'supervan',
            smoothContent: true,
            closeIcon: true,
        });
    });
</script>

<!-- Bootstrap CSS-->
<script src="<?php echo URLROOT; ?>/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>


<!-- Animation scroll select2 -->
<script src="<?php echo URLROOT; ?>/vendor/animsition/animsition.min.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/select2/select2.min.js"></script>


<!-- date picker clock picker week picker-->
<script src="<?php echo URLROOT; ?>/vendor/datepicker/datepicker.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/datepicker/main.js"></script>
<script src="<?php echo URLROOT; ?>/js/jquery-clockpicker.js"></script>
<script src="<?php echo URLROOT; ?>/js/bootstrap-datepicker.js"></script>


<!-- Calendar-->
<script src="<?php echo URLROOT; ?>/vendor/calendar/moment.min.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/calendar/fullcalendar.min.js"></script>
<script src="<?php echo URLROOT; ?>/vendor/calendar/fullcalendar-init.js"></script>


<!--Flash msg with animation-->
<link rel="stylesheet" href="<?php echo URLROOT; ?>/vendor/flash-msg/animate.min.css">
<script src="<?php echo URLROOT; ?>/vendor/flash-msg/bootstrap-notify.min.js"></script>
<!--<script>
    $(function() {
        $(".notifyalert").on("click", function() {
            $.notify({
                title: '<strong>Greetings!</strong>',
                icon: 'fas fa-user-graduate ',
                url: 'https://www.emanagementsys.com/',
                target: '_blank',
                message: "Welcome to Education Management System!"
            }, {
                type: 'danger',
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
            });
        });
    });
</script>-->

<!-- main js-->
<script src="<?php echo URLROOT; ?>/js/main.js"></script>


</body>

</html>