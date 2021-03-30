@extends("layouts.app")

@section("nama", "Import Data") 

@section("content")  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Import Data') }}</div>

                <div class="card-body">
                    <form action="{{route('ktp.data')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="excel">
                        <input type="submit" value="Import">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>        
@endsection

