@extends('layouts.admin')
@section('content')
    <div id="carousel1" class="carousel" data-coreui-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('img/plants-2.jpeg') }}" class="d-block h-50 w-100" alt="simevi" height="50%">
            <div class="carousel-caption d-none d-md-block">
              <h2>Monitoring Dan Evaluasi Hortikultura Terintegerasi</h2>
            </div>
          </div>
          
        </div>
        
    </div>
       
    
    <div class="container overflow-hidden px-4" style="border: solid; border-color: #bec4c4">
    <br>
      <div class="row gx-5">
          <div class="col-sm-4">
            @can('executive_access')
            <a href ="{{ route("admin.dashboardvip") }}" >
            @endcan
                <img src="{{ asset('img/summary.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #5c97ef96">
                        <div class="card-body">
                            <h4 class="card-title text-white">Executive Summary</h4>
                            <p class="card-text text-white">Monitoring Evaluasi</p>
                        </div>
                    </div>
            @can('executive_access')
            </a>
            @endcan
          </div>
          <div class="col-sm-4">
              @can('pagu_access')
              <a href ="{{ route("admin.pagu") }}">
              @endcan
                <img src="{{ asset('img/funding.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #706b0b32">
                        <div class="card-body">
                            <h4 class="card-title text-white">Data Anggaran</h4>
                            <p class="card-text text-white">Pagu</p>
                            
                        </div>
                    </div>
              @can('pagu_access')
              </a>
              @endcan
          </div>
          <div class="col-sm-4">
            @can('banpem_access')
            <a href ="{{ route("admin.banpem") }}">
            @endcan
                <img src="{{ asset('img/banpem.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #d781c896">
                        <div class="card-body" >
                            <h4 class="card-title text-white">Banpem</h4>
                            <p class="card-text text-white">Banpem.</p>
                        </div>
                   </div>
            @can('banpem_access')
            </a>
            @endcan
          </div>
          <div class="col-sm-4">
             <!--a href ="{{ route("admin.home") }}"-->
                <img src="{{ asset('img/newicon.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #a29ca2d3">
                        <div class="card-body">
                            <h4 class="card-title">Srikandi</h4>
                            <p class="card-text">Srikandi</p>
                        </div>
                    </div>
            <!--/a-->
        </div>
        <div class="col-sm-4">
            <!--a href ="{{ route("admin.home") }}"-->
                <img src="{{ asset('img/newicon.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #a29ca2d3">
                        <div class="card-body">
                            <h4 class="card-title">Proseed</h4>
                            <p class="card-text">Proseed</p>
                        </div>
                    </div>
            <!--/a-->
        </div>
        <div class="col-sm-4">
            <!--a href ="{{ route("admin.home") }}"-->
                <img src="{{ asset('img/newicon.jpg') }}" class="card-img-top" >
                    <div class="card" style="background-color: #a29ca2d3">
                        <div class="card-body" >
                            <h4 class="card-title">Simpel Duti</h4>
                            <p class="card-text">Simpel Duti.</p>
                        </div>
                    </div>
            <!--/a-->
        </div>
      </div>
    </div>
    <br>
@endsection