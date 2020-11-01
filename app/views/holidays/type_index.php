<?php
/**
 * Created by PhpStorm.
 * User: Imran
 * Date: 11/24/2018
 * Time: 3:47 PM
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
				<?php echo flash( 'holiday_type' ) ?>
                <div class="row">
                    <div class="col-lg-8" style="margin: auto">

                        <div class="x_panel au-card au-card au-card--no-pad m-b-40">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="au-card-title"
                                         style="background-image:url('<?php echo URLROOT; ?>/images/bg-title-01.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3><i class="zmdi zmdi-edit"></i>Holiday Types</h3>
                                    </div>
                                    <div class="filters">

                                        <a data-toggle="tooltip" onClick="window.print()" title="Excel"
                                           class="fa fa-file-excel" href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="PDF"
                                           class="fa fa-file-pdf" href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                        <a data-toggle="tooltip" onClick="window.print()" title="Print"
                                           class="fa fa-print" href="#"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>
                                        <a data-toggle="tooltip" title="Add Holiday Type" class="fa fa-plus"
                                           href="<?php echo URLROOT; ?>/holidays/holiday-types/add"
                                           style="float: right;padding-top: 8px;padding-right: 15px;font-size: 30px "></a>

                                    </div>
                                    <div class="x_content">
                                        <div class="table-responsive">
                                            <table id="" class="table table-striped jambo_table bulk_action">
                                                <thead>
                                                <tr class="headings">
                                                    <th class="column-title">S/N</th>
                                                    <th class="column-title">Name</th>
                                                    <th class="column-title">Short Form</th>
                                                    <th class="column-title">Is Group</th>
                                                    <th style="width: 100px;" class="column-title">Action</th>

                                                </tr>
                                                </thead>
                                                <tbody>
												<?php foreach ( $data['holiday_types'] as $key => $holiday_type ): ?>
                                                    <tr>
                                                        <td>
															<?php echo $key + 1; ?>
                                                        </td>
                                                        <td>
															<?php echo $holiday_type->name; ?>
                                                        </td>
                                                        <td>
		                                                    <?php echo $holiday_type->short_form; ?>
                                                        </td>
                                                        <td>
															<?php if ( $holiday_type->is_group == 1 ): ?>
                                                                Yes
															<?php else: ?>
                                                                No
															<?php endif; ?>
                                                        </td>
                                                        <td style="width: 100px;">
                                                            <div data-toggle="tooltip" title="View Options"
                                                                 class="btn-group">
                                                                <button style="padding-top: 2px;padding-bottom: 2px;"
                                                                        type="button" class="btn btn-default"
                                                                        data-toggle="dropdown" aria-expanded="false"><i
                                                                            class="fa fa-ellipsis-v"></i></button>
                                                                <ul class="dropdown-menu pull-right" role="menu"
                                                                    style="box-shadow: 0px 0px 20px 5px #888888;">
                                                                    <li>
                                                                        <a href="<?php echo URLROOT ?>/holidays/holiday-types/edit/<?php echo $holiday_type->id; ?>"><i
                                                                                    class="fa fa-edit fa-lg"></i>
                                                                            Edit</a></li>
                                                                    <li><a class="delete"
                                                                           data-confirm="Are you sure to delete this item?"
                                                                           href="<?php echo URLROOT ?>/holidays/holiday-types/delete/<?php echo $holiday_type->id; ?>"><i
                                                                                    class="fa fa-trash fa-lg"></i>
                                                                            Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
												<?php endforeach; ?>
                                                </tbody>
                                            </table>
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

<?php require APPROOT . '/views/layouts/footer.php' ?>