<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>

        <!-- base css -->
	
        <link href="{{ asset('css/smartadmin/vendors.bundle.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/smartadmin/app.bundle.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/smartadmin/skin-master.css') }}" rel="stylesheet" />
    </head>
    <body class="antialiased">
        
        <div class="galery">
    
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
        
        
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <h3>Selamat datang</h3>
                        <h1>Sistem Monitoring dan Evaluasi Hortikultura Indonesia</h1>
                    </div>
                    <div class="card card-primary">
                        <div class="card-body">
                            <div>
                                <div class="btn-group w-100 mb-2">
                                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="1">  Ditjen</a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="10"> Sekdit </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="20"> Ditbenih </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="30"> Ditbuflo </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="40"> DitSTO </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="50"> Ditlin </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="60"> DitPPHH </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="100"> Kementan </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="200"> BPS RI </a>
                                    <a class="btn btn-info" href="javascript:void(0)" data-filter="300"> Kementerian/ Lembaga </a>
                              </div>
                                <div class="mb-2">
                                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle=""> Shuffle items </a>
                                    <div class="float-right">
                                        <select class="custom-select" style="width: auto;" data-sortorder="">
                                            <option value="index"> Sort by Position </option>
                                            <option value="sortData"> Sort by Custom Data </option>
                                        </select>
                                        <div class="btn-group">
                                                <a class="btn btn-default" href="javascript:void(0)" data-sortasc=""> Ascending </a>
                                            <a class="btn btn-default" href="javascript:void(0)" data-sortdesc=""> Descending </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 1418px;">
                                    <div class="filtr-item col-md-2 " data-category="1,10" data-sort="sekdit" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                        <a href="https://sipedas.pertanian.go.id/" title="Sistem Penyediaan Data Statistik Pertanian Hortikutlura">
                                        <img src="{{ asset('images/web_sipedas_thumb_210x120.png') }}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                          <h5>Sipedas</h5>
                                          <p class="mb-5">Sistem Penyediaan Data Statistik Pertanian Hortikutlura</p>
                                        </a>
                                </div>
                                <div class="filtr-item col-md-2 " data-category="1,10" data-sort="sekdit" style="opacity: 1; transform: scale(1) translate3d(221px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                    <a href="http://data.hortikultura.pertanian.go.id/webi/" title="Dokumentasi Webinar Hortikultura">
                                        <img src="{{ asset('images/web_webinar_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                        <h5>Webinar</h5>
                                        <p class="mb-5">Dokumentasi Webinar Hortikultura</p>
                                     </a>
                                 </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,10" data-sort="sekdit" style="opacity: 1; transform: scale(1) translate3d(442px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://data.hortikultura.pertanian.go.id/horti/" title="Warehouse data hortikultura">
                                                      <img src="{{ asset('images/web_data_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Data Hortikultura</h5>
                                                      <p class="mb-5">Warehouse data hortikultura</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,10" data-sort="sekdit" style="opacity: 1; transform: scale(1) translate3d(663px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://data.hortikultura.pertanian.go.id/evita/" title="Evaluasi data pengembangan hortikultura">
                                                      <img src="{{ asset('images/web_evita_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Evita</h5>
                                                      <p class="mb-5">Evaluasi data pengembangan hortikultura</p>
                                                  </a>
                                                </div>
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="100" data-sort="pusdatim" style="opacity: 1; transform: scale(1) translate3d(884px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://bastbanpem.pertanian.go.id/2021/" title="Bast Banpem 526 Hortikultura">
                                                      <img src="{{ asset('images/web_bastbanpem_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>BAST Banpem 526</h5>
                                                      <p class="mb-5">Bast Banpem 526 Hortikultura</p>
                                                  </a>
                                                </div>
                                                                                        <div class="filtr-item col-md-2 " data-category="1,10" data-sort="sekdit" style="opacity: 1; transform: scale(1) translate3d(1105px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://riph.pertanian.go.id/" title="Rekomendasi Impor Produk Hortikultura">
                                                      <img src="{{ asset('images/web_riph_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>RIPH</h5>
                                                      <p class="mb-5">Rekomendasi Impor Produk Hortikultura</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,40" data-sort="ditsto" style="opacity: 1; transform: scale(1) translate3d(0px, 259px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://simethris.hortikultura.pertanian.go.id/" title="Sistam Monitoring Tanam Hortikultura Strategis">
                                                      <img src="{{ asset('images/web_simethris_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Simethris</h5>
                                                      <p class="mb-5">Sistam Monitoring Tanam Hortikultura Strategis</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,40" data-sort="ditsto" style="opacity: 1; transform: scale(1) translate3d(221px, 259px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://sitoba.pertanian.go.id/" title="Sistem Informasi Tanaman Obat">
                                                      <img src="{{ asset('images/web_sitoba_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Sitoba</h5>
                                                      <p class="mb-5">Sistem Informasi Tanaman Obat</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,40" data-sort="ditsto" style="opacity: 1; transform: scale(1) translate3d(442px, 259px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://horti.pertanian.go.id/simcabai/" title="Sistem Informasi Tanaman Cabai">
                                                      <img src="{{ asset('images/web_simcabai_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Simcabai</h5>
                                                      <p class="mb-5">Sistem Informasi Tanaman Cabai</p>
                                                  </a>
                                                </div>
        
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,30" data-sort="ditbuflo" style="opacity: 1; transform: scale(1) translate3d(663px, 235px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://florimap.hortikultura.pertanian.go.id/" title="Peta Sentra Florikultura">
                                                      <img src="{{ asset('images/web_florimap_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Florimap</h5>
                                                      <p class="mb-5">Peta Sentra Florikultura</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,40" data-sort="ditsto" style="opacity: 1; transform: scale(1) translate3d(884px, 259px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://sitoba.pertanian.go.id/" title="Manajemen Produksi Jamur Tiram">
                                                      <img src="{{ asset('images/web_mappan_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Mappan</h5>
                                                      <p class="mb-5">Manajemen Produksi Jamur Tiram</p>
                                                  </a>
                                                </div>
        
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="100" data-sort="pusdatin" style="opacity: 1; transform: scale(1) translate3d(1105px, 235px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://database.pertanian.go.id/eksim2012" title="Database eksim">
                                                      <img src="{{ asset('images/web_eksim_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Eksim</h5>
                                                      <p class="mb-5">Database eksim</p>
                                                  </a>
                                                </div>
        
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,60" data-sort="ditpphh" style="opacity: 1; transform: scale(1) translate3d(0px, 518px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://simpapah.pertanian.go.id/" title="Sistem Informasi Pascapanen Hortikultura">
                                                      <img src="{{ asset('images/web_simpapah_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Simpapah</h5>
                                                      <p class="mb-5">Sistem Informasi Pascapanen Hortikultura</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,60" data-sort="ditpphh" style="opacity: 1; transform: scale(1) translate3d(221px, 518px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://reglahan.hortikultura.pertanian.go.id/" title="Registrasi Lahan Hortikultura GAP">
                                                      <img src="{{ asset('images/web_registrasilahan_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Registrasi Lahan</h5>
                                                      <p class="mb-5">Registrasi Lahan Hortikultura GAP</p>
                                                  </a>
                                                </div>
        
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,60" data-sort="ditpphh" style="opacity: 1; transform: scale(1) translate3d(442px, 470px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://11ap.pertanian.go.id/sipashorti/" title="Sistem Informasi Pasar">
                                                      <img src="{{ asset('images/web_sipashorti_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Sipas Horti</h5>
                                                      <p class="mb-5">Sistem Informasi Pasar</p>
                                                  </a>
                                                </div>
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,60" data-sort="pusdatin" style="opacity: 1; transform: scale(1) translate3d(663px, 518px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://aplikasi2.pertanian.go.id/sartika/" title="Sistem Informasi Agribisnis Hortikultura">
                                                      <img src="{{ asset('images/web_sartika_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Sartika</h5>
                                                      <p class="mb-5">Sistem Informasi Agribisnis Hortikultura</p>
                                                  </a>
                                                </div>
        
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,60" data-sort="pusdatin" style="opacity: 1; transform: scale(1) translate3d(884px, 470px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://hortitraderoom.com/" title="Hortikultura Trade Room">
                                                      <img src="{{ asset('images/web_htr_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>HTR</h5>
                                                      <p class="mb-5">Hortikultura Trade Room</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,50" data-sort="ditlin" style="opacity: 1; transform: scale(1) translate3d(1105px, 518px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://horti.pertanian.go.id/ewsditlin/" title="Dampak Iklim Banjir dan kekeringan">
                                                      <img src="{{ asset('images/web_dpi_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Dampak Iklim</h5>
                                                      <p class="mb-5">Dampak Iklim Banjir dan kekeringan</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,50" data-sort="ditlin" style="opacity: 1; transform: scale(1) translate3d(0px, 777px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://horti.pertanian.go.id/sigopt" title="Sistem Informasi Geografis OPT ">
                                                      <img src="{{ asset('images/web_sigopt_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>SIGOPT</h5>
                                                      <p class="mb-5">Sistem Informasi Geografis OPT </p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="1,20" data-sort="ditbenih" style="opacity: 1; transform: scale(1) translate3d(221px, 777px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="http://varitas.net/dbvarietas/" title="Daftar Varietas Terdaftar Hortikultura">
                                                      <img src="{{ asset('images/web_dbvarietas_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Database Varietas</h5>
                                                      <p class="mb-5">Daftar Varietas Terdaftar Hortikultura</p>
                                                  </a>
                                                </div>
        
                                                                                        <div class="filtr-item col-md-2 " data-category="200" data-sort="bpsri" style="opacity: 1; transform: scale(1) translate3d(442px, 777px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://sirusa.bps.go.id/sirusa/" title="Sistem Informasi Rujukan Statistik">
                                                      <img src="{{ asset('images/web_sirusa_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Sirusa</h5>
                                                      <p class="mb-5">Sistem Informasi Rujukan Statistik</p>
                                                  </a>
                                                </div>
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="200" data-sort="bpsri" style="opacity: 1; transform: scale(1) translate3d(663px, 705px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://www.bps.go.id/subject/55/hortikultura.html#subjekViewTab3" title="Data hortikultura di BPS RI">
                                                      <img src="{{ asset('images/web_databps_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Data Hortikultura</h5>
                                                      <p class="mb-5">Data hortikultura di BPS RI</p>
                                                  </a>
                                                </div>
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="200" data-sort="bpsri" style="opacity: 1; transform: scale(1) translate3d(884px, 705px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://www.bps.go.id/subject/22/nilai-tukar-petani.html#subjekViewTab3" title="Nilai Tukar Petani">
                                                      <img src="{{ asset('images/web_ntp_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>NTP</h5>
                                                      <p class="mb-5">Nilai Tukar Petani</p>
                                                  </a>
                                                </div>
        
        
                                                                                        <div class="filtr-item col-md-2 " data-category="300" data-sort="kemendag" style="opacity: 1; transform: scale(1) translate3d(1105px, 777px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://ews.kemendag.go.id/" title="Sistem Pemantauan Pasar dan Kebutuhan Pokok">
                                                      <img src="{{ asset('images/web_ewskemendag_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>EWS Kemendag</h5>
                                                      <p class="mb-5">Sistem Pemantauan Pasar dan Kebutuhan Pokok</p>
                                                  </a>
                                                </div>
        
                                                <div class="filtr-item col-md-2 " data-category="300" data-sort="tanahair" style="opacity: 1; transform: scale(1) translate3d(0px, 1036px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                  <a href="https://tanahair.indonesia.go.id/map" title="Peta Tematik antar KL dalam simpul jaringan">
                                                      <img src="{{ asset('images/web_tanahair_thumb_210x120.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                      <h5>Peta Tematik antar KL</h5>
                                                      <p class="mb-5">Peta Tematik antar KL dalam simpul jaringan</p>
                                                  </a>
                                                </div>

                                                <div class="filtr-item col-md-2 " data-category="300" data-sort="tanahair" style="opacity: 1; transform: scale(1) translate3d(0px, 1036px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 217.5px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                                    <a href="{{ route('login') }}" title="SiBanpem">
                                                        <img src="{{ asset('images/web_simevi.png')}}" class="img-fluid mb-2" alt="image" style="height:120px;">
                                                        <h5>SiBanpem / SiMEvI</h5>
                                                        <p class="mb-5">Data Bantuan Pemerintah Untuk Hortikultura Indonesia</p>
                                                    </a>
                                                  </div>
        
        
        
                                                
        
        
        
                                  </div>
        
        
        
        
                            </div>
        
                        </div>
                    </div>
        
                   
                
                </div>
            </div>
        </div>
        <script src="{{ asset('js/vendors.bundle.js') }}"></script>
        <script src="{{ asset('js/app.bundle.js') }}"></script>
        <script src="{{asset('js/ekko-lightbox/ekko-lightbox.js')}}"></script>
        <script src="{{asset('js/filterizr/jquery.filterizr.min.js')}}"></script>
        <script>
            $(function () {
              $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                  alwaysShowClose: true
                });
              });

              $('.filter-container').filterizr({gutterPixels: 3});
              $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
              });
            })
          </script>
    </body>
</html>
