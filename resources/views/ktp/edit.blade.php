@extends("layouts.app")

@section("nama", "Ubah Ktp")


@section("content")            

<div class="container">
  <div class="card shadow mb-4">
    <div class="card-body">
     <form  action="{{route('ktp.update', ['id' => $ktp->nik])}}" enctype="multipart/form-data" method="POST">
        @csrf 
        <input type="hidden"value="PUT"  name="_method">

        <div class='form-row'>

            <div class="form-group col-12">
                <label>Nik : </label>
                <input type="number" name="nik" class="form-control {{$errors->first('nik') ? "is-invalid" : ""}}" value="{{old('nik') ? old('nik') : $ktp->nik}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('nik')}}
                </div>
            </div>

            <div class="form-group col-12">
                <label>Nama : </label>
                <input type="text" name="nama" value="{{old('nama') ? old('nama') : $ktp->nama}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tempat Lahir : </label>
                <input type="text" name="tempat" value="{{old('tempat') ? old('tempat') : $ktp->tmpt_lhr}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tgl Lahir : </label>
                <input type="date" name="tanggal" value="{{old('tanggall') ? old('tanggal') : $ktp->tgl_lhir}}" class="form-control {{$errors->first('tanggal') ? "is-invalid" : ""}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('tanggal')}}
                </div>
            </div>

            <div class="form-group col-6">
                <label>Jenis Kelamin : </label>
                <select class="form-control" name="jenkel" required>
                    <option value="Laki-Laki" {{old('jenkel',$ktp->jenkel) == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{old('jenkel',$ktp->jenkel) == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Golongan Darah : </label>
                <select class="form-control" name="goldarah" required>
                    <option value="A" {{old('goldarah',$ktp->goldarah) == 'A' ? 'selected' : ''}}>A</option>
                    <option value="B" {{old('goldarah',$ktp->goldarah) == 'B' ? 'selected' : ''}}>B</option>
                    <option value="O" {{old('goldarah',$ktp->goldarah) == 'O' ? 'selected' : ''}}>O</option>
                    <option value="AB" {{old('goldarah',$ktp->goldarah) == 'AB' ? 'selected' : ''}}>AB</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Alamat : </label>
                <textarea name="alamat" class="form-control">{{old('alamat') ? old('alamat') : $ktp->alamat}}</textarea>
            </div>

            <div class="form-group col-2">
                <label>RT : </label>
                <input type="numer" name="rt" value="{{old('rt') ? old('rt') : $ktp->rt}}" class="form-control" required/>
            </div>

            <div class="form-group col-2">
                <label>RW : </label>
                <input type="numer" name="rw" value="{{old('rw') ? old('rw') : $ktp->rw}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kel/Desa : </label>
                <input type="text" name="kel" value="{{old('kel') ? old('kel') : $ktp->kel}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kecamatan : </label>
                <input type="text" name="kec" value="{{old('kec') ? old('kec') : $ktp->kec}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Agama : </label>
                <select class="form-control" name="agama" required>
                    <option value="Katholik" {{old('agama',$ktp->agama) == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                    <option value="Kristen" {{old('agama',$ktp->agama) == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                    <option value="Islam" {{old('agama',$ktp->agama) == 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="Hindu" {{old('agama',$ktp->agama) == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                    <option value="Budha" {{old('agama',$ktp->agama) == 'Budha' ? 'selected' : ''}}>Budha</option>
                    <option value="Konghucu" {{old('agama',$ktp->agama) == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Status Perkawinan : </label>
                <select class="form-control" name="kawin"  required>
                    <option value="Kawin" {{old('kawin',$ktp->status) == 'Kawin' ? 'selected' : ''}}>Kawin</option>
                    <option value="Belum Kawin" {{old('kawin',$ktp->status) == 'Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Pekerjaan : </label>
                <input type="text" name="pekerjaan" value="{{old('pekerjaan') ? old('pekerjaan') : $ktp->pekerjaan}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Kewarganegaraan : </label>
                <select class="form-control" name="kewarga" required>
                    <option value="WNI" {{old('kewarga',$ktp->kewarga) == 'WNI' ? 'selected' : ''}}>WNI</option>
                    <option value="WNA" {{old('kewarga',$ktp->kewarga) == 'WNA' ? 'selected' : ''}}>WNA</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Foto : </label><br>
                @if($ktp->foto)
                    <img src="{{asset('storage/'. $ktp->foto)}}" width="300px"><br><br>
                    <input type="checkbox" name="hapus_gambar" value="1"> Centang Untuk Menghapus Gambar<br><br>
                @endif
                <input type="file" name="image" value="{{old('image')}}" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"/>
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
            </div>
        </div>
        <hr>
        <input type="submit" class="btn btn-success" value="Ubah">
        <a href="{{route('ktp.index')}}" class="btn btn-dark"> Kembali </a> 

      </form> 
    </div>
  </div>
</div>
@endsection