$(function() {
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('data_renja_delete')
    let deleteButtonTrans = '{{ trans('
    global.datatables.delete ') }}';
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.data-renjas.massDestroy') }}",
        className: 'btn-danger',
        action: function(e, dt, node, config) {
            var ids = $.map(dt.rows({ selected: true }).data(), function(entry) {
                return entry.id
            });

            if (ids.length === 0) {
                alert('{{ trans('
                    global.datatables.zero_selected ') }}')

                return
            }

            if (confirm('{{ trans('
                    global.areYouSure ') }}')) {
                $.ajax({
                        headers: { 'x-csrf-token': _token },
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    })
                    .done(function() { location.reload() })
            }
        }
    }
    dtButtons.push(deleteButton)
    @endcan

    let dtOverrideGlobals = {
        buttons: dtButtons,
        processing: true,
        serverSide: true,
        retrieve: true,
        aaSorting: [],
        ajax: "{{ route('admin.data-renjas.index') }}",
        columns: [
            { data: 'placeholder', name: 'placeholder' },
            { data: 'thang', name: 'thang' },
            { data: 'kdjendok', name: 'kdjendok' },
            { data: 'kdsatker', name: 'kdsatker' },
            { data: 'kddept', name: 'kddept' },
            { data: 'kdunit', name: 'kdunit' },
            { data: 'kdprogram', name: 'kdprogram' },
            { data: 'kdgiat', name: 'kdgiat' },
            { data: 'kdoutput', name: 'kdoutput' },
            { data: 'kdlokasi', name: 'kdlokasi' },
            { data: 'kdkabkota', name: 'kdkabkota' },
            { data: 'kddekon', name: 'kddekon' },
            { data: 'kdsoutput', name: 'kdsoutput' },
            { data: 'kdkmpnen', name: 'kdkmpnen' },
            { data: 'kdskmpnen', name: 'kdskmpnen' },
            { data: 'kdakun', name: 'kdakun' },
            { data: 'kdkppn', name: 'kdkppn' },
            { data: 'kdbeban', name: 'kdbeban' },
            { data: 'kdjnsban', name: 'kdjnsban' },
            { data: 'kdctarik', name: 'kdctarik' },
            { data: 'register', name: 'register' },
            { data: 'carahitung', name: 'carahitung' },
            { data: 'header1', name: 'header1' },
            { data: 'header2', name: 'header2' },
            { data: 'kdheader', name: 'kdheader' },
            { data: 'noitem', name: 'noitem' },
            { data: 'nmitem', name: 'nmitem' },
            /*{ data: 'vol1', name: 'vol1' },
            { data: 'sat1', name: 'sat1' },
            { data: 'vol2', name: 'vol2' },
            { data: 'sat2', name: 'sat2' },
            { data: 'vol3', name: 'vol3' },
            { data: 'sat3', name: 'sat3' },
            { data: 'vol4', name: 'vol4' },
            { data: 'sat4', name: 'sat4' },
            */
            { data: 'volkeg', name: 'volkeg' },
            { data: 'satkeg', name: 'satkeg' },
            { data: 'hargasat', name: 'hargasat' },
            { data: 'jumlah', name: 'jumlah' },
            /*{ data: 'jumlah2', name: 'jumlah2' },
            { data: 'paguphln', name: 'paguphln' },
            { data: 'pagurmp', name: 'pagurmp' },
            { data: 'pagurkp', name: 'pagurkp' },
            { data: 'kdblokir', name: 'kdblokir' },
            { data: 'blokirphln', name: 'blokirphln' },
            { data: 'blokirrmp', name: 'blokirrmp' },
            { data: 'blokirrkp', name: 'blokirrkp' },
            { data: 'rphblokir', name: 'rphblokir' },
            { data: 'kdcopy', name: 'kdcopy' },
            { data: 'kdabt', name: 'kdabt' },
            { data: 'kdsbu', name: 'kdsbu' },
            { data: 'volsbk', name: 'volsbk' },
            { data: 'volrkakl', name: 'volrkakl' },
            { data: 'blnkontrak', name: 'blnkontrak' },
            { data: 'nokontrak', name: 'nokontrak' },
            { data: 'tgkontrak', name: 'tgkontrak' },
            { data: 'nilkontrak', name: 'nilkontrak' },
            { data: 'januari', name: 'januari' },
            { data: 'pebruari', name: 'pebruari' },
            { data: 'maret', name: 'maret' },
            { data: 'april', name: 'april' },
            { data: 'mei', name: 'mei' },
            { data: 'juni', name: 'juni' },
            { data: 'juli', name: 'juli' },
            { data: 'agustus', name: 'agustus' },
            { data: 'september', name: 'september' },
            { data: 'oktober', name: 'oktober' },
            { data: 'nopember', name: 'nopember' },
            { data: 'desember', name: 'desember' },
            { data: 'jmltunda', name: 'jmltunda' },
            { data: 'kdluncuran', name: 'kdluncuran' },
            { data: 'jmlabt', name: 'jmlabt' },
            { data: 'norev', name: 'norev' },
            { data: 'kdubah', name: 'kdubah' },
            { data: 'kurs', name: 'kurs' },
            { data: 'indexkpjm', name: 'indexkpjm' },
            { data: 'kdib', name: 'kdib' },
            */
            {
                data: 'actions',
                name: '{{ trans('
                global.actions ') }}'
            }
        ],
        orderCellsTop: true,
        responsive: true,
        order: [
            [1, 'asc']
        ],
        pageLength: 10,
        dom:
        /*	--- Layout Structure 
              --- Options
              l	-	length changing input control
              f	-	filtering input
              t	-	The table!
              i	-	Table information summary
              p	-	pagination control
              r	-	processing display element
              B	-	buttons
              R	-	ColReorder
              S	-	Select
  
                 Markup
              < and >				- div element
              <"class" and >		- div with a class
              <"#id" and >		- div with an ID
              <"#id.class" and >	- div with an ID and a class
  
              --- Further reading
              https://datatables.net/reference/option/dom
              --------------------------------------
           */
            "<'row mb-3'<'col-sm-12 col-md-8 d-flex align-items-center justify-content-start'B><'col-sm-12 col-md-4 d-flex align-items-center justify-content-end'fl>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        buttons: [
            /*{
                extend:    'colvis',
                text:      'Column Visibility',
                titleAttr: 'Col visibility',
                className: 'mr-sm-3'
            },*/
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                titleAttr: 'Generate PDF',
                className: 'btn-outline-danger btn-sm mr-1'
            },
            {
                extend: 'csvHtml5',
                text: 'CSV',
                titleAttr: 'Generate CSV',
                className: 'btn-outline-primary btn-sm mr-1'
            },
            {
                extend: 'excelHtml5',
                text: 'Excel',
                titleAttr: 'Generate Excel',
                className: 'btn-outline-success btn-sm mr-1'
            },
            {
                extend: 'copyHtml5',
                text: 'Copy',
                titleAttr: 'Copy to clipboard',
                className: 'btn-outline-primary btn-sm mr-1'
            },
            {
                extend: 'print',
                text: 'Print',
                titleAttr: 'Print Table',
                className: 'btn-outline-primary btn-sm'
            }
        ]
    };

    let table = $('.datatable-DataRenja').DataTable(dtOverrideGlobals);
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

});

