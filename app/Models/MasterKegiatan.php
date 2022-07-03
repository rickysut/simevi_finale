<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterKegiatan extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    const delFirst = false;

    public const STATUS_SELECT = [
        '1' => 'Aktif',
        '0' => 'Non-aktif',
    ];
    
    public $table = 'master_kegiatans';

    public static $searchable = [
        'kd_kegiatan',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'kddept',
        'kdunit',
        'kd_kegiatan',
        'direktorat',
        'nomenklatur_giat',
        'status',
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
        return 'kd_kegiatan';
    }
}
