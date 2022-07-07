@extends('layouts.admin')
@section('content')
@can('banpem_access')
<style>
    
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active
    {
        background-color: #ffffff;
        color: rgb(128, 0, 0);
    }
</style>


    <!-- form thn -->
    <div class="d-flex justify-content-end">
        <form class="form-inline my-2 my-lg-0 pull-right">
            <select class="pull-right form-control form-control-sm">
                <option class="text-muted" hidden="">Pilih Tahun Anggaran</option>
                <option disabled=""></option>
                <option>2021</option>
                <option>2022</option>
            </select>
        </form>  
    </div>
    <!-- end form thn -->
    <ul class="nav nav-tabs" id="myTab1" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pemetaan-tab" data-toggle="tab" href="#pemetaan" role="tab" aria-controls="pemetaan" aria-selected="false">Pemetaan</a>
        </li>
        
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- tab home -->
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    
                    <div class="card border-top-0 rounded-0" >
                        <div class="row card-body">
                            <!-- pemantauan -->
                            <div class="col-lg-12 col-md-6">
                                <div class="card-body d-flex justify-content-between">
                                    <h5 class="font-weight-bolder">Pemantauan Penyaluran Bantuan</h5>
                                </div>
                                <div class="row card-body">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header bg-dark d-flex justify-content-between mb-4">
                                                <span id="Widget1Title" class="text-white" >Total Bantuan</span>
                                            </div>
                                            <div class="card-body p-t-0">
                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <div class="col-5 text-right">
                                                            <div id="sparklinedash1771"><canvas width="51" height="50" style="display: inline-block; width: 51px; height: 50px; vertical-align: top;"></canvas></div>
                                                        </div>
                                                        <div class="col-7 text-left mt-2">
                                                            <h1 class="text-primary font-bold" style="font-size:30pt;"> 98.67%</h1>
                                                        </div>
                                                    </div>
                                                    <ul class="list-group mt-0">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            <a>PAGU</a>
                                                            <span>Rp 127.442.349.000</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                                                            <a>Realisasi</a>
                                                            <span class="text-info font-bold">Rp 125.744.204.088</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            <a>Tersisa</a>
                                                            <span>Rp 1.698.144.912,00</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>				
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card card-default">
                                            <div class="card-header bg-dark d-flex justify-content-between mb-4">
                                                <span id="Widget1Title" class="text-white" >Komposisi Bantuan</span>
                                            </div>
                                            <div class="card-body p-t-0">
                                                <div class="col">
                                                    <div class="row mb-3">
                                                        <div class="col-5 text-right">
                                                            <div id="sparklinedash1773"><canvas width="51" height="50" style="display: inline-block; width: 51px; height: 50px; vertical-align: top;"></canvas></div>
                                                        </div>
                                                        <div class="col-7 text-left mt-2">
                                                            <h1 class="text-primary font-bold" style="font-size:30pt;"> 99.24%</h1>
                                                        </div>
                                                    </div>
                                                    <ul class="list-group mt-0">
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            <a>PAGU</a>
                                                            <span>Rp 39.053.071.000</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                                                            <a>Realisasi</a>
                                                            <span class="text-info font-bold">Rp 38.758.167.264</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            <a>Tersisa</a>
                                                            <span>Rp 294.903.736</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>				
                                    <div class="col-lg-6 col-md-6">
                                        <div class="card card-default">
                                                <div class="card-header bg-dark d-flex justify-content-between mb-4">
                                                    <span id="Widget1Title" class="text-white">Realisasi Belanja Per Kewenangan</span>
                                                </div>
                                                <div class="card-body p-t-0">
                                                    <div class="col">
                                                        <div class="row mb-3">
                                                            <div class="col-5 text-right">
                                                                <div id="sparklinedash4581"><canvas width="51" height="50" style="display: inline-block; width: 51px; height: 50px; vertical-align: top;"></canvas></div>
                                                            </div>
                                                            <div class="col-7 text-left mt-2">
                                                                <h1 class="text-primary font-bold" style="font-size:30pt;"> 96.56%</h1>
                                                            </div>
                                                        </div>
                                                        <ul class="list-group mt-0">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a>PAGU</a>
                                                                <span>Rp 180.690.616.000</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                                                                <a>Realisasi</a>
                                                                <span class="text-info font-bold">Rp 174.469.762.405</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a>Tersisa</a>
                                                                <span>Rp 6.220.853.595</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>				
                                        <div class="col-lg-6 col-md-6">
                                            <div class="card card-default">
                                                <div class="card-header bg-dark d-flex justify-content-between mb-4">
                                                    <span id="Widget1Title" class="text-white">Realisasi Belanja Per Kegiatan</span>
                                                </div>
                                                <div class="card-body p-t-0">
                                                    <div class="col">
                                                        <div class="row mb-3">
                                                            <div class="col-5 text-right">
                                                                <div id="sparklinedash5886"><canvas width="51" height="50" style="display: inline-block; width: 51px; height: 50px; vertical-align: top;"></canvas></div>
                                                            </div>
                                                            <div class="col-7 text-left mt-2">
                                                                <h1 class="text-primary font-bold" style="font-size:30pt;"> 98.67%</h1>
                                                            </div>
                                                        </div>
                                                        <ul class="list-group mt-0">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a>PAGU</a>
                                                                <span>Rp 88.633.555.000</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                                                                <a>Realisasi</a>
                                                                <span class="text-info font-bold">Rp 86.567.230.675</span>
                                                            </li>
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                                <a>Tersisa</a>
                                                                <span>Rp 2.066.324.325</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>			
                                    </div>
                                </div>
                                <div class="row card-body">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="card card-default">
                                            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-banpem">
                                                <thead>
                                                    <tr>
                                                        <th width="10">
                                    
                                                        </th>
                                                        <th>
                                                            kode akun 
                                                        </th>
                                                        <th>
                                                            uraian
                                                        </th>
                                                        <th>
                                                            nilai
                                                        </th>
                                                        
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            
                            <!-- end pemantauan -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- end tab home -->
        <!-- tab pemetaan -->
        <div class="tab-pane" id="pemetaan" role="tabpanel" aria-labelledby="pemetaan-tab">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    
                    <div class="card border-top-0 rounded-0" >
                        <div class="row card-body">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end tab pemetaan -->
    </div>
    <!-- end Tab panes -->
@endcan
@endsection
@section('scripts')
@parent


@endsection