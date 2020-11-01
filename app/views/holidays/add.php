<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/24/2018
 * Time: 12:30 PM
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
                                            <i class="fa fa-pencil-alt"></i>Holiday</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php URLROOT ?>/holidays/holidays/store"
                                              enctype="multipart/form-data"
                                              method="post" id="register-form">

                                            <div class="form-group">
                                                <div class="input-group-addon2">Holiday Type</div>
                                                <div class="input-group">
                                                    <select id="type_id" name="type_id" class="form-control" required>
                                                        <option value="" selected="selected">Select</option>
														<?php foreach ( $data['holiday_types'] as $holiday_type ): ?>
                                                            <option value="<?php echo $holiday_type->id; ?>"> <?php echo $holiday_type->name; ?></option>
														<?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!--Hidden Group-->
                                            <div class="form-group" id="has_group">

                                            </div>
                                            <!--Hidden Group Ends-->

                                            <div class="form-group">
                                                <div class="input-group-addon2">From Date</div>
                                                <div class="input-group">

                                                    <input id="date" name="from_date" required
                                                           class="form-control datepicker" type="text"
                                                           placeholder="Date"
                                                           autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group-addon2">To Date</div>
                                                <div class="input-group">

                                                    <input id="date" name="to_date" required
                                                           class="form-control datepicker" type="text"
                                                           placeholder="Date"
                                                           autocomplete="off">
                                                </div>
                                            </div>
                                            <!--<div class="form-group">
                                                <div class="input-group-addon2">Recurrence</div>
                                                <div class="input-group">
                                                    <label class="radiobutton">Yes <input type="radio" name="recurrence"
                                                                                          value="1" required><span
                                                                class="radiocheckmark"></span></label>
                                                    <label class="radiobutton">No <input type="radio" name="recurrence"
                                                                                         value="0" checked><span
                                                                class="radiocheckmark"></span></label>
                                                </div>
                                            </div>-->
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-primary">Add Holiday</button>
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

    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
            $('.datepicker').datepicker('setDate', new Date());

            $("#type_id").change(function () {
                var type_id = $(this).val();
                // $("#data_table_body").empty();
                $.post("http://localhost/holidays/Holidays/has-group", {type_id: type_id})
                    .done(function (objects) {
                        //console.log(objects)
                        if (objects == true) {
                            //Global Holiday
                            $("#has_group").empty();
                            $("#has_group").append(
                                '<div class="input-group-addon2"> Name </div>' +
                                '<div class="input-group">' +
                                '<input placeholder="ex- Independence Day , Victory Day " type="text" name="name" class="form-control" required>' +
                                '</div>' +
                                '<div class="input-group-addon2">Remarks </div>' +
                                '<div class="input-group">' +
                                '<input placeholder="ex-Bangladesh Became Independent On this day" type="text" name="remarks" class="form-control">' +
                                '</div>' +
                                '<div class="input-group-addon2">Recurrence </div>' +
                                '<div class="input-group">' +
                                '<label class="radiobutton">Yes <input type="radio" name="recurrence" value="1" required><span class="radiocheckmark"></span></label>' +
                                '<label class="radiobutton">No <input type="radio" name="recurrence" value="0" checked><span class="radiocheckmark"></span></label>' +
                                '</div>'
                            );
                        } else {
                            $("#has_group").empty();
                            var options = '';
                            $.each(objects, function (key, value) {
                                options += '<option value="' + value.id + '" class="text-center">' + value.name + '</option>';
                            })
                            $("#has_group").append(
                                '<div class="input-group-addon2">Select a Community </div>' +
                                '<div class="input-group">' +
                                '<select id="group_id" name="group_id" class="form-control" required>' +
                                '<option value="" selected="selected">Select</option>' +
                                options +
                                '</select>' +
                                '</div>' +
                                '<div class="input-group-addon2">Enter Registration Number </div>' +
                                '<div class="input-group">' +
                                '<input placeholder="ex- S012345" type="text" name="registration_no" class="form-control">' +
                                '</div>'
                            );
                            /*$("#group_id").change(function () {
                                var group_id = $(this).val();
                                var group_name = $(this).text();
                                // $("#data_table_body").empty();
                                if (group_name == 'Teacher') {
                                    $.post("http://localhost/holidays/Holidays/get-data-by-group", {group_id: group_id}).done(function (data) {
                                        if (data != null) {

                                        }
                                    });
                                }


                            });*/

                        }
                    });
            })
        });

    </script>

<?php require APPROOT . '/views/layouts/footer.php' ?>