<?php

namespace App\Exports;

use App\Ktp;
use Maatwebsite\Excel\Concerns\FromCollection;

class KtpExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ktp::all();
    }
}
