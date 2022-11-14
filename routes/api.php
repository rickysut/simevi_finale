<?php

//getToken
Route::post('getToken', 'Api\\AuthController@getToken');

Route::group(['as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {



    // Provinsi
    Route::apiResource('provinsis', 'ProvinsiApiController');

    // Kabupaten
    Route::apiResource('kabupatens', 'KabupatenApiController');
    Route::get('kabupatenwithprop/{prop_id}','KabupatenApiController@showWithProp' );
    // Kecamatan
    Route::apiResource('kecamatans', 'KecamatanApiController');
    Route::get('kecamatanwithkab/{kab_id}','KecamatanApiController@showWithKab' );

    // Desa
    Route::apiResource('desas', 'DesaApiController');
    Route::get('desawithkec/{kec_id}','DesaApiController@showWithKec' );

    // Satker
    Route::apiResource('satkers', 'SatkerApiController');

    // Rincian Output
    Route::apiResource('rincian-outputs', 'RincianOutputApiController');

    // Master Kegiatan
    Route::apiResource('master-kegiatans', 'MasterKegiatanApiController');

    // Data Renja
    Route::apiResource('data-renjas', 'DataRenjaApiController');
});
