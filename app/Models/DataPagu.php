<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPagu extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    const delFirst = true;

    public $table = 'data_pagus';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tahun',
        'kdsatker',
        'ba',
        'baes_1',
        'akun',
        'program',
        'kegiatan',
        'output',
        'kewenangan',
        'sumber_dana',
        'cara_tarik',
        'kdregister',
        'lokasi',
        'budget_type',
        'amount',
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
        return 'tahun';
    }
}
