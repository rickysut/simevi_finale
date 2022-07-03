<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RincianOutput extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;
    
    const delFirst = false;

    public $table = 'rincian_outputs';

    public static $searchable = [
        'idoutp',
        'idoutp_1',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'idoutp',
        'idoutp_1',
        'kdgiat',
        'kdoutput',
        'nmoutput',
        'sat',
        'kdsum',
        'thnawal',
        'thnakhir',
        'kdmulti',
        'kdjnsout',
        'kdikk',
        'kdtema',
        'kdcttout',
        'thang',
        'kdpn',
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
        return 'idoutp';
    }
}
