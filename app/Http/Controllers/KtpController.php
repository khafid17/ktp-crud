<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect\Response;
use Illuminate\Validation\Rule;
use App\Exports\KtpExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KtpImport;
use App\Http\Controllers\Controller;
use App\Ktp;
use PDF;

class KtpController extends Controller
{
    public function index()
    {
        $ktp = \App\Ktp::paginate(10);
        return view('ktp.index',['ktp'=>$ktp]);
    }

    public function create()
    {
        return view('ktp.create');
    }

    public function store(Request $request)
    {   
        \Validator::make( $request->all(),
        ['nik' => 'unique:ktp',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $ktp = new \App\Ktp;
        $ktp->nik =  $request->get('nik');
        $ktp->nama =  $request->get('nama');
        $ktp->tmpt_lhr =  $request->get('tempat');
        $ktp->tgl_lhir =  $request->get('tanggal');
        $ktp->jenkel =  $request->get('jenkel');
        $ktp->goldarah =  $request->get('goldarah');
        $ktp->alamat =  $request->get('alamat');
        $ktp->rt =  $request->get('rt');
        $ktp->rw =  $request->get('rw');
        $ktp->kel =  $request->get('kel');
        $ktp->kec =  $request->get('kec');
        $ktp->agama =  $request->get('agama');
        $ktp->status =  $request->get('kawin');
        $ktp->pekerjaan =  $request->get('pekerjaan');
        $ktp->kewarga =  $request->get('kewarga');
        $ktp->berlaku = date('Y-m-d', strtotime('+5 years'));

        if($request->file('image'))
        {
            $gambar = $request->file('image')->store('foto', 'public');
            
            $ktp->foto = $gambar;
        }

        $ktp->save();
    
        return redirect()->route('ktp.index')->with('status', 'Ktp Berhasil Di Buat');
    }

    public function show($id)
    {
        $ktp = \App\Ktp::findOrFail($id);
        return view('ktp.detail', ['ktp' => $ktp]);
    }

    public function edit($id)
    {
        $ktp = \App\Ktp::findOrFail($id);
        return view('ktp.edit', ['ktp' => $ktp]);
    }

    public function update(Request $request, $id)
    {   
        \Validator::make($request->all(),
        ['nik' => [Rule::unique('ktp')->ignore($id,'nik')],
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'tanggal' => 'before:-17 years',]
        ,['unique' => 'No NIK Tidak Boleh Sama',
        'image' => 'Format Gambar Salah',
        'before' => 'Umur Harus Lebih Dari 17 Tahun',])->validate();

        $ktp = \App\Ktp::findOrFail($id);

        if($request->get('hapus_gambar') == 1)
        {
            if($ktp->foto && file_exists(storage_path('app/public/' . $ktp->foto)))
            {
                \Storage::delete('public/' . $ktp->foto);
                $ktp->foto = NULL;
            }
        }
        
        $ktp->nik =  $request->get('nik');
        $ktp->nama =  $request->get('nama');
        $ktp->tmpt_lhr =  $request->get('tempat');
        $ktp->tgl_lhir =  $request->get('tanggal');
        $ktp->jenkel =  $request->get('jenkel');
        $ktp->goldarah =  $request->get('goldarah');
        $ktp->alamat =  $request->get('alamat');
        $ktp->rt =  $request->get('rt');
        $ktp->rw =  $request->get('rw');
        $ktp->kel =  $request->get('kel');
        $ktp->kec =  $request->get('kec');
        $ktp->agama =  $request->get('agama');
        $ktp->status =  $request->get('kawin');
        $ktp->pekerjaan =  $request->get('pekerjaan');
        $ktp->kewarga =  $request->get('kewarga');

        if($request->file('image'))
        {   
            if($ktp->foto && file_exists(storage_path('app/public/' . $ktp->foto)))
            {
                \Storage::delete('public/' . $ktp->foto);
            }
            $gambar = $request->file('image')->store('foto', 'public');
            $ktp->foto = $gambar;
        }

        $ktp->save();
    
        return redirect()->route('ktp.index')->with('status', 'Ktp Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $ktp = \App\Ktp::findOrFail($id);
        
        if($ktp->foto && file_exists(storage_path('app/public/' . $ktp->foto)))
        {
            \Storage::delete('public/' . $ktp->foto);
        }
        $ktp->delete();
        return redirect()->route('ktp.index')->with('status', 'Ktp Berhasil Di Hapus');
        
    }
    public function export() 
    {
        return Excel::download(new KtpExport, 'data ktp.csv');
    }
    public function import(){
        return view('import');
    }
    public function data(Request $request){
        Excel::import(new KtpImport, $request->file('excel'));
        
        return redirect()->back();
    }

    public function pdf(){
        $ktp = \App\Ktp::all();
        // $pdf = \PDF::loadView('pdf',['ktp'=> $ktp]);
        $pdf = PDF::loadView('pdf', compact('ktp'))->setPaper('a4', 'landscape');
        return $pdf->download('data.pdf');
    }

    // data user
    public function indexuser()
    {
        $ktp = \App\Ktp::paginate(10);
        return view('indexuser',['ktp'=>$ktp]);
    }
    public function exportuser() 
    {
        return Excel::download(new KtpExport, 'data ktp.csv');
    }
    public function pdfuser(){
        $ktp = \App\Ktp::all();
        // $pdf = \PDF::loadView('pdf',['ktp'=> $ktp]);
        $pdf = PDF::loadView('pdf', compact('ktp'))->setPaper([0, 0, 1000.00, 1750.00], 'landscape');
        return $pdf->download('data.pdf');
    }
}
