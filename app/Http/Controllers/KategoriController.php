<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller {
    public function index(KategoriDataTable $dataTable) {
        return $dataTable->render('kategori.index');
    }

    public function create() {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request) : RedirectResponse {

        // $validated = $request->validate([
        //     'kodeKategori' => 'bail|required|unique:posts|max:255',
        //     'namaKategori' => 'required',
        // ]);

        // $validated = $request->validateWithBag([
        //     'kodeKategori' => 'bail|required|unique:posts|max:255',
        //     'namaKategori' => 'required',
        // ]);

        $validated = $request->validate();

        $validated = $request->safe()->only(['kodeKategori','namaKategori']);
        $validated = $request->safe()->except(['kodeKategori','namaKategori']);

        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function update($id) {
        $kategori = KategoriModel::find($id);
        return view('kategori.update', ['data' => $kategori]);
    }

    public function save_update($id, Request $request) {
        $kategori = KategoriModel::find($id);
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;
        $kategori->save();
        return redirect('/kategori');
    }

    public function delete($id) {
        $kategori = KategoriModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
