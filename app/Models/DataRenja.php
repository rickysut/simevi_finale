<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataRenja extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    const delFirst = true;

    public $table = 'data_renjas';

    public static $searchable = [
        'kdgiat',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'thang',
        'kdjendok',
        'kdsatker',
        'kddept',
        'kdunit',
        'kdprogram',
        'kdgiat',
        'kdoutput',
        'kdlokasi',
        'kdkabkota',
        'kddekon',
        'kdsoutput',
        'kdkmpnen',
        'kdskmpnen',
        'kdakun',
        'kdkppn',
        'kdbeban',
        'kdjnsban',
        'kdctarik',
        'register',
        'carahitung',
        'header1',
        'header2',
        'kdheader',
        'noitem',
        'nmitem',
        'vol1',
        'sat1',
        'vol2',
        'sat2',
        'vol3',
        'sat3',
        'vol4',
        'sat4',
        'volkeg',
        'satkeg',
        'hargasat',
        'jumlah',
        'jumlah2',
        'paguphln',
        'pagurmp',
        'pagurkp',
        'kdblokir',
        'blokirphln',
        'blokirrmp',
        'blokirrkp',
        'rphblokir',
        'kdcopy',
        'kdabt',
        'kdsbu',
        'volsbk',
        'volrkakl',
        'blnkontrak',
        'nokontrak',
        'tgkontrak',
        'nilkontrak',
        'januari',
        'pebruari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'nopember',
        'desember',
        'jmltunda',
        'kdluncuran',
        'jmlabt',
        'norev',
        'kdubah',
        'kurs',
        'indexkpjm',
        'kdib',
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
        return 'thang';
    }

   
}
