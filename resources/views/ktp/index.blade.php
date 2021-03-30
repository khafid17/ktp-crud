@extends("layouts.app")

@section("nama", "Daftar KTP") 

@section("content")          
    @if(session('status'))
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('status')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    @endif 
    
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="input-group-append">
                <a href="{{route('ktp.create')}}" class="btn btn-primary">Tambah KTP</a>
            </div>
            <div class="text-right">
                <a href="{{url('/import')}}" class="btn btn-secondary">Import CSV</a>
                <a href="{{url('/export')}}" class="btn btn-secondary">Export CSV</a>
                <a href="{{url('/laporan')}}" class="btn btn-secondary">Export PDF</a>
            </div>
            
        </div>
        <div class="card-body">
            <div class="table-responsiveurl">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                <thead>
                    <tr>
                    <th width="25%"><b>Gambar</b></th>
                    <th width="25%"><b>NIK</b></th>
                    <th width="25%"><b>Nama</b></th>
                    <th width="25%"><b>Aksi</b></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($ktp as $data)
                   <tr>
                   <td>
                        @if($data->foto)
                            <img 
                            src="{{asset('storage/' . $data->foto)}}" 
                            width="48px"/>
                        @else 
                            No image
                        @endif
                    </td>
                   <td>{{$data->nik}}</td>
                   <td>{{$data->nama}}</td>
                   <td>
                        <a href="{{route('ktp.show', ['id' => $data->nik])}}" class="btn btn-info">Show</a>
                        <a href="{{route('ktp.edit', ['id' => $data->nik])}}" class="btn btn-success">Edit</a>
                        <form  class="d-inline" action="{{route('ktp.destroy', ['id' => $data->nik])}}" 
                        method="POST"  onsubmit="return confirm('Apakah Anda Yakin Akan Menghapus Ktp?')" >
                        @csrf 
                        <input type="hidden"name="_method" value="DELETE"/>
                        <button type="submit" class="btn btn-danger" >Delete</button>
                        </form>
                   </td>
                   </tr>
                @endforeach
                </tbody>
                </table>
                {{ $ktp->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