$(function() {

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

    $.extend(true, $.fn.dataTable.defaults, {
        buttons: dtButtons,
        dom: 'lBf<t>p',
        orderCellsTop: true,
        order: [
            [1, 'asc']
        ],
        pageLength: 10,
        footerCallback: function(row, data, start, end, display) {
            var api = this.api(),
                data;

            // Remove the formatting to get integer data for summation
            var intVal = function(i) {
                return typeof i === 'string' ? i.replace(/[\.,]/g, '') * 1 : typeof i === 'number' ? i : 0;
            };

            // Total over all pages
            total = api
                .column(2)
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Total over this page
            pageTotal1 = api
                .column(2, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(1).footer()).html(
                numberWithCommas(pageTotal1)
            )
            pageTotal2 = api
                .column(3, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(2).footer()).html(
                numberWithCommas(pageTotal2)
            )
            pageTotal3 = api
                .column(4, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(3).footer()).html(
                numberWithCommas(pageTotal3)
            )
            pageTotal4 = api
                .column(5, { page: 'current' })
                .data()
                .reduce(function(a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            // Update footer
            $(api.column(4).footer()).html(
                numberWithCommas(pageTotal4)
            )
        },

    });



    let table = $('.datatable-DetailRenja:not(.ajaxTable)').DataTable({ buttons: [dtButtons] })
    $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });

})