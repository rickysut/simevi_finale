@extends('layouts.admin')
@section('content')
@can('dashboardvip_access')
    
<style>
* {
  margin: 0;
  padding: 0;
}

.echarts {
  position: relative;
  height: 50vh;
}

</style>
<div class="subheader">
	<h1 class="subheader-title">
		<i class='subheader-icon fal fa-chart-area'></i> {{ $breadcrumb ?? '' }}
		<small>
		</small>
	</h1>
	@for ($i=3;$i<count($prData);$i++)
	<div class="subheader-block d-lg-flex align-items-center">
		<div class="d-inline-flex flex-column justify-content-center mr-3" data-toggle="tooltip" title data-original-title="Alokasi Pagu tahun {{ $prData[$i]->tahun }}">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>PAGU | {{ $prData[$i]->tahun }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-primary-500">
				Rp {{ number_format($prData[$i]->pagu,0,",",".") }}
		</div>
		<span class="sparklines hidden-xl-down" sparkType="bar" sparkBarColor="#886ab5" sparkHeight="32px" sparkBarWidth="5px" values="3,4,3,6,7,3,3,6,2,6,4"></span>
	</div>
	<div class="subheader-block d-lg-flex align-items-center border-faded border-right-0 border-top-0 border-bottom-0 ml-3 pl-3">
		<div class="d-inline-flex flex-column justify-content-center mr-3" data-toggle="tooltip" title data-original-title="Realisasi tahun {{ $prData[$i]->tahun }}">
			<span class="fw-300 fs-xs d-block opacity-50">
				<small>REALISASI | {{ $prData[$i]->tahun }}</small>
			</span>
			<span class="fw-500 fs-xl d-block color-danger-500">
				Rp {{ number_format($prData[$i]->realisasi,0,",",".") }}
			</span>
		</div>
		<span class="sparklines hidden-xl-down" sparkType="bar" sparkBarColor="#fe6bb0" sparkHeight="32px" sparkBarWidth="5px" values="1,4,3,6,5,3,9,6,5,9,7"></span>
	</div>
	@endfor
</div>
<div class="row d-flex">
	<div class="col-12">
		<div id="dashboardVip" class="carousel slide mb-5" data-ride="carousel">
			<div class="controls-top mb-5 text-center justify-content-between">
				<a class="btn-sm btn-primary mr-2" href="#dashboardVip" data-slide="prev" role="button"><i class="fas fa-chevron-left"></i></a>
				<a class="btn-sm btn-primary ml-2" href="#dashboardVip" data-slide="next" role="button"><i class="fas fa-chevron-right"></i></a>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<!-- carousel 1-->
					<div class="row">
						<div class="col-12">
							<div id="panel-6" class="panel show">
								<div class="panel-hdr">
									<h2>
										Kampung <span class="fw-300"><i>Hortikultura</i></span>
									</h2>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-12 align-items-center">
										<div id="donutchart" style="width:100%; height:300px;">
										</div>
								</div>
								<div class="col-md-6 col-lg-5">
									<div class="d-flex mt-2 mb-1 fs-xs">
										Sayuran dan Tanaman Obat
										<span class="d-inline-block ml-auto">842.529.631</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 19.2%;" aria-valuenow="19.2" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex mt-2 mb-1 fs-xs">
										Perlindungan Hortikultura
										<span class="d-inline-block ml-auto">699.461.144</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-info" role="progressbar" style="width: 15.9%;" aria-valuenow="15.9" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex mt-2 mb-1 fs-xs">
										Sekretariat Direktorat Jenderal Hortikultura
										<span class="d-inline-block ml-auto">465.788.458</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-warning" role="progressbar" style="width: 10.6%;" aria-valuenow="10.6" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex mt-2 mb-1 fs-xs">
										Perbenihan Hortikultura
										<span class="d-inline-block ml-auto">1.219.432.171</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-danger" role="progressbar" style="width: 27.8%;" aria-valuenow="27.8" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex mt-2 mb-1 fs-xs">
										Tanaman Buah dan Florikultura
										<span class="d-inline-block ml-auto">699.461.144</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-success" role="progressbar" style="width: 15.9%;" aria-valuenow="15.9" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<div class="d-flex mt-2 mb-1 fs-xs">
										Pengolahan dan Pemasaran Hortikultura
										<span class="d-inline-block ml-auto">465.788.458</span>
									</div>
									<div class="progress progress-xs mb-3">
										<div class="progress-bar bg-dark" role="progressbar" style="width: 10.6%;" aria-valuenow="10.6" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<hr>
							</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end carousel 1 -->				
				</div>
				<div class="carousel-item">
					<!-- carousel 1-->
					Panel 2
					<!-- end carousel 1 -->					
				</div>
				<div class="carousel-item">
					<!-- carousel 1-->
					Panel 3
					<!-- carousel 1-->
				</div>
				<div class="carousel-item">
					<div class="row">
						<!-- widget srikandi/kampunghorti-->
						<div class="col-12" style="float:left;">
							<div id="panel-6" class="panel show">
								<div class="panel-hdr">
									<h2>
										Kampung <span class="fw-300"><i>Hortikultura</i></span>
									</h2>
									<div class="panel-toolbar">
										<a data-toggle="tooltip" title data-original-title="Detail" class="btn btn-panel btn-outline-info btn-icon hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="/srikandi">
										</a>
									</div>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										<div class="row">
											<div class="col-lg-4 col-sm-12">
												<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
													<div class="">
														Kampung Horti
														<h3 class="display-4 d-block l-h-n m-0 text-primary fw-500">
															0
															<small class="d-inline m-0 l-h-n">kampung</small>
														</h3>
													</div>
													<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/garden_area.png" style="width:100px;" alt="">
												</div>
											</div>
											<div class="col-lg-4 col-sm-12">
												<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
													<div class="">
														Luas Lahan
														<h3 class="display-4 d-block l-h-n m-0 text-info fw-500">
															0
															<small class="d-inline m-0 l-h-n">hektar</small>
														</h3>
													</div>
													<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/garden.png" style="width:100px;" alt="">
												</div>
											</div>
											<div class="col-lg-4 col-sm-12">
												<div class="p-3 shadow-sm bg-light rounded overflow-hidden position-relative mb-g">
													<div class="">
														Poktan Peserta
														<h3 class="display-4 d-block l-h-n m-0 text-success fw-500">
															0
															<small class="d-inline m-0 l-h-n">Poktan</small>
														</h3>
													</div>
													<img class="img position-absolute pos-right pos-bottom opacity-100 mb-n1 mr-n1" id="" src="../img/farmer.png" style="width:100px;" alt="">
												</div>
											</div>
											<div class="col">
												<div class="text-medium-emphasis">
													<div class="d-none d-md-block" >
														<span class="text-muted">*jumlah yang telah diregistrasi</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="text-medium-emphasis small d-flex justify-content-between">
											<div class="d-none d-md-block" >
												<span class="text-secondary">Data: </span>
												<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
											</div>
											<div class="text-muted">
												<a href="/srikandi">Sumber: App Srikandi</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end widget srikandi/kampunghorti-->
					</div>			
				</div>
				<div class="carousel-item">
					<div class="row">
						<!-- widget wajib tanam-->
						<div class="col-lg-12 col-md-12" style="float:left;">
							<div id="panel-7" class="panel show">
								<div class="panel-hdr">
									<h2>
										Wajib Tanam | <span class="fw-300"><i>Bawang Putih</i></span>
									</h2>
									<div class="panel-toolbar">
										<a data-toggle="modal" title="lihat data tabular" class="btn btn-panel btn-outline-primary btn-icon hover-effect-dot waves-effect waves-themed rounded-circle" type="button" data-target=".tablebanpem"></a>
										<a data-toggle="tooltip" title data-original-title="Detail" class="btn btn-panel btn-outline-info btn-icon hover-effect-dot waves-effect waves-themed rounded-circle" type="button" href="/wajibtanam">
										</a>
									</div>
								</div>
								<div class="panel-container show">
									<div class="panel-content">
										<div class="row">
											<div class="col-sm-6 col-lg-3">
												<div class="shadow p-3 bg-primary-300 rounded overflow-hidden position-relative text-white mb-g">
													<div class="">
														RIPH
														<h3 class="display-4 d-block l-h-n m-0 fw-500">
															117
															<small class="d-inline m-0 l-h-n">terbitan</small>
														</h3>
														<div class="progress progress-xs mb-2">
															<div class="progress-bar bg-primary-600" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<i class="fal fa-bookmark position-absolute pos-right pos-bottom opacity-15 mb-n1 mr-n1" style="font-size:6rem"></i>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3">
												<div class="shadow p-3 bg-info-200 rounded overflow-hidden position-relative text-white mb-g">
													<div class="">
														Lunas Kewajiban
														<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="dari 117 RIPH">
															5
															<small class="d-inline m-0 l-h-n">RIPH</small>
														</h3>
														<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 4%">
															<div class="progress-bar bg-info-500" role="progressbar" style="width: 4%;" aria-valuenow="4" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
													<i class="fal fa-award position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3">
												<div class="shadow p-3 bg-success-200 rounded overflow-hidden position-relative text-white mb-g">
													<div class="">
														Realisasi Tanam
														<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="Beban Tanam: 7.236 ha">
															2.635
															<small class="d-inline m-0 l-h-n">ha</small>
														</h3>
														<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 36%">
															<div class="progress-bar bg-success-500" role="progressbar" style="width: 36%;" aria-valuenow="36" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
														<h6 class="hidden-sm-up">Beban Tanam: 7.236 ha</h6>
													</div>
													<i class="fal fa-seedling position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
												</div>
											</div>
											<div class="col-sm-6 col-lg-3">
												<div class="shadow p-3 bg-warning-400 rounded overflow-hidden position-relative text-white mb-g">
													<div class="">
														Realisasi Produksi
														<h3 class="display-4 d-block l-h-n m-0 fw-500" data-toggle="tooltip" title data-original-title="Beban Tanam: 43.416 ton">
															40.967
															<small class="d-inline m-0 l-h-n">ton</small>
														</h3>
														<div class="progress progress-xs mb-2" data-toggle="tooltip" title data-original-title="Tercapai: 94%">
															<div class="progress-bar bg-warning-700" role="progressbar" style="width: 94%;" aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
														<h6 class="hidden-sm-up">Beban Produksi: 43.416 ton</h6>
													</div>
													<i class="fal fa-dolly position-absolute pos-right pos-bottom opacity-25 mb-n1 mr-n1" style="font-size:6rem"></i>
												</div>
											</div>
											<div class="col">
												<div class="text-medium-emphasis">
													<div class="d-none d-md-block" >
														<span class="text-muted">*data yang dilaporkan oleh pelaku usaha pemegang RIPH</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card-footer">
										<div class="text-medium-emphasis small d-flex justify-content-between">
											<div class="d-none d-md-block" >
												<span class="text-secondary">Data: </span>
												<span class="text-muted text-truncate text-truncate-sm js-get-date"></span>
											</div>
											<div class="text-muted">
												<a href="http://simethris.hortikultura.pertanian.go.id/">Sumber: SIMETHRIS</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- end widget wajib tanam-->
					</div>		
				</div>
			</div>
			<ol class="carousel-indicators mt-10">
				<li data-target="#dashboardVip" data-slide-to="0" class="active"></li>
				<li data-target="#dashboardVip" data-slide-to="1" class=""></li>
				<li data-target="#dashboardVip" data-slide-to="2" class=""></li>
				<li data-target="#dashboardVip" data-slide-to="3" class=""></li>
				<li data-target="#dashboardVip" data-slide-to="4" class=""></li>
			</ol>
		</div>
	</div>
	<!-- Modal Right -->
	<div class="modal fade tablebanpem" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-right modal-transparent" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title h4 text-white">Panel Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"><i class="fal fa-times"></i></span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card mb-g">
						<div class="card-body p-3">
							<h5 class="text-primary">
								<strong>Tabel Realisasi Belanja 526</strong>
								<small class="mt-0 mb-3 text-muted">
									Data matrix realisasi belanja Akun 526xxx dalam kurun waktu 4 (empat) tahun
								</small>
							</h5>
							<table id="tableBanpem" class="table table-bordered table-hover table-striped table-responsive w-100">
									<thead class="bg-primary-600">
										<tr>
											<th>
												Tahun
											</th>
											<th>
												Pagu
											</th>
											<th>
												Realisasi
											</th>
											<th>
												%
											</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($pbData as $d )
										<tr>
											<td>{{ $d->tahun }}</td>  
											<td>{{ $d->pagu }}</td>  
											<td>{{ $d->realisasi }}</td>  
											<td>{{ $d->nilai }}</td>  
										</tr>
										@endforeach
									</tbody>
								</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Right Small -->
	
</div>

@endcan

@endsection
@section('scripts')
@parent
@if ($agent->isDesktop())

<!-- donut renja -->
<script type="text/javascript">
   var dom = document.getElementById('chart-container');
var myChart = echarts.init(dom, null, {
  renderer: 'svg',
  useDirtyRect: false
});
var app = {};

var option;

option = {
  title: {
    text: 'Tahun 2022',
	subtext:'(nilai hanya contoh)',
    left: 'center'
  },
  tooltip: {
    trigger: 'item'
  },
  series: [
    {
      name: 'Alokasi untuk:',
      type: 'pie',
      radius: ['40%', '70%'],
      avoidLabelOverlap: true,
      itemStyle: {
        borderRadius: 0,
        borderColor: '#fff',
        borderWidth: 0
      },
      label: {
        show: false,
        position: 'center'
      },
      emphasis: {
        label: {
          show: false,
          fontSize: '40',
          fontWeight: 'bold'
        }
      },
      labelLine: {
        show: false
      },
      data: [
        { value: 842529631, name: 'Sayuran dan Tanaman Obat' },
        { value: 699461144, name: 'Perlindungan Hortikultura' },
        { value: 465788458, name: 'Sekretariat Direktorat Jenderal Hortikultura' },
        { value: 1219432171, name: 'Perbenihan Hortikultura' },
        { value: 465788458, name: 'Tanaman Buah dan Florikultura' }
      ]
    }
  ]
};


if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
  </script>
<!-- end donut renja -->
<!-- matrix banpem kewenangan -->
<script>
var dom = document.getElementById('banpemkwn');
var myChart = echarts.init(dom, null, {
  renderer: 'svg',
  useDirtyRect: false
});
var app = {};

var option;

option = {
  legend: {
    bottom: 'center',
    top:'bottom'
  },
  tooltip: {},
  dataset: {
    source: [
      ['product', 'KP', 'DK', 'TP Prov', 'TP Kab'],
      ['2019', 43.3, 85.8, 93.7, 10],
      ['2020', 83.1, 73.4, 55.1, 10],
      ['2021', 86.4, 65.2, 82.5, 10],
      ['2022', 72.4, 53.9, 39.1, 10]
    ]
  },
  xAxis: { type: 'category' },
  yAxis: {},
  // Declare several bar series, each will be mapped
  // to a column of dataset.source by default.
  series: [{ type: 'bar' }, { type: 'bar' }, { type: 'bar' }, { type: 'bar' }]
};

if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
</script>
<!-- end matrix banpem kewenangan -->

<!-- matrix banpem -->
<script type="text/javascript">
var dom = document.getElementById('matrix-banpem');
var myChart = echarts.init(dom, null, {
  renderer: 'canvas',
  useDirtyRect: false
});
var app = {};
var option;

option = {
  title: {
    text: 'Realisasi Belanja 526'
  },
  legend: {
    bottom: 'center',
    top:'bottom'
  },
  tooltip: {},
  dataset: {
    source: [
      ['product', 'Pagu', 'Realisasi'],
	  @foreach ($pbData as $d )
      [{{ $d->tahun }}, {{ $d->pagu }}, {{ $d->realisasi }}],
	  @endforeach
    ]
  },
  xAxis: { type: 'category' },
  yAxis: {},
  // Declare several bar series, each will be mapped
  // to a column of dataset.source by default.
  series: [{ type: 'bar' }, { type: 'bar' }]
};

if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
</script>
<!-- end matrix banpem -->
<!-- tanget banpem -->
<script>
var dom = document.getElementById('tangentBanpem');
var myChart = echarts.init(dom, null, {
  renderer: 'canvas',
  useDirtyRect: false
});
var app = {};

var option;

option = {
   title: {
    subtext: '(dalam %)'
  },
  angleAxis: {
    max: 100,
    startAngle: 90,
    splitLine: {
      show: true
    }
  },
  radiusAxis: {
    type: 'category',
    data: [],
    z: 10
  },
  tooltip: {},
  polar: {
    radius: [30, '65%']
  },
  series: [
	@foreach ($pbData as $d )
    {
      type: 'bar',
      data: [{{ $d->nilai }}],
      coordinateSystem: 'polar',
      name: '{{ $d->tahun }}',
      itemStyle: {
        borderColor: 'white',
        opacity: 0.8,
        borderWidth: 1
      }
    },
	@endforeach
  ],
  legend: {
    show: true,
    bottom: 'center',
	top: 'bottom',
    data: ['2019', '2020', '2021', '2022']
  }
};


if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
</script>
<!-- end tanget banpem -->
<!-- line chart Gerdal APH/simpel duti -->
<script>
var dom = document.getElementById('chartAPH');
var myChart = echarts.init(dom, null, {
  renderer: 'svg',
  useDirtyRect: false
});
var app = {};

var option;

option = {
  xAxis: {
    type: 'category',
    data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul']
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [0, 5.5, 5, 7, 10, 9.5, 11],
      type: 'line',
      smooth: true
    }
  ]
};

