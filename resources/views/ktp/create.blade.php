@extends("layouts.app")

@section("nama", 'Tambah Ktp')

@section("content")            
  
<div class="container">
  <div class="card shadow mb-4">
    <div class="card-body">
      <form enctype="multipart/form-data"  action="{{route('ktp.store')}}"  method="POST">
        @csrf
       <div class='form-row'>
            <div class="form-group col-12">
                <label>Nik : </label>
                <input type="number" name="nik" class="form-control {{$errors->first('nik') ? "is-invalid" : ""}}" value="{{old('nik')}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('nik')}}
                </div>
            </div>

            <div class="form-group col-12">
                <label>Nama : </label>
                <input type="text" name="nama" value="{{old('nama')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tempat Lahir : </label>
                <input type="text" name="tempat" value="{{old('tempat')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Tgl Lahir : </label>
                <input type="date" name="tanggal" value="{{old('tanggal')}}" class="form-control {{$errors->first('tanggal') ? "is-invalid" : ""}}" required/>
                <div class="invalid-feedback">
                    {{$errors->first('tanggal')}}
                </div>
            </div>

            <div class="form-group col-6">
                <label>Jenis Kelamin : </label>
                <select class="form-control" name="jenkel" required>
                    <option value="Laki-Laki" {{old('jenkel') == 'Laki-Laki' ? 'selected' : ''}}>Laki-Laki</option>
                    <option value="Perempuan" {{old('jenkel') == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Golongan Darah : </label>
                <select class="form-control" name="goldarah" required>
                    <option value="A" {{old('goldarah') == 'A' ? 'selected' : ''}}>A</option>
                    <option value="B" {{old('goldarah') == 'B' ? 'selected' : ''}}>B</option>
                    <option value="O" {{old('goldarah') == 'O' ? 'selected' : ''}}>O</option>
                    <option value="AB" {{old('goldarah') == 'AB' ? 'selected' : ''}}>AB</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Alamat : </label>
                <textarea name="alamat" class="form-control">{{old('alamat')}}</textarea>
            </div>

            <div class="form-group col-2">
                <label>RT : </label>
                <input type="numer" name="rt" value="{{old('rt')}}" class="form-control" required/>
            </div>

            <div class="form-group col-2">
                <label>RW : </label>
                <input type="numer" name="rw" value="{{old('rw')}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kel/Desa : </label>
                <input type="text" name="kel" value="{{old('rt')}}" class="form-control" required/>
            </div>

            <div class="form-group col-4">
                <label>Kecamatan : </label>
                <input type="text" name="kec" value="{{old('kec')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Agama : </label>
                <select class="form-control" name="agama" required>
                    <option value="Katholik" {{old('agama') == 'Katholik' ? 'selected' : ''}}>Katholik</option>
                    <option value="Kristen" {{old('agama') == 'Kristen' ? 'selected' : ''}}>Kristen</option>
                    <option value="Islam" {{old('agama') == 'Islam' ? 'selected' : ''}}>Islam</option>
                    <option value="Hindu" {{old('agama') == 'Hindu' ? 'selected' : ''}}>Hindu</option>
                    <option value="Budha" {{old('agama') == 'Budha' ? 'selected' : ''}}>Budha</option>
                    <option value="Konghucu" {{old('agama') == 'Konghucu' ? 'selected' : ''}}>Konghucu</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Status Perkawinan : </label>
                <select class="form-control" name="kawin"  required>
                    <option value="Kawin" {{old('kawin') == 'Kawin' ? 'selected' : ''}}>Kawin</option>
                    <option value="Belum Kawin" {{old('kawin') == 'Belum Kawin' ? 'selected' : ''}}>Belum Kawin</option>
                </select>
            </div>

            <div class="form-group col-6">
                <label>Pekerjaan : </label>
                <input type="text" name="pekerjaan" value="{{old('pekerjaan')}}" class="form-control" required/>
            </div>

            <div class="form-group col-6">
                <label>Kewarganegaraan : </label>
                <select class="form-control" name="kewarga" required>
                    <option value="WNI" {{old('kewarga') == 'WNI' ? 'selected' : ''}}>WNI</option>
                    <option value="WNA" {{old('kewarga') == 'WNA' ? 'selected' : ''}}>WNA</option>
                </select>
            </div>

            <div class="form-group col-12">
                <label>Foto : </label><br>
                <input type="file" name="image" value="{{old('image')}}" class="form-control {{$errors->first('image') ? "is-invalid" : ""}}"/>
                <div class="invalid-feedback">
                    {{$errors->first('image')}}
                </div>
            </div>
        </div>
        <br>
        <hr>
        <input type="submit" class="btn btn-success" value="Tambah">
        <a href="{{route('ktp.index')}}" class="btn btn-dark"> Kembali </a> 

      </form> 
    </div>
  </div>
</div>
@endsection