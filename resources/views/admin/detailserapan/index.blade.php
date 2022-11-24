@extends('layouts.admin')
@section('content')
    @include('partials.subheader')
    <div class="row">
        <div class="col-12">
            <div id="panel-1" class="panel show" data-panel-sortable data-panel-close data-panel-collapsed>
                <div class="panel-hdr">
                    <h2>
                        <span class="fw-300"><i>Nilai Kinerja Percepatan (NKP) Satker</i></span>
                    </h2>

                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="row">
                            <div class="col-12">
                                <form id="fp" action="{{ route('admin.detailserapan') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class=" d-flex justify-content-between font-weight-bolder align-items-center">
                                        <div>
                                            <label>SATKER : </label>
                                            <select class="custom-select" id="dtSatker" name="dtSatker"
                                                onchange="fp.submit()" style="width: 300px;">
                                                <option value="">- Pilih Satker -</option>
                                                @foreach ($satkers as $data)
                                                    <option value="{{ $data->kd_satker }}"
                                                        @if ($dtSatker == $data->kd_satker) selected @endif
                                                        title="{{ $data->nm_satker }}">{{ $data->kd_satker }} -
                                                        {{ $data->nm_satker }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label>Tahun : </label>
                                            <select class="custom-select" id="dtYear" name="dtYear"
                                                onchange="fp.submit()">
                                                <option value="">- Pilih Tahun -</option>
                                                @foreach ($years as $data)
                                                    <option value="{{ $data->year }}"
                                                        @if ($dtYear == $data->year) selected @endif>
                                                        {{ $data->year }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </form>
                                <div class="table dataTables_wrapper dt-bootstrap4">
                                    <table
                                        class="table table-bordered table-striped table-hover datatable datatable-DetailBanpem w-100">
                                        <thead class="bg-primary-50">
                                            <tr>
                                                <th class="text-center" rowspan="2"
                                                    style="vertical-align : middle; display:none;">
                                                    kdsatker
                                                </th>
                                                <th class="text-center" rowspan="2" style="vertical-align : middle;">
                                                    KODE
                                                </th>
                                                <th class="text-center" rowspan="2" style="vertical-align : middle;">
                                                    SATKER
                                                </th>
                                                <th class="text-center" rowspan="2" style="vertical-align : middle;">
                                                    KW
                                                </th>
                                                <th class="text-center" colspan="6" style="horizontal-align : middle;">
                                                    NKP TA {{ $dtYear }}
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">
                                                    TW I
                                                </th>
                                                <th class="text-center">
                                                    TW II
                                                </th>
                                                <th class="text-center">
                                                    TW III
                                                </th>
                                                <th class="text-center">
                                                    TW IV
                                                </th>
                                                <th class="text-center">
                                                    NKP AKHIR
                                                </th>
                                                <th class="text-center sorting">
                                                    Kategori
                                                </th>
                                                <th style="display:none;"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stable->getData()->data as $data)
                                                <tr>
                                                    <td style="display:none;">
                                                        {{ $data->kd_satker }}
                                                        @if ($data->amnt1 >= 15)
                                                            {{ $data->amnt1 = 100 }}
                                                        @endif
                                                        @if ($data->amnt2 >= 40)
                                                            {{ $data->amnt2 = 100 }}
                                                        @endif
                                                        @if ($data->amnt3 >= 60)
                                                            {{ $data->amnt3 = 100 }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->kd_satker }}
                                                    </td>
                                                    <td>
                                                        {{ $data->nama }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $data->kwn4 }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $data->amnt1 }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $data->amnt2 }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $data->amnt3 }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ $data->amnt4 }}
                                                    </td>
                                                    <td class="text-right">
                                                        {{ number_format(((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4, 2) }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if (((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4 >= 80 &&
                                                            ((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4 <= 100)
                                                            <span class="badge btn-xs btn-success">BAIK</span>
                                                        @elseif (((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4 >= 60 &&
                                                            ((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4 < 80)
                                                            <span class="badge btn-xs btn-warning">SEDANG</span>
                                                        @elseif (((float) $data->amnt1 + (float) $data->amnt2 + (float) $data->amnt3 + (float) $data->amnt4) / 4 < 60)
                                                            <span class="badge btn-xs btn-danger">BURUK</span>
                                                        @endif
                                                    </td>
                                                    <td style="display:none;"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>

                                                <th>Rata-rata utk SATKER aktif {{ $dtYear }}</th>
                                                <th></th>
                                                <th></th>
                                                <th class="text-right text-nowrap"></th>
                                                <th class="text-right text-nowrap"></th>
                                                <th class="text-right text-nowrap"></th>
                                                <th class="text-right text-nowrap"></th>
                                                <th class="text-right text-nowrap"></th>
                                                <th class="text-center text-nowrap"></th>


                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        var maxLength = 50;
        $('#dtSatker > option').text(function(i, text) {
            if (text.length > maxLength) {
                return text.substr(0, maxLength) + '...';
            }
        });
        $(function() {

            function numberWithCommas(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'asc']
                ],
                pageLength: 100,
                footerCallback: function(tfoot, data, start, end, display) {
                    var api = this.api();
                    for (var i = 4; i < 9; i++) {
                        // total column
                        var columnDataTotal = api
                            .column(i)
                            .data();
                        var theColumnTotal = columnDataTotal
                            .reduce(function(a, b) {
                                if (isNaN(a) || (a == '-')) {
                                    a = 0;
                                } else {
                                    a = parseFloat(a);
                                }
                                if (isNaN(b) || (a == '-')) {
                                    b = 0;
                                } else {
                                    b = parseFloat(b);
                                }
                                return a + b;
                            }, 0);
                        // view page column
                        var columnData = api
                            .column(i, {
                                page: 'current'
                            })
                            .data();
                        var theColumnPage = columnData
                            .reduce(function(a, b) {
                                if (isNaN(a) || (a == '-')) {
                                    a = 0;
                                } else {
                                    a = parseFloat(a);
                                }
                                if (isNaN(b) || (a == '-')) {
                                    b = 0;
                                } else {
                                    b = parseFloat(b);
                                }
                                return a + b;
                            }, 0);

                        // Update footer
                        //$(api.column(0).footer()).html('Avarage');
                        $(api.column(i - 1).footer()).html(
                            /*parseFloat(theColumnPage / columnData.count()).toFixed(2) + ' /' + */
                            parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(2)
                        );
                        if ((i == 8) && (parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(
                                2) >= 80) &&
                            (parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(2) <= 100)) {
                            $(api.column(8).footer()).html('BAIK')
                        }
                        if ((i == 8) && (parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(
                                2) >= 60) &&
                            (parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(2) < 80)) {
                            $(api.column(8).footer()).html('SEDANG')
                        }
                        if ((i == 8) && (parseFloat(theColumnTotal / columnDataTotal.count()).toFixed(
                                2) < 60)) {
                            $(api.column(8).footer()).html('BURUK')
                        }
                    };
                }

            });
            let table = $('.datatable-DetailBanpem:not(.ajaxTable)').DataTable({
                buttons: [dtButtons]
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
