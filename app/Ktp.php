<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ktp extends Model
{
    protected $table = 'ktp';
    protected $primaryKey = 'nik';

    protected $casts = ['nik' => 'bigint'];

    protected $fillable = [
        'nik', 'nama', 'tmpt_lhr','tgl_lhir','jenkel','goldarah',
        'alamat','rt','rw','kel','kec','agama','status','pekerjaan',
        'kewarga','berlaku','foto'
    ];
}
