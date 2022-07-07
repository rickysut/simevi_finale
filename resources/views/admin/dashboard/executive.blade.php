@extends('layouts.admin')
@section('content')
@can('executive_access')

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
    <!-- from banpem -->
    <div class="row mt-2">
        <div class="col-lg-12 col-md-12">
            <div class="card" style="border-radius: 12px">
                <div class="card-body" style="margin-bottom: -10px; background-color: #4f9aef;border-top-right-radius: 12px; border-top-left-radius: 12px">
                    <h5 class="card-title text-white" style="margin-top: -8px; margin-bottom: -8px" >PEMANTAUAN KINERJA ANGGARAN</h5>
                </div>
                <div class="row card-body">
                    <!-- widget Gerdal OPT -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            
                            <div class="card-body">
                                <!-- Row -->
                                <div><span  class="font-weight-bolder">PAGU</span></div>
                                <div class="row">
                                    
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id=""
                                            src="{{ asset('img/landmark.svg') }}"
                                            style="width:40px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Anggaran Tahun 2022</h6>
                                        <h4 class="text-info font-bold">373.185.388.571</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">0%</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">100%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" role="progressbar"
                                                style="width: 100%; height: 10px;" aria-valuenow="100" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Total Anggaran Kegiatan Tahun ini</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->

                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            
                            <div class="card-body">
                                <!-- Row -->
                                <div><span  class="font-weight-bolder">REALISASI</span></div>
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id="" src="{{ asset('img/chart-pie.svg') }}"
                                            style="width:48px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Realisasi Penyaluran</h6>
                                        <h4 class="text-success font-bold">298.548.310.857</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">Data: 31 Jan</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">80%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: 80%; height: 10px;" aria-valuenow="80" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->

                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            
                            <div class="card-body">
                                <!-- Row -->
                                <div><span  class="font-weight-bolder">OUTSTANDING</span></div>
                                <div class="row">
                                    <div class="col-4 align-self-center text-right  p-l-0">
                                        <img class="img" id="" src="{{ asset('img/hourglass-half.svg') }}"
                                            style="width:28px;" alt="">
                                    </div>
                                    <div class="col-8" id="Widget3Total">
                                        <h6 id="Widget1Text">Realisasi Penyaluran</h6>
                                        <h4 class="text-warning font-bold">149.274.155.428</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mt-2">
                                            <small>
                                                <p class="text-muted mb-0">Data: 30 Jun</p>
                                            </small>
                                            <small>
                                                <p class="text-muted mb-0">50%</p>
                                            </small>
                                        </div>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar"
                                                style="width: 50%; height: 10px;" aria-valuenow="50" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small><i class="text-muted mb-0"></i>Dari total alokasi anggaran</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card"  style="border-radius: 12px">
                <div class="card-body" style="margin-bottom: -10px; background-color: #3df3de; border-top-right-radius: 12px; border-top-left-radius: 12px">
                    <h5 class="card-title text-white" style="margin-top: -8px; margin-bottom: -8px">PEMANTAUAN PENYALURAN BANTUAN</h5>
                </div>
                <div class="row card-body" style="margin-top: 10px;">
                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default ">
                           
                            <div class="card-body">
                                <!-- Row -->
                                <div><span id="Widget1Title" class="font-weight-bolder">TOTAL BANTUAN</span></div>
                                <div class="row">
                                    <div class="card-body" style="text-align: center">    
                                        <h1>70%</h1>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -18px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center text-right  p-l-0">
                                                <img class="img" id=""
                                                    src="{{ asset('img/treasure.svg') }}"
                                                    style="width:48px;" alt="">
                                            </div>
                                            <div class="col-8" id="Widget3Total">
                                                <h5 id="Widget1Text">Nominal</h5>
                                                <h5 class="text-success font-bold">298.548.310.857</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- widget Gerdal OPT -->


                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            
                            <div class="card-body">
                                <!-- Row -->
                                <div><span id="Widget1Title" class="font-weight-bolder">BANTUAN BARANG</span></div>
                                <div class="row">
                                    <div class="card-body" style="text-align: center">    
                                        <h1>55%</h1>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -18px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center text-right  p-l-0">
                                                <img class="img" id=""
                                                    src="{{ asset('img/tractor.svg') }}"
                                                    style="width:48px;" alt="">
                                            </div>
                                            <div class="col-8" id="Widget3Total">
                                                <h5 id="Widget1Text">Nominal</h5>
                                                <h5 class="text-success font-bold">298.548.310.857</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="card card-default">
                            
                            <div class="card-body">
                                <!-- Row -->
                                <div><span id="Widget1Title" class="font-weight-bolder">BANTUAN UANG</span></div>
                                <div class="row">
                                    <div class="card-body" style="text-align: center">    
                                        <h1>45%</h1>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: -18px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 align-self-center text-right  p-l-0">
                                                <img class="img" id=""
                                                    src="{{ asset('img/coins2.svg') }}"
                                                    style="width:48px;" alt="">
                                            </div>
                                            <div class="col-8" id="Widget3Total">
                                                <h5 id="Widget1Text">Nominal</h5>
                                                <h5 class="text-success font-bold">298.548.310.857</h5>
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
    </div>
    <!-- end from banpem -->
    


@endcan
@endsection