<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A complete Education Management System">
    <meta name="author" content="EMS | E-Management System">

    <!-- Title Page-->
    <title>EMS | A Complete Education Management System</title>
    <link rel="shortcut icon" href="<?php echo URLROOT; ?>/images/icon/favicon.ico">

    <!-- Fontfaces CSS-->
    <link href="<?php echo URLROOT; ?>/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/jquery-ui.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo URLROOT; ?>/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo URLROOT; ?>/css/style.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/material-dashboard.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/mobile.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/student.css" rel="stylesheet" media="all">

    <!-- date/clock picker-->
    <link href="<?php echo URLROOT; ?>/css/bootstrap-clockpicker.min.css" rel="stylesheet" media="all">
    <link href="<?php echo URLROOT; ?>/css/bootstrap-datepicker.css" rel="stylesheet" media="all">

    <!-- Calender-->
    <link href="<?php echo URLROOT; ?>/vendor/calendar/fullcalendar.min.css" rel="stylesheet" />

    <!-- jQuery-->
    <script src="<?php echo URLROOT; ?>/js/jquery-3.1.1.js"></script>
    <script src="<?php echo URLROOT; ?>/vendor/jquery-ui.min.js"></script>
    <script src="<?php echo URLROOT; ?>/js/jquery.validate.js"></script>
    <script src="<?php echo URLROOT; ?>/js/additional-methods.js"></script>

    <!-- Datatable-->
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/datatable/css/jquery.dataTables.css">
    <!--<link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/datatable/css/dataTables.bootstrap4.css">-->


    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT; ?>/datatable/css/buttons.dataTables.min.css">
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo URLROOT; ?>/datatable/css/buttons.colVis.min.js"></script>
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script>
        $(document).ready(function() {
            $('select.form-control').removeClass('form-control').addClass('custom-select');
        });
    </script>

    <!-- Datatable-Initialization-->
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {

            $('#example').DataTable({

                "pagingType": "full_numbers",

                stateSave: true,

                "dom": 'tB<"right"rpl>',


                /*dom: 'Bfrtp',*/

                /*sortable*/

                "columnDefs": [{
                    "searchable": true,
                    "orderable": false,
                    "targets": [0]
                }],
                "order": [
                    [0, 'asc']
                ],
                
                /*"columnDefs": [{
                    "searchable": false,
                    "targets": [0,5]
                }],*/

                /*Buttons*/

                /*lengthMenu: [
                    [10, 25, -1],
                    ['10 rows', '25 rows', '50 rows', 'Show all']
                ],*/

                buttons: [{
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, 2, 3, 4]
                        }
                    },
                    /*'pageLength'*/
                    /*, 'colvis'*/
                ]

            });
            $('#example tfoot th').each(function() {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search" class="form-control bottom-search"/>');
            });

            // DataTable
            var table = $('#example').DataTable();

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
            $('#example tfoot tr').insertAfter($('#example thead tr'));


            /*$('#example tbody').on('click', 'tr', function() {
                $(this).toggleClass('selected');
            });

            $('#button').click(function() {
                alert(table.rows('.selected').data().length + ' row(s) selected');
            });*/

        });
    </script>

    <!-- jQuery-confirmation-->
    <link href="<?php echo URLROOT; ?>/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet" />
    <script src="<?php echo URLROOT; ?>/vendor/jquery-confirm/jquery-confirm.min.js"></script>


</head>

<body class="animsition">
    <div class="page-wrapper">