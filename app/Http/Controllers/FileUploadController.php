<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_gambar' => 'required|string|min:3',
            'nama_aplikasi' => 'required|string|min:3',
            'berkas_gambar' => 'required|file|image|max:500',
            'berkas_aplikasi' => 'required|file|max:2048|mimes:pdf,doc,docx',
        ]);

        if ($validator->fails()) {
            return redirect('/file-upload')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Menangani upload gambar
        $fileImage = $request->file('berkas_gambar');
        $namaFileGambar = $request->input('nama_gambar') . '.' . $fileImage->getClientOriginalExtension();
        $pathGambar = $fileImage->move(public_path('image'), $namaFileGambar);
        $pathBaruGambar = asset('image/' . $namaFileGambar);

        // Menangani upload aplikasi
        $fileApplication = $request->file('berkas_aplikasi');
        $namaFileAplikasi = $request->input('nama_aplikasi') . '.' . $fileApplication->getClientOriginalExtension();
        $pathAplikasi = $fileApplication->move(public_path('applications'), $namaFileAplikasi);
        $pathBaruAplikasi = asset('applications/' . $namaFileAplikasi);

        return view('file-upload-success', [
            'namaFileGambar' => $namaFileGambar,
            'pathBaruGambar' => $pathBaruGambar,
            'NamaFileAplikasi' => $namaFileAplikasi,
            'pathBaruAplikasi' => $pathBaruAplikasi,
        ]);
    }
}
