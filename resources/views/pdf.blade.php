<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     {{-- <h2>{{$judul}}</h2> --}}
     <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nik</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Golongan Darah</th>
            <th>Alamat</th>
            <th>Rt</th>
            <th>Rw</th>
            <th>Kel</th>
            <th>Kec</th>
            <th>Agama</th>
            <th>Status</th>
            <th>Pekerjaan</th>
            <th>Kewarganegaraan</th>
            <th>Masa Berlaku</th>
            <th>Foto</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($ktp as $item)
            <tr>
                <td>{{$item->nik}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->tmpt_lhr}}</td>
                <td>{{$item->tgl_lhir}}</td>
                <td>{{$item->jenkel}}</td>
                <td>{{$item->goldarah}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->rt}}</td>
                <td>{{$item->rw}}</td>
                <td>{{$item->kel}}</td>
                <td>{{$item->kec}}</td>
                <td>{{$item->agama}}</td>
                <td>{{$item->status}}</td>
                <td>{{$item->pekerjaan}}</td>
                <td>{{$item->kewarga}}</td>
                <td>{{$item->berlaku}}</td>
                <td>{{$item->foto}}</td>
              </tr>
            @endforeach

        </tbody>
      </table>
</body>
</html>