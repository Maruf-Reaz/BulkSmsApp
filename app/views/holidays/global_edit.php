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
                                        <i class="fa fa-pencil-alt"></i>Update Global Holiday</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?php URLROOT ?>/holidays/holidays/update"
                                          enctype="multipart/form-data"
                                          method="post" id="register-form">

                                        <div class="form-group">
                                            <div class="input-group-addon2">Holiday Type</div>
                                            <div class="input-group">
                                                <select name="type_id" class="form-control" required>
                                                    <option value="" selected="selected">Select</option>
													<?php foreach ( $data['holiday_types'] as $holiday_types ): ?>
														<?php if ( $holiday_types->id == $data['holiday']->type_id ): ?>
                                                            <option selected
                                                                    value="<?php echo $holiday_types->id ?>"><?php echo $holiday_types->name; ?></option>
														<?php else: ?>
                                                            <option value="<?php echo $holiday_types->id ?>"><?php echo $holiday_types->name; ?></option>
														<?php endif; ?>
													<?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $data['holiday']->id; ?>">
                                        <!--Name-->
										<?php if ( $data['holiday']->name ): ?>
                                            <div class="form-group">
                                                <div class="input-group-addon2">Name</div>
                                                <div class="input-group">
                                                    <input placeholder="Name" type="text" name="name"
                                                           class="form-control"
                                                           value="<?php echo $data['holiday']->name; ?>" required>
                                                </div>
                                            </div>
										<?php endif; ?>
                                        <!--Remarks-->
                                        <div class="form-group">
                                            <div class="input-group-addon2">Remarks</div>
                                            <div class="input-group">
                                                <input placeholder="Name" type="text" name="remarks"
                                                       value="<?php echo $data['holiday']->remarks; ?>"
                                                       class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">From Date</div>
                                            <div class="input-group">
                                                <input id="date" name="from_date" required
                                                       value="<?php echo $data['holiday']->from_date; ?>"
                                                       class="form-control datepicker" type="text"
                                                       placeholder="Date"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group-addon2">To Date</div>
                                            <div class="input-group">
                                                <input id="date" name="to_date" required
                                                       value="<?php echo $data['holiday']->to_date; ?>"
                                                       class="form-control datepicker" type="text"
                                                       placeholder="Date"
                                                       autocomplete="off">
                                            </div>
                                        </div>
                                        <!--Recurrence-->
                                        <div class="form-group">
                                            <div class="input-group-addon2">Recurrence</div>
                                            <div class="input-group">
                                                <label class="radiobutton">Yes <input type="radio"
                                                                                      name="recurrence" <?php if ( $data['holiday']->recurrence == 1 ) {
														echo 'checked';
													} ?> value="1" required><span
                                                            class="radiocheckmark"></span></label>
                                                <label class="radiobutton">No <input type="radio"
                                                                                     name="recurrence" <?php if ( $data['holiday']->recurrence == 0 ) {
														echo 'checked';
													} ?>
                                                                                     value="0"><span
                                                            class="radiocheckmark"></span></label>
                                            </div>
                                        </div>
                                        <div class="form-actions form-group">
                                            <button type="submit" class="btn btn-primary">Update Holiday</button>
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
        //$('.datepicker').datepicker('setDate', new Date());
    });
</script>

<?php require APPROOT . '/views/layouts/footer.php' ?>
