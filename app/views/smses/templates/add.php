<?php require APPROOT . '/views/layouts/header.php' ?>
<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

<style>
    .col-lg-6, .col-md-6, .col-sm-6 {
         margin: auto;
    }
    .input-group textarea {
         border-radius: 5px;
    }
</style>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="drop-shadow x_panel au-card au-card au-card--no-pad m-b-40">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="card-body">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title"><i class="fa fa-pencil-alt"></i>Add SMS Template</h4>
                                    </div>
                                    <form action="<?php URLROOT ?>/Smses/addTemplate" enctype="multipart/form-data" method="post" id="register-form">
                                        <div class="form-group">
                                            <div class="input-group-addon2">Title</div>
                                            <div class="input-group">
                                                <input type="text" name="title" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">Body</div>
                                            <div class="input-group">
                                                <textarea name="body" class="form-control" id="exampleFormControlTextarea3" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add Template</button>
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
</div>
    <script>
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
                    title: {
                        required: true,
                        rangelength: [2, 12]
                    },
                    body: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: 'Please enter a Title',
                        rangelength: 'Title must have 2-12 characters',
                    },
                    body : {
                        required: 'Please enter an Sms body',

                    },
                }
            });

        });
    </script>
<?php require APPROOT . '/views/layouts/footer.php' ?>