<?php

return [
    'dashboardvip' =>[
        'title'          => 'Ringkasan Eksekutif',
        'title_singular' => 'RINGKASAN EKSEKUTIF',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',   
    ],  
    'detailrenja' =>[
        'title'          => 'Detail Renja',
        'title_singular' => 'Detail Renja',
        'is_parent'      => '0',
        'is_hidden'      => '0', 
        'can_view'       => '1',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',  
        'fields'         => [
            'kabupaten'         => 'Kabupaten',
            'kabupaten_helper'  => ' ',
            'alokasi'           => 'Alokasi',
            'alokasi_helper'    => ' ',
        ], 
    ], 
    'detailbanpem' =>[
        'title'          => 'Sebaran Bantuan',
        'title_singular' => 'Sebaran Bantuan',
        'is_parent'      => '0',
        'is_hidden'      => '0', 
        'can_view'       => '1',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',  
        'fields'         => [
            'totalamount'       => 'total bantuan',
            'totalcash'         => 'bantuan uang',
            'totalfacilities'   => 'bantuan barang',
        ],
    ], 
    'dashboard' =>[
        'title'          => 'Dashboard',
        'title_singular' => 'Dashboard',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',   
    ], 
    'executive' =>[
        'title'          => 'Executive Summary',
        'title_singular' => 'Executive Summary',
        'is_parent'      => '0',
        'is_hidden'      => '0', 
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',   
    ],  
    'pagu' =>[
        'title'          => 'Monitoring Kinerja Anggaran',
        'title_singular' => 'Monitoring Kinerja Anggaran',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',   
    ], 
    'banpem' =>[
        'title'          => 'Monitoring Kinerja Bantuan',
        'title_singular' => 'Monitoring Kinerja Bantuan',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',   
    ], 
    'appConnection' => [
        'title'          => 'Aplikasi',
        'title_singular' => 'Aplikasi',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'appAnggaran' => [
        'title'          => 'App Anggaran',
        'title_singular' => 'App Anggaran',
        'is_parent'      => '1',
        'is_hidden'      => '0', 
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'dataRenja' => [
        'title'          => 'Data Renja',
        'title_singular' => 'Data Renja',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1',  
        'can_create'     => '1', 
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'thang'             => 'Thang',
            'thang_helper'      => ' ',
            'kdjendok'          => 'kdjendok',
            'kdjendok_helper'   => ' ',
            'kdsatker'          => 'kdsatker',
            'kdsatker_helper'   => ' ',
            'kddept'            => 'kddept',
            'kddept_helper'     => ' ',
            'kdunit'            => 'kdunit',
            'kdunit_helper'     => ' ',
            'kdprogram'         => 'kdprogram',
            'kdprogram_helper'  => ' ',
            'kdgiat'            => 'kdgiat',
            'kdgiat_helper'     => ' ',
            'kdoutput'          => 'kdoutput',
            'kdoutput_helper'   => ' ',
            'kdlokasi'          => 'kdlokasi',
            'kdlokasi_helper'   => ' ',
            'kdkabkota'         => 'kdkabkota',
            'kdkabkota_helper'  => ' ',
            'kddekon'           => 'kddekon',
            'kddekon_helper'    => ' ',
            'kdsoutput'         => 'kdsoutput',
            'kdsoutput_helper'  => ' ',
            'kdkmpnen'          => 'kdkmpnen',
            'kdkmpnen_helper'   => ' ',
            'kdskmpnen'         => 'kdskmpnen',
            'kdskmpnen_helper'  => ' ',
            'kdakun'            => 'kdakun',
            'kdakun_helper'     => ' ',
            'kdkppn'            => 'kdkppn',
            'kdkppn_helper'     => ' ',
            'kdbeban'           => 'kdbeban',
            'kdbeban_helper'    => ' ',
            'kdjnsban'          => 'kdjnsban',
            'kdjnsban_helper'   => ' ',
            'kdctarik'          => 'kdctarik',
            'kdctarik_helper'   => ' ',
            'register'          => 'register',
            'register_helper'   => ' ',
            'carahitung'        => 'carahitung',
            'carahitung_helper' => ' ',
            'header1'          => 'header1',
            'header1_helper'   => ' ',
            'header2'          => 'header2',
            'header2_helper'   => ' ',
            'kdheader'          => 'kdheader',
            'kdheader_helper'   => ' ',
            'noitem'            => 'noitem',
            'noitem_helper'     => ' ',
            'nmitem'            => 'nmitem',
            'nmitem_helper'     => ' ',
            'vol1'             => 'vol1',
            'vol1_helper'      => ' ',
            'sat1'             => 'sat1',
            'sat1_helper'      => ' ',
            'vol2'             => 'vol2',
            'vol2_helper'      => ' ',
            'sat2'             => 'sat2',
            'sat2_helper'      => ' ',
            'vol3'             => 'vol3',
            'vol3_helper'      => ' ',
            'sat3'             => 'sat3',
            'sat3_helper'      => ' ',
            'vol4'             => 'vol4',
            'vol4_helper'      => ' ',
            'sat4'             => 'sat4',
            'sat4_helper'      => ' ',
            'volkeg'            => 'volkeg',
            'volkeg_helper'     => ' ',
            'satkeg'            => 'satkeg',
            'satkeg_helper'     => ' ',
            'hargasat'          => 'hargasat',
            'hargasat_helper'   => ' ',
            'jumlah'            => 'jumlah',
            'jumlah_helper'     => ' ',
            'jumlah2'          => 'jumlah2',
            'jumlah2_helper'   => ' ',
            'paguphln'          => 'paguphln',
            'paguphln_helper'   => ' ',
            'pagurmp'           => 'pagurmp',
            'pagurmp_helper'    => ' ',
            'pagurkp'           => 'pagurkp',
            'pagurkp_helper'    => ' ',
            'kdblokir'          => 'kdblokir',
            'kdblokir_helper'   => ' ',
            'blokirphln'        => 'blokirphln',
            'blokirphln_helper' => ' ',
            'blokirrmp'         => 'blokirrmp',
            'blokirrmp_helper'  => ' ',
            'blokirrkp'         => 'blokirrkp',
            'blokirrkp_helper'  => ' ',
            'rphblokir'         => 'rphblokir',
            'rphblokir_helper'  => ' ',
            'kdcopy'            => 'kdcopy',
            'kdcopy_helper'     => ' ',
            'kdabt'             => 'kdabt',
            'kdabt_helper'      => ' ',
            'kdsbu'             => 'kdsbu',
            'kdsbu_helper'      => ' ',
            'volsbk'            => 'volsbk',
            'volsbk_helper'     => ' ',
            'volrkakl'          => 'volrkakl',
            'volrkakl_helper'   => ' ',
            'blnkontrak'        => 'blnkontrak',
            'blnkontrak_helper' => ' ',
            'nokontrak'         => 'nokontrak',
            'nokontrak_helper'  => ' ',
            'tgkontrak'         => 'tgkontrak',
            'tgkontrak_helper'  => ' ',
            'nilkontrak'        => 'nilkontrak',
            'nilkontrak_helper' => ' ',
            'januari'           => 'januari',
            'januari_helper'    => ' ',
            'pebruari'          => 'pebruari',
            'pebruari_helper'   => ' ',
            'maret'             => 'maret',
            'maret_helper'      => ' ',
            'april'             => 'april',
            'april_helper'      => ' ',
            'mei'               => 'mei',
            'mei_helper'        => ' ',
            'juni'              => 'juni',
            'juni_helper'       => ' ',
            'juli'              => 'juli',
            'juli_helper'       => ' ',
            'agustus'           => 'agustus',
            'agustus_helper'    => ' ',
            'september'         => 'september',
            'september_helper'  => ' ',
            'oktober'           => 'oktober',
            'oktober_helper'    => ' ',
            'nopember'          => 'nopember',
            'nopember_helper'   => ' ',
            'desember'          => 'desember',
            'desember_helper'   => ' ',
            'jmltunda'          => 'jmltunda',
            'jmltunda_helper'   => ' ',
            'kdluncuran'        => 'kdluncuran',
            'kdluncuran_helper' => ' ',
            'jmlabt'            => 'jmlabt',
            'jmlabt_helper'     => ' ',
            'norev'             => 'norev',
            'norev_helper'      => ' ',
            'kdubah'            => 'kdubah',
            'kdubah_helper'     => ' ',
            'kurs'              => 'kurs',
            'kurs_helper'       => ' ',
            'indexkpjm'         => 'indexkpjm',
            'indexkpjm_helper'  => ' ',
            'kdib'              => 'kdib',
            'kdib_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'dataPagu' => [
        'title'          => 'Data Pagu',
        'title_singular' => 'Data Pagu',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'tahun'              => 'tahun',
            'tahun_helper'       => ' ',
            'kdsatker'           => 'kdsatker',
            'kdsatker_helper'    => ' ',
            'ba'                 => 'ba',
            'ba_helper'          => ' ',
            'baes_1'             => 'baes1',
            'baes_1_helper'      => ' ',
            'akun'               => 'akun',
            'akun_helper'        => ' ',
            'program'            => 'program',
            'program_helper'     => ' ',
            'kegiatan'           => 'kegiatan',
            'kegiatan_helper'    => ' ',
            'output'             => 'output',
            'output_helper'      => ' ',
            'kewenangan'         => 'kewenangan',
            'kewenangan_helper'  => ' ',
            'sumber_dana'        => 'sumber_dana',
            'sumber_dana_helper' => ' ',
            'cara_tarik'         => 'cara_tarik',
            'cara_tarik_helper'  => ' ',
            'kdregister'         => 'kdregister',
            'kdregister_helper'  => ' ',
            'lokasi'             => 'lokasi',
            'lokasi_helper'      => ' ',
            'budget_type'        => 'budget_type',
            'budget_type_helper' => ' ',
            'amount'             => 'amount',
            'amount_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    
    'dataRealisasi' => [
        'title'          => 'Data Realisasi',
        'title_singular' => 'Data Realisasi',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'tahun'              => 'tahun',
            'tahun_helper'       => ' ',
            'kdsatker'           => 'kdsatker',
            'kdsatker_helper'    => ' ',
            'ba'                 => 'ba',
            'ba_helper'          => ' ',
            'baes_1'             => 'baes1',
            'baes_1_helper'      => ' ',
            'akun'               => 'akun',
            'akun_helper'        => ' ',
            'program'            => 'program',
            'program_helper'     => ' ',
            'kegiatan'           => 'kegiatan',
            'kegiatan_helper'    => ' ',
            'output'             => 'output',
            'output_helper'      => ' ',
            'kewenangan'         => 'kewenangan',
            'kewenangan_helper'  => ' ',
            'sumber_dana'        => 'sumber_dana',
            'sumber_dana_helper' => ' ',
            'cara_tarik'         => 'cara_tarik',
            'cara_tarik_helper'  => ' ',
            'kdregister'         => 'kdregister',
            'kdregister_helper'  => ' ',
            'lokasi'             => 'lokasi',
            'lokasi_helper'      => ' ',
            'budget_type'        => 'budget_type',
            'budget_type_helper' => ' ',
            'tanggal'            => 'tanggal',
            'tanggal_helper'     => ' ',
            'amount'             => 'amount',
            'amount_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    
    
    'kinerjaSerapan' => [
        'title'          => 'Nilai Kinerja Percepatan',
        'title_singular' => 'Nilai Kinerja Percepatan',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'no'                => 'No',
            'no_helper'         => ' ',
            'kegiatan'          => 'Kegiatan',
            'kegiatan_helper'   => ' ',
            'tw_1'              => 'TW-1',
            'tw_1_helper'       => ' ',
            'tw_2'              => 'TW-2',
            'tw_2_helper'       => ' ',
            'tw_3'              => 'TW-3',
            'tw_3_helper'       => ' ',
            'tw_4'              => 'TW-4',
            'tw_4_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'realisasiSatker' => [
        'title'          => 'Realisasi Anggaran Satker',
        'title_singular' => 'Realisasi Anggaran Satker',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'appBanpem' => [
        'title'          => 'App Banpem',
        'title_singular' => 'App Banpem',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'dataBanpem' => [
        'title'          => 'Data Banpem',
        'title_singular' => 'Data Banpem',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
    ],
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'perm_type'         => 'Type',
            'perm_type_helper'  => ' ',
            'grp_title'         => 'Group Title',
            'grp_title_helper'  => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1',
        'can_create'     => '1', 
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'username'                 => 'Username',
            'username_helper'          => 'Username',
        ],
    ],
    'auditLog' => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'masterData' => [
        'title'          => 'Master Data',
        'title_singular' => 'Master Data',
        'is_parent'      => '1',
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '0', 
        'can_delete'     => '0',  
        'can_access'     => '1', 
        'can_create'     => '0',
    ],
    'backdateBanpem' => [
        'title'          => 'Banpem',
        'title_singular' => 'Banpem',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
            'year'                 => 'Tahun',
            'year_helper'          => 'Tahun data',
            'kd_satker'            => 'Kode Satker',
            'kd_satker_helper'     => ' ',
            'provinsi'             => 'Provinsi',
            'provinsi_helper'      => ' ',
            'kab_kota'             => 'Kab Kota',
            'kab_kota_helper'      => ' ',
            'nm_gapoktan'          => 'Nama Gapoktan',
            'nm_gapoktan_helper'   => ' ',
            'nm_barang'            => 'Nama Barang',
            'nm_barang_helper'     => ' ',
            'total'                => 'Total',
            'total_helper'         => ' ',
            'satuan'               => 'Satuan',
            'satuan_helper'        => ' ',
            'nominal'              => 'Nominal',
            'nominal_helper'       => ' ',
            'kd_giat'              => 'Kode Kegiatan',
            'kd_giat_helper'       => ' ',
            'kd_akun'              => 'Kode Akun',
            'kd_akun_helper'       => ' ',
            'kwn'                  => 'Kewenangan',
            'kwn_helper'           => ' ',
        ],
    ],
    'belanja' => [
        'title'          => 'Realisasi Belanja 526',
        'title_singular' => 'Realisasi Belanja 526',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'tahun'             => 'Tahun',
            'tahun_helper'      => ' ',
            'kewenangan'        => 'Kewenangan',
            'kewenangan_helper' => ' ',
            'pagu'              => 'Pagu',
            'pagu_helper'       => ' ',
            'realisasi'         => 'Realisasi',
            'realisasi_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'akun' => [
        'title'          => 'Akun',
        'title_singular' => 'Akun',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_akun'           => 'Kode Akun',
            'kd_akun_helper'    => ' ',
            'nama_akun'         => 'Nama Akun',
            'nama_akun_helper'  => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'pendekatan'        => 'Pendekatan',
            'pendekatan_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'jenis'             => 'Jenis',
            'jenis_helper'      => ' ',
        ],
    ],
    'provinsi' => [
        'title'          => 'Provinsi',
        'title_singular' => 'Provinsi',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_prop'           => 'Kode Propinsi',
            'kd_prop_helper'    => ' ',
            'kd_dt1'            => 'Kode DT1',
            'kd_dt1_helper'     => ' ',
            'nm_prop'           => 'Nama Propinsi',
            'nm_prop_helper'    => ' ',
            'kd_bast'           => 'Kode BAST',
            'kd_bast_helper'    => ' ',
            'lat'               => 'Latitude',
            'lat_helper'        => ' ',
            'lng'               => 'Longitude',
            'lng_helper'        => ' ',
            'kd_satker'         => 'Kode Satker',
            'kd_satker_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'kd_kemenkeu'       => 'Kode Kemenkeu',
            'kd_kemenkeu_helper' => ' ',
            
        ],
    ],
    'kabupaten' => [
        'title'          => 'Kabupaten',
        'title_singular' => 'Kabupaten',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_prop'           => 'Kode Propinsi',
            'kd_prop_helper'    => ' ',
            'kd_kab'            => 'Kode Kabupaten',
            'kd_kab_helper'     => ' ',
            'kd_dt1'            => 'Kode DT1',
            'kd_dt1_helper'     => ' ',
            'kd_dt2'            => 'Kode DT2',
            'kd_dt2_helper'     => ' ',
            'nama_kab'          => 'Nama Kabupaten',
            'nama_kab_helper'   => ' ',
            'kd_bast'           => 'Kode BAST',
            'kd_bast_helper'    => ' ',
            'lat'               => 'Latitude',
            'lat_helper'        => ' ',
            'lng'               => 'Longitude',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'kd_kemenkeu'       => 'Kode Kemenkeu',
            'kd_kemenkeu_helper' => ' ',
        ],
    ],
    'kecamatan' => [
        'title'          => 'Kecamatan',
        'title_singular' => 'Kecamatan',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_kab'            => 'Kode Kabupaten',
            'kd_kab_helper'     => ' ',
            'kd_kec'            => 'Kode Kecamatan',
            'kd_kec_helper'     => ' ',
            'kd_dt2'            => 'Kode DT2',
            'kd_dt2_helper'     => ' ',
            'kd_dt3'            => 'Kode DT3',
            'kd_dt3_helper'     => ' ',
            'nm_kec'            => 'Nama Kecamatan',
            'nm_kec_helper'     => ' ',
            'kd_bast'           => 'Kode BAST',
            'kd_bast_helper'    => ' ',
            'lat'               => 'Latitude',
            'lat_helper'        => ' ',
            'lng'               => 'Longitude',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'kd_kemenkeu'       => 'Kode Kemenkeu',
            'kd_kemenkeu_helper' => ' ',
        ],
    ],
    'desa' => [
        'title'          => 'Desa',
        'title_singular' => 'Desa',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_kec'            => 'Kode Kecamatan',
            'kd_kec_helper'     => ' ',
            'kd_desa'           => 'Kode Desa',
            'kd_desa_helper'    => ' ',
            'kd_dt3'            => 'Kode DT3',
            'kd_dt3_helper'     => ' ',
            'kd_dt4'            => 'Kode DT4',
            'kd_dt4_helper'     => ' ',
            'nm_desa'           => 'Nama Desa',
            'nm_desa_helper'    => ' ',
            'kd_bast'           => 'Kode BAST',
            'kd_bast_helper'    => ' ',
            'lat'               => 'Latitude',
            'lat_helper'        => ' ',
            'lng'               => 'Longitude',
            'lng_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'kd_kemenkeu'       => 'Kode Kemenkeu',
            'kd_kemenkeu_helper' => ' ',
        ],
    ],
    'satker' => [
        'title'          => 'Satker',
        'title_singular' => 'Satker',
        'is_parent'      => '0',
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1', 
        'can_create'     => '1',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'kd_satker'         => 'Kode Satker',
            'kd_satker_helper'  => ' ',
            'nm_satker'         => 'Nama Satker',
            'nm_satker_helper'  => ' ',
            'kd_kwn'            => 'Kode Kewenangan',
            'kd_kwn_helper'     => ' ',
            'kwn'               => 'Kewenangan',
            'kwn_helper'        => ' ',
            'tingkat'           => 'Tingkat',
            'tingkat_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
        ],
    ],
    'rincianOutput' => [
        'title'          => 'Rincian Output',
        'title_singular' => 'Rincian Output',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1',  
        'can_create'     => '1', 
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'idoutp'            => 'idoutp',
            'idoutp_helper'     => ' ',
            'idoutp_1'          => 'idoutp_1',
            'idoutp_1_helper'   => ' ',
            'kdgiat'            => 'kdgiat',
            'kdgiat_helper'     => ' ',
            'kdoutput'          => 'kdoutput',
            'kdoutput_helper'   => ' ',
            'nmoutput'          => 'nmoutput',
            'nmoutput_helper'   => ' ',
            'sat'               => 'sat',
            'sat_helper'        => ' ',
            'kdsum'             => 'kdsum',
            'kdsum_helper'      => ' ',
            'thnawal'           => 'thnawal',
            'thnawal_helper'    => ' ',
            'thnakhir'          => 'thnakhir',
            'thnakhir_helper'   => ' ',
            'kdmulti'           => 'kdmulti',
            'kdmulti_helper'    => ' ',
            'kdjnsout'          => 'kdjnsout',
            'kdjnsout_helper'   => ' ',
            'kdikk'             => 'kdikk',
            'kdikk_helper'      => ' ',
            'kdtema'            => 'kdtema',
            'kdtema_helper'     => ' ',
            'kdcttout'          => 'kdcttout',
            'kdcttout_helper'   => ' ',
            'thang'             => 'thang',
            'thang_helper'      => ' ',
            'kdpn'              => 'kdpn',
            'kdpn_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'masterKegiatan' => [
        'title'          => 'Master Kegiatan',
        'title_singular' => 'Master Kegiatan',
        'is_parent'      => '0', 
        'is_hidden'      => '0',
        'can_view'       => '1',
        'can_edit'       => '1', 
        'can_delete'     => '1',  
        'can_access'     => '1',  
        'can_create'     => '1', 
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'kddept'                  => 'Kd. Dept',
            'kddept_helper'           => ' ',
            'kdunit'                  => 'Kd Unit',
            'kdunit_helper'           => ' ',
            'kd_kegiatan'             => 'Kd Kegiatan',
            'kd_kegiatan_helper'      => ' ',
            'direktorat'              => 'Direktorat',
            'direktorat_helper'       => ' ',
            'nomenklatur_giat'        => 'Nomenklatur Giat',
            'nomenklatur_giat_helper' => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    
    'profile' =>[
        'title'          => 'Profile',
        'title_singular' => 'Profile',
        'is_parent'      => '1', 
        'is_hidden'      => '0',
        'can_view'       => '0',
        'can_edit'       => '1', 
        'can_delete'     => '0',  
        'can_access'     => '0',  
        'can_create'     => '0', 
    ],
];
