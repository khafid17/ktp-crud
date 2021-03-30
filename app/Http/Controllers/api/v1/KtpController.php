<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Ktp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KtpController extends Controller
{
    public function index()
    {
        $ktp = Ktp::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Ktp',
            'data' => $ktp
        ], 200);
    }
    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'nik'     => 'required',
            'nama'   => 'required',
        ],
            [
                'nik.required' => 'Masukkan Nik !',
                'nama.required' => 'Masukkan Nama !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],401);

        } else {

            $ktp = Ktp::create([
                'nik'     => $request->input('nik'),
                'nama'   => $request->input('nama')
            ]);

            if ($ktp) {
                return response()->json([
                    'success' => true,
                    'message' => 'Ktp Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Ktp Gagal Disimpan!',
                ], 401);
            }
        }
    }
    public function show($nik)
    {
        $ktp = ktp::whereId($nik)->first();


        if ($ktp) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Ktp!',
                'data'    => $ktp
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Ktp Tidak Ditemukan!',
                'data'    => ''
            ], 401);
        }
    }
}
