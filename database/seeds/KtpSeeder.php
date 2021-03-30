<?php

use Illuminate\Database\Seeder;

class KtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                DB::table('users')->insert([
                    'nik' => 121212121,
                    'nama' => 'jon',
                    'tmpt_lhr' => 'blora',
                    'tgl_lhir' => 12-12-1999,
                    'jengkel' => 'Laki-Laki',
                    'goldarah' => 'A',
                    'alamat' => 'jatim',
                    'rt' =>'1',
                    'rw' => '1',
                    'kel' => 'jambang',
                    'kec' => 'mijen',
                    'agama' => 'hindu',
                    'status' => 'kawin',
                    'pekerjaan' =>'it',
                    'kewarga' => 'wna',
                    'berlaku' => 12-12-202,
                    'foto' => 'foto.jpg'
        ]);
    }
}