if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
</script>
<!-- end line chart Gerdal APH/simpel duti -->

<!-- donut Gerdal APH/simpel duti -->
<script>
   var dom = document.getElementById('donutAPH');
var myChart = echarts.init(dom, null, {
  renderer: 'svg',
  useDirtyRect: false
});
var app = {};

var option;

option = {
  title: {
    text: 'Rerata Kinerja',
	subtext:'(nilai hanya contoh)',
    left: 'left'
  },
  tooltip: {
    trigger: 'item'
  },
  series: [
    {
      name: 'Alokasi untuk:',
      type: 'pie',
      radius: ['40%', '70%'],
      avoidLabelOverlap: true,
      itemStyle: {
        borderRadius: 0,
        borderColor: '#fff',
        borderWidth: 0
      },
      label: {
        show: false,
        position: 'center'
      },
      emphasis: {
        label: {
          show: false,
          fontSize: '40',
          fontWeight: 'bold'
        }
      },
      labelLine: {
        show: false
      },
      data: [
        { value: 0, name: 'Kinerja' },
		{ value: 1, name: 'target' }
      ]
    }
  ]
};


if (option && typeof option === 'object') {
  myChart.setOption(option);
}

window.addEventListener('resize', myChart.resize);
  </script>
<!-- end donut Gerdal APH/simpel duti -->

