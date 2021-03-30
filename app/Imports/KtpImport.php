<?php

namespace App\Imports;

use App\Ktp;
use Maatwebsite\Excel\Concerns\ToModel;

class KtpImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    
        return new Ktp([
            'nik' => $row[0],
            'nama' => $row[1],
            'tmpt_lhr' => $row[2],
            'tgl_lhir' => $row[3],
            'jengkel' => $row[4],
            'goldarah' => $row[5],
            'alamat' => $row[6],
            'rt' => $row[7],
            'rw' => $row[8],
            'kel' => $row[9],
            'kec' => $row[10],
            'agama' => $row[11],
            'status' => $row[12],
            'pekerjaan' => $row[13],
            'kewarga' => $row[14],
            'berlaku' => $row[15],
            'foto' => $row[16]
        ]);
    }
}
