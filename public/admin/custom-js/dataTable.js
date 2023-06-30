/**
 * DataTables Basic
 */

$(function () {
    'use strict';
    let configuration = {
        lengthMenu: "Показать _MENU_ страниц ",
        info: "Показано с _START_ по _END_ из _TOTAL_ страниц",
        print_columns: [1,2,3,4,5]
    }

    let dt_basic_table = $('.datatables-basic-participants');

    // DataTable with buttons
    // --------------------------------------------------------------------
    if (dt_basic_table.length) {
        let print_columns = configuration.print_columns;
        let dt_basic = dt_basic_table.DataTable({
            lengthChange: true,
            aaSorting: [],
            info: false,
            iDisplayLength: 50,
            dom:
            '<"card-header"><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',

            // dom:
            //     '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            buttons: [
                {
                    extend: 'collection',
                    className: 'btn btn-outline-secondary dropdown-toggle mr-2',
                    text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'Экспорт',
                    buttons: [
                        {
                            extend: 'print',
                            text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Печать',
                            className: 'dropdown-item',
                            exportOptions: { columns: print_columns }
                        },
                        {
                            extend: 'csv',
                            text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
                            className: 'dropdown-item',
                            exportOptions: { columns: print_columns }
                        },
                        {
                            extend: 'excel',
                            text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
                            className: 'dropdown-item',
                            exportOptions: { columns: print_columns }
                        },
                        {
                            extend: 'pdf',
                            text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
                            className: 'dropdown-item',
                            exportOptions: { columns: print_columns }
                        },
                        {
                            extend: 'copy',
                            text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Копировать',
                            className: 'dropdown-item',
                            exportOptions: { columns: print_columns }
                        }
                    ]
                }
                ],
            language:{
                paginate:{
                    next:"след",
                    previous:"пред"
                },
                zeroRecords:'нет результатов ...',
                emptyTable:"нет результатов ...",
                lengthMenu: configuration.lengthMenu,
                search: "Поиск:",
                info: configuration.info,
            },
            // responsive: true
        });
        dt_basic.buttons().container()
            .appendTo('.dt-action-buttons');
    }

});
