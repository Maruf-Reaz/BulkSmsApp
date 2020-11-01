<?php require APPROOT . '/views/layouts/header.php' ?>
	<!--Mobile header with Nav bar and notification bar-->
<?php require APPROOT . '/views/layouts/mobile_header.php' ?>
	<!--Menu Sidebar with nav bar-->
<?php require APPROOT . '/views/layouts/menu_sidebar.php' ?>
	<!--Desktop header with nav bar and header file-->
<?php require APPROOT . '/views/layouts/desktop_header.php' ?>

	<style>
		.dropdown-menu {
			margin: -31px -106px 0;
		}
		.filters {
			background-image: none;
		}
	</style>

	<div class="main-content">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="x_panel au-card au-card au-card--no-pad m-b-40">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="filters">
										<h4 style="float:left; color:#888;padding-top: 7px;">SMS History</h4>
									</div>
									<div class="x_content">
										<div class="table-responsive">

											<table id="example2" class="table table-striped jambo_table bulk_action">
												<thead>
												<tr class="headings">
													<th class="column-title">#</th>
													<th class="column-title">Total Sms Recipient</th>
													<th class="column-title">Sent Time</th>
													<th class="column-title">Message Body</th>
												</tr>
												</thead>
												<tbody id="data_table_body">
												<?php $i = 0;
												foreach ( $data['sms_histories'] as $sms_history ): ?>

													<tr class="even pointer">
														<input type="hidden" name="id">
														<td>
															<?php echo $i += 1 ?>
														</td>
														<td>
															<?php echo $sms_history->total_recipients ?>
														</td>
														<td>
															<?php echo $sms_history->time ?>
														</td>
														<td>
															<?php echo $sms_history->sent_message ?>
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

	<script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {

            $('#example2').DataTable({

                "pagingType": "full_numbers",

                stateSave: true,

                "dom": 'tB<"right"rpl>',

                buttons: [{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                ]
            });
            $('#example2 tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search" class="form-control bottom-search"/>');
            });

            // DataTable
            var table = $('#example2').DataTable();

            // Apply the search
            table.columns().every(function() {
                var that = this;

                $('input', this.footer()).on('keyup change', function() {
                    if (that.search() !== this.value) {
                        that
                            .search(this.value)
                            .draw();
                    }
                });
            });
            $('#example2 tfoot tr').insertAfter($('#example2 thead tr'));
        });
	</script>
<?php require APPROOT . '/views/layouts/footer.php' ?>