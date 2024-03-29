<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }


    public function create() : View
    {
        return view('kategori.create');
    }

    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'kodeKategori' => 'bail|required|string|max:255',
    //         'namaKategori' => 'bail|required|string|max:255',
    //     ]);
    //     KategoriModel::create([
    //         'kategori_kode' => $request->kodeKategori,
    //         'kategori_nama' => $request->namaKategori,
    //     ]);
    //     return redirect('/kategori');
    //}
    
    public function store(StorePostRequest $request): RedirectResponse
    {

        // The incoming request is valid...

        // Retrieve the validated input data...
        $request->validate();

        // Retrieve a portion of the validated input data...
        $request->safe()->only(['kategori_kode', 'kategori_nama']);
        $request->safe()->except(['kategori_kode', 'kategori_nama']);

        return redirect('/kategori');
    }
    

    public function update($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.update',['data' => $kategori]);
    }

    public function update_save($id, Request $request){
        $kategori = KategoriModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }

    public function destroy($id)
    {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
  
}


        // $data = [
        // 'kategori_kode' => 'SNK',
        // 'kategori_nama' => 'Snack/Makanan Ringan',
        // 'created_at' => now()
        //  ];
        // DB::table('m_kategori') -> insert($data);
        // return 'insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update(['kategori_nama' => 'Camilan']);
        // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row. ' baris';

        // $data = DB::table('m_kategori')->get();
        // return view('kategori', ['data' => $data]);
    
