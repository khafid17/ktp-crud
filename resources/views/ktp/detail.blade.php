@extends("layouts.app")

@section("nama", "Detail Ktp") 

@section("content")            
     
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h3><b>Nik</b></h3><br>
                    <b>Nama</b><br><br>
                    <b>Tempat/Tgl Lahir</b><br><br>
                    <b>Jenis Kelamin</b><br><br>
                    <b>Gol Darah</b><br><br>
                    <b>Alamat</b><br><br>
                    <b>RT/RW</b><br><br>
                    <b>Kel/Desa</b><br><br>
                    <b>Kecamatan</b><br><br>
                    <b>Agama</b><br><br>
                    <b>Status Perkawinan</b><br><br>
                    <b>Pekerjaan</b><br><br>
                    <b>Kewarganegaraan</b><br><br>
                    <b>Berlaku Hingga</b><br><br>
                </div>
                <div class="col-4 text-left">
                    <h3><b> : {{$ktp->nik}}</b></h3><br>
                    <b> : {{$ktp->nama}}</b><br><br>
                    <b> : {{$ktp->tmpt_lhr}}/{{$ktp->tgl_lhir}}</b><br><br>
                    <b> : {{$ktp->jenkel}}</b><br><br>
                    <b> : {{$ktp->goldarah}}</b><br><br>
                    <b> : {{$ktp->alamat}}</b><br><br>
                    <b> : {{$ktp->rt}}/{{$ktp->rw}}</b><br><br>
                    <b> : {{$ktp->kel}}</b><br><br>
                    <b> : {{$ktp->kec}}</b><br><br>
                    <b> : {{$ktp->agama}}</b><br><br>
                    <b> : {{$ktp->status}}</b><br><br>
                    <b> : {{$ktp->pekerjaan}}</b><br><br>
                    <b> : {{$ktp->kewarga}}</b><br><br>
                    <b> : {{$ktp->berlaku}}</b><br><br>
                </div>
                <div class="col-4 text-center">
                    <img src="{{asset('storage/'. $ktp->foto)}}" width="180px"/>
                </div>
            </div>
            <hr>
            <a href="{{route('ktp.edit', ['id'=>$ktp->nik])}}" class="btn btn-success">Ubah</a>
            <a href="{{route('ktp.index')}}" class="btn btn-dark"> Kembali </a> 
        </form>
        </div>
    </div>
</div>
@endsection