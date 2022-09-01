<?php


Route::view('/', 'welcome');
// Route::redirect('/', '/login');

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('/vip', 'HomeController@vip')->name('dashboardvip');
    Route::post('/adminSetLocale', 'HomeController@adminSetLocale')->name('setlocale');
    Route::get('/vip', 'HomeController@vip')->name('dashboardvip');
    //Route::get('/summary', 'HomeController@executive')->name('executive');
    Route::get('/pagu', 'HomeController@pagu')->name('pagu');
    Route::post('/pagu', 'HomeController@pagu')->name('pagu');
    Route::get('/banpem', 'HomeController@banpem')->name('banpem');

    // DetailExecutive
    Route::get('/detailrenja', 'DetailExecutiveController@index')->name('detailrenja');
    Route::post('/detailrenja', 'DetailExecutiveController@index')->name('detailrenja');
    Route::get('/detrenjaview/{idk}/{nmkab}', 'DetailExecutiveController@show')->name('detailrenja.show');
    
    Route::get('/detailbanpem', 'DetailExecutiveController@banpem')->name('detailbanpem');
    Route::post('/detailbanpem', 'DetailExecutiveController@banpem')->name('detailbanpem');
    Route::get('/detbanpemview/{year}/{provinsi}', 'DetailExecutiveController@banpemshow')->name('detailbanpem.show');
    Route::get('/banpemgetdataprov/{year1}/{year2}/{provinsi}','DetailExecutiveController@getdataProv');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Backdate Banpem
    Route::delete('backdate-banpems/destroy', 'BackdateBanpemController@massDestroy')->name('backdate-banpems.massDestroy');
    Route::post('backdate-banpems/parse-csv-import', 'BackdateBanpemController@parseCsvImport')->name('backdate-banpems.parseCsvImport');
    Route::post('backdate-banpems/process-csv-import', 'BackdateBanpemController@processCsvImport')->name('backdate-banpems.processCsvImport');
    Route::resource('backdate-banpems', 'BackdateBanpemController');

    // Akun
    Route::delete('akuns/destroy', 'AkunController@massDestroy')->name('akuns.massDestroy');
    Route::post('akuns/parse-csv-import', 'AkunController@parseCsvImport')->name('akuns.parseCsvImport');
    Route::post('akuns/process-csv-import', 'AkunController@processCsvImport')->name('akuns.processCsvImport');
    Route::resource('akuns', 'AkunController');

    // Provinsi
    Route::delete('provinsis/destroy', 'ProvinsiController@massDestroy')->name('provinsis.massDestroy');
    Route::post('provinsis/parse-csv-import', 'ProvinsiController@parseCsvImport')->name('provinsis.parseCsvImport');
    Route::post('provinsis/process-csv-import', 'ProvinsiController@processCsvImport')->name('provinsis.processCsvImport');
    Route::resource('provinsis', 'ProvinsiController');

    // Kabupaten
    Route::delete('kabupatens/destroy', 'KabupatenController@massDestroy')->name('kabupatens.massDestroy');
    Route::post('kabupatens/parse-csv-import', 'KabupatenController@parseCsvImport')->name('kabupatens.parseCsvImport');
    Route::post('kabupatens/process-csv-import', 'KabupatenController@processCsvImport')->name('kabupatens.processCsvImport');
    Route::resource('kabupatens', 'KabupatenController');

    // Kecamatan
    Route::delete('kecamatans/destroy', 'KecamatanController@massDestroy')->name('kecamatans.massDestroy');
    Route::post('kecamatans/parse-csv-import', 'KecamatanController@parseCsvImport')->name('kecamatans.parseCsvImport');
    Route::post('kecamatans/process-csv-import', 'KecamatanController@processCsvImport')->name('kecamatans.processCsvImport');
    Route::resource('kecamatans', 'KecamatanController');

    // Desa
    Route::delete('desas/destroy', 'DesaController@massDestroy')->name('desas.massDestroy');
    Route::post('desas/parse-csv-import', 'DesaController@parseCsvImport')->name('desas.parseCsvImport');
    Route::post('desas/process-csv-import', 'DesaController@processCsvImport')->name('desas.processCsvImport');
    Route::resource('desas', 'DesaController');

    // Belanja
    Route::delete('belanjas/destroy', 'BelanjaController@massDestroy')->name('belanjas.massDestroy');
    Route::post('belanjas/parse-csv-import', 'BelanjaController@parseCsvImport')->name('belanjas.parseCsvImport');
    Route::post('belanjas/process-csv-import', 'BelanjaController@processCsvImport')->name('belanjas.processCsvImport');
    Route::resource('belanjas', 'BelanjaController');

    // Satker
    Route::delete('satkers/destroy', 'SatkerController@massDestroy')->name('satkers.massDestroy');
    Route::post('satkers/parse-csv-import', 'SatkerController@parseCsvImport')->name('satkers.parseCsvImport');
    Route::post('satkers/process-csv-import', 'SatkerController@processCsvImport')->name('satkers.processCsvImport');
    Route::resource('satkers', 'SatkerController');
    
    // Data Pagu
    Route::delete('data-pagus/destroy', 'DataPaguController@massDestroy')->name('data-pagus.massDestroy');
    Route::post('data-pagus/parse-csv-import', 'DataPaguController@parseCsvImport')->name('data-pagus.parseCsvImport');
    Route::post('data-pagus/process-csv-import', 'DataPaguController@processCsvImport')->name('data-pagus.processCsvImport');
    Route::resource('data-pagus', 'DataPaguController');

    // Detail Pagu
    Route::resource('detail-pagus', 'DetailPaguController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Data Realisasi
    Route::delete('data-realisasis/destroy', 'DataRealisasiController@massDestroy')->name('data-realisasis.massDestroy');
    Route::post('data-realisasis/parse-csv-import', 'DataRealisasiController@parseCsvImport')->name('data-realisasis.parseCsvImport');
    Route::post('data-realisasis/process-csv-import', 'DataRealisasiController@processCsvImport')->name('data-realisasis.processCsvImport');
    Route::resource('data-realisasis', 'DataRealisasiController');

    // Detail Realisasi
    Route::resource('detail-realisasis', 'DetailRealisasiController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Outstanding
    Route::resource('outstandings', 'OutstandingController');

    // Detail Outstanding
    Route::resource('detail-outstandings', 'DetailOutstandingController', ['except' => ['create', 'store', 'edit', 'update', 'show', 'destroy']]);

    // Kinerja Serapan
   
    Route::get('/detailserapan', 'KinerjaSerapanController@index')->name('detailserapan');
    Route::post('/detailserapan', 'KinerjaSerapanController@index')->name('detailserapan');
    //Route::resource('kinerja-serapans', 'KinerjaSerapanController');
    
    // Realisasi Satker
    
    Route::get('/realisasisatker', 'RealisasiSatkerController@index')->name('realisasisatker');
    Route::post('/realisasisatker', 'RealisasiSatkerController@index')->name('realisasisatker');
    //Route::resource('realisasi-satker', 'RealisasiSatkerController');
    Route::get('/detsatkerview/{kdsatker}/{tahun}/{tanggal}', 'RealisasiSatkerController@show')->name('realisasisatker.show');
    

    // Rincian Output
    Route::delete('rincian-outputs/destroy', 'RincianOutputController@massDestroy')->name('rincian-outputs.massDestroy');
    Route::post('rincian-outputs/parse-csv-import', 'RincianOutputController@parseCsvImport')->name('rincian-outputs.parseCsvImport');
    Route::post('rincian-outputs/process-csv-import', 'RincianOutputController@processCsvImport')->name('rincian-outputs.processCsvImport');
    Route::resource('rincian-outputs', 'RincianOutputController');

    // Master Kegiatan
    Route::delete('master-kegiatans/destroy', 'MasterKegiatanController@massDestroy')->name('master-kegiatans.massDestroy');
    Route::post('master-kegiatans/parse-csv-import', 'MasterKegiatanController@parseCsvImport')->name('master-kegiatans.parseCsvImport');
    Route::post('master-kegiatans/process-csv-import', 'MasterKegiatanController@processCsvImport')->name('master-kegiatans.processCsvImport');
    Route::resource('master-kegiatans', 'MasterKegiatanController');

    // Data Renja
    Route::delete('data-renjas/destroy', 'DataRenjaController@massDestroy')->name('data-renjas.massDestroy');
    Route::post('data-renjas/parse-csv-import', 'DataRenjaController@parseCsvImport')->name('data-renjas.parseCsvImport');
    Route::post('data-renjas/process-csv-import', 'DataRenjaController@processCsvImport')->name('data-renjas.processCsvImport');
    Route::resource('data-renjas', 'DataRenjaController');


    Route::get('global-search', 'GlobalSearchController@search')->name('globalSearch');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