<script>
$('.carousel.carousel-multi-item.v-2 .carousel-item.active').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
    
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>

<script>
  var banpem1;
  var option;
  @for ($i=0;$i<count($banpemyear);$i++)
      
  banpem1 = echarts.init(document.getElementById('banpem{{ $i }}'))
  option = {
    tooltip: {},
    legend: {},
    xAxis: {
        axisLabel: {
              rotate: 45,
        },
        data: [
            @foreach ($databanpem as $k) 
            @if ($k->year == $banpemyear[$i]->year )
                "{{ $k->kwn }}",    
            @endif
            @endforeach
        ],
        
    },
    yAxis: {type: 'value'},
    series: [
        {
        type: 'bar',
        barWidth: '40%',
        label: {},
        data: [
            @foreach ($databanpem as $k) 
            @if ($k->year == $banpemyear[$i]->year )
                "{{ $k->total }}",    
            @endif
            @endforeach
        ]
        }
    ]
  };
  option && banpem1.setOption(option);

  @endfor
</script>

<!-- donut C3 Renja -->
<script>
var chart = c3.generate({
    bindto: '#donutchart',
    data: {
        columns: [
            ['rencana', 0],
            ['alokasi', 100],
        ],
		order: 'null',
        type : 'donut',
        onclick: function (d, i) { console.log("onclick", d, i); },
        onmouseover: function (d, i) { console.log("onmouseover", d, i); },
        onmouseout: function (d, i) { console.log("onmouseout", d, i); }
    },
    donut: {
        title: "Rencana Alokasi"
    },
	legend: {
	  show: false
	},
	color: {
        pattern: ['#1dc9b7','#868e96','#886ab5','#2196F3','#ffc241','#fd3995']
    }
});

setTimeout(function () {
    chart.load({
        columns: [
            ["Sayuran dan Tanaman Obat", 842529631],
            ["Perlindungan Hortikultura", 699461144],
            ["Sekretariat Direktorat Jenderal Hortikultura", 465788458],
            ["Perbenihan Hortikultura", 1219432171],
            ["Tanaman Buah dan Florikultura", 699461144],
            ["Pengolahan dan Pemasaran Hortikultura", 465788458],
        ]
    });
}, 1500);

setTimeout(function () {
    chart.unload({
        ids: 'rencana'
    });
    chart.unload({
        ids: 'alokasi'
    });
}, 2500);


</script>


<script>
	/* demo scripts for change table color */
	/* change background */


	$(document).ready(function()
	{
		$('#tableBanpem').dataTable(
		{
			responsive: true,
			blurable: false,
			keys: true,
			stateSave: true,
			filter: false, //for demo purpose only
			lengthChange: false //for demo purpose only
		});
	});
</script>

@endif
@endsection

