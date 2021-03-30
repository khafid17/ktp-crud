<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtpTable extends Migration
{
    public function up()
    {
        Schema::create('ktp', function (Blueprint $table) {
            $table->BigInteger('nik')->primary();
            $table->string('nama',70);
            $table->string('tmpt_lhr',50);
            $table->date('tgl_lhir');
            $table->enum('jenkel',['Laki-Laki','Perempuan']);
            $table->enum('goldarah',['A','B','O','AB']);
            $table->text('alamat');
            $table->char('rt',4);
            $table->char('rw',4);
            $table->string('kel',50);
            $table->string('kec',50);
            $table->enum('agama',['Katholik','Kristen','Islam','Hindu','Budha','Konghucu']);
            $table->enum('status',['Kawin','Belum Kawin']);
            $table->string('pekerjaan',50);
            $table->enum('kewarga',['WNI','WNA']);
            $table->date('berlaku');
            $table->string('foto',200)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ktp');
    }
}
