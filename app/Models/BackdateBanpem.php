<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BackdateBanpem extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    const delFirst = true;
    
    public $table = 'backdate_banpems';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'year',
        'kd_satker',
        'provinsi',
        'kab_kota',
        'nm_gapoktan',
        'nm_barang',
        'total',
        'satuan',
        'nominal',
        'kd_giat',
        'kd_akun',
        'kwn',
        'jenis_barang',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function getPrimary()
    {
        return 'year';
    }
}
