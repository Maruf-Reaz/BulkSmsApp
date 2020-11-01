<?php require APPROOT . '/views/layouts/header.php' ?>
    <!--Mobile header with Navbar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
    <!--Menu Sidebar with navbar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
    <!--Desktopn header with navbar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>


    <style>
        .filters {
            background: none;
        }

        textarea.form-control {
            border-radius: 5px;
        }

        #check_table {
            margin-bottom: 50px;
        }

        .filters h4 {
            float: left;
            color: #888;
            padding-top: 7px;
            padding-bottom: 7px;
        }

        .filters h4 i {
            padding-right: 10px;
        }

        .headings th label {
            font-size: 13px;
            margin-bottom: 0px;
        }

        .headings th label span {
            display: none;
        }

        td.tickmark {
            width: 200px;
            padding-top: 6px;
            padding-bottom: 29px;
        }

        td.tickmark label.au-checkbox {
            font-size: 13px;
            margin-bottom: 0px;
        }

        div.top-space {
            margin-top: 50px;
        }

        .col-lg-6 {
            padding: 0 10px;
        }
    </style>
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4" style="margin: auto">
                        <div class="drop-shadow x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="card-body">
                                        <form enctype="multipart/form-data"
                                              action="<?php URLROOT ?>/Smses/showRecipient" method="post">
                                            <div class="form-group">
                                                <div class="input-group-addon2">Upload Excel File</div>
                                                <div class="input-group">
                                                    <input id="message" type="hidden"
                                                           value="<?php echo $data['message']; ?>">
                                                    <input type="file" name="file" class="custom-file-input">
                                                    <label class="custom-file-label" for="validatedCustomFile">Select
                                                        File</label>
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="sms_template" class="col-lg-6" style="margin-bottom: 20px;">
                        <form id="register-form" action="<?php URLROOT ?>/Smses/submitRecipients" method="post">
                            <div class="drop-shadow x_panel au-card au-card au-card--no-pad m-b-40">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="card-body">
                                            <div class="card-header card-header-primary">
                                                <h4 class="card-title"><i class="fa fa-pencil-alt fa-lg"></i> Add SMS
                                                    Template</h4>
                                            </div>
                                            <div class="form-group">
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
                                                <button id="send" type="submit" class="btn btn-primary">Send Sms
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div id="check_table" class="col-lg-12">
                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                    <div class="filters">
                                        <h4><i class="fa fa-pencil-alt fa-lg"></i>Recipients
                                        </h4>
                                    </div>

                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table id="example2" class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Phone bumber</th>
                                                    <th>
                                                        <a id="check" class="btn btn-success">Check All </a>
                                                        <a id="uncheck" class="btn btn-danger">UnCheck All </a>
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
												<?php $i = 0;
												if ( $data['csv'] == null ): ?>
                                                <tr>
                                                    <td colspan="3" class="text-center alert alert-danzer">No File
                                                        is Selected
                                                    </td>
                                                </tr
                                                </tbody>
                                            </table>
											<?php else: ?>
												<?php foreach ( $data['csv'] as $recipient ): ?>
                                                    <tr class="even pointer">
                                                        <td>
															<?php echo $i += 1 ?>
                                                        </td>
                                                        <td>
															<?php echo $recipient[0]; ?>
                                                        </td>
                                                        <td class="tickmark">
                                                            <label class="au-checkbox">
                                                                <input type="checkbox"
                                                                       value="<?php echo $recipient[0]; ?>"
                                                                       name="send_checkbox[]">
                                                                <span class="au-checkmark"></span>
                                                            </label>
                                                        </td>
                                                        <input type="hidden" id="send_status[]" value="0">
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                                </table>
											<?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var count = 0;
        $(document).ready(function () {


           /* $('#example2').DataTable({
                "pagingType": "full_numbers",
                "dom": 'tB<"right"pl>',
                "pageLength": 100,
                buttons: [
                ]
            });*/

            $(function () {
                $.validator.setDefaults({
                    errorClass: 'help-block',
                    highlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .addClass('has-error');
                    },
                    unhighlight: function (element) {
                        $(element)
                            .closest('.form-group')
                            .removeClass('has-error');
                    },
                    errorPlacement: function (error, element) {
                        if (element.prop('type') === 'checkbox') {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
                $("#register-form").validate({
                    rules: {
                        body: {
                            required: true,
                            remote: '/Smses/checkBody'
                        }
                    },
                    messages: {

                        body: {
                            required: 'Please enter an Sms body',

                        },
                    }
                });

            });
            $("#send").hide();
            var message = $("#message").val();
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
            $('[name="send_checkbox[]"]').change(function () {
                if ($(this).is(":checked")) {
                    count = count + 1;
                    $("#send").show();
                }
                else {
                    count = count - 1;
                }
                if (count == 0) {
                    //alert(count);
                    $("#send").hide();
                    $.notify({
                        title: '<strong>Prompt!</strong>',
                        icon: 'fas fa-check-double',
                        message: "No number is selected"
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

            });

            $("#check").change(function () {

                if ($(this).is(":checked")) {
                    $(":checkbox").prop('checked', true);

                } else {
                    $(":checkbox").prop('checked', false);
                    count = 0;
                    $("#send").hide();

                }

            });

            $("#check").click(function () {
                $(":checkbox").prop('checked', true);
                $("#send").show();
                count = 0;
                $.notify({
                    title: '<strong>Prompt!</strong>',
                    icon: 'fas fa-check-double',
                    message: "All Checked"
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
            $("#uncheck").click(function () {
                $(":checkbox").prop('checked', false);
                $("#send").hide();
                count = 0;
                $.notify({
                    title: '<strong>Prompt!</strong>',
                    icon: 'fas fa-check-double',
                    message: "All Unchecked"
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

            });


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

        });

    </script>

<?php require APPROOT . '/views/layouts/footer.php' ?>