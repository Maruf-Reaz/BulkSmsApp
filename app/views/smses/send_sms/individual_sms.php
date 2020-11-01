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
                <div id="sms_template" class="col-lg-6" style="margin : auto;">
                    <form action="<?php URLROOT ?>/Smses/sendIndividualSms" method="post">
                        <div class="drop-shadow x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="card-body">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title"><i class="fa fa-pencil-alt fa-lg"></i> Add SMS
                                                Template</h4>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input id="message" type="hidden"
                                                       value="<?php echo $data['message']; ?>">
                                                <div class="input-group-addon2">Phone No</div>
                                                <div class="input-group">
                                                    <input type="text" name="phone_no" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="input-group-addon2">Select Template</div>
                                            <div class="input-group">
                                                <select name="template_id" id="template_id" class="form-control ">
                                                    <option value="" selected="selected">Custom</option>
													<?php foreach ( $data['templates'] as $template ): ?>
                                                        <option value="<?php echo $template->id; ?>">
															<?php echo $template->title; ?>
                                                        </option>
													<?php endforeach; ?>
                                                </select>
                                                <span class="invalid-feedback">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Body</div>
                                            <div class="input-group">
                                                    <textarea name="body" class="form-control" id="sms_body"
                                                              rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Send Sms</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        $(document).ready(function() {

            $("#template_id").change(function () {
                var template = $(this).val();
                $("#sms_body").empty();
                // $("#data_table_body").empty();
                var dataString = 'template=' + template;
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    url: "/smses/getSmsBody",
                    data: dataString,
                    cache: false,
                    success: function (objects) {
                        console.log(objects);
                        if (objects.length === 0) {
                        } else {
                            document.getElementById("sms_body").innerHTML = objects.body;
                        }
                    }

                });

            });


            var message = $("#message").val()
            if (message != 1) {
                $.notify({
                    title: '<strong>Prompt!</strong>',
                    icon: 'fas fa-check-double',
                    message: message,
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
                    delay: 3000,
                });

            }


            $(function() {

                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function(element) {
                        $(element)
                            .closest('.form-group')
                            .addClass('has-error');
                    },
                    unhighlight: function(element) {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error');
                    },
                    errorPlacement: function(error, element) {
                        if (element.prop('type') === 'checkbox') {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
                $("#register-form").validate({
                    rules: {
                        phone_no: {
                            required: true,
                            rangelength: [6, 24]
                        },
                        body: {
                            required: true
                        }
                    },
                    messages: {
                        name: {
                            required: 'Please enter phone number',
                        },
                        body: {
                            required: 'Please enter a message text',

                        },
                    }
                });
            });
        });
    </script>
<?php require APPROOT . '/views/layouts/footer.php' ?>