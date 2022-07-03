<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    const delFirst = false;
    
    public $table = 'kabupatens';

    public static $searchable = [
        'kd_kab',
        'nama_kab',
        'kd_bast',
        'kd_dt1',
        'kd_dt2',
        'kd_kemenkeu',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kd_prop_id',
        'kd_kab',
        'kd_dt1',
        'kd_dt2',
        'nama_kab',
        'kd_bast',
        'lat',
        'lng',
        'created_at',
        'updated_at',
        'deleted_at',
        'kd_kemenkeu',
    ];

    public function kd_prop()
    {
        return $this->belongsTo(Provinsi::class, 'kd_prop_id', 'kd_prop');
    }

    /*public function kd_dt1()
    {
        return $this->belongsTo(Provinsi::class, 'kd_dt1', 'kd_dt1');
    }*/

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    protected function getPrimary()
    {
        return 'kd_kab';
    }
}
