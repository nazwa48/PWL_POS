@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body"> 
        @empty($transaksi)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('transaksi') }}" class="btn btn-sm btn-default mt- 2">Kembali</a>
        @else
        <form method="POST" action="{{ url('/transaksi/'.$transaksi->penjualan_id) }}" class="form-horizontal">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">User</label>
                <div class="col-11">
                    <select class="form-control" id="user_id" name="user_id" required>
                        <option value="">- Pilih User -</option> @foreach($user as $item)
                        <option value="{{ $item->user_id }}" @if($item->user_id ==
                            $transaksi->user_id) selected @endif>{{ $item->username }}</option> @endforeach
                    </select> 
                    @error('user_id')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Barang</label>
                <div class="col-11">
                    <select class="form-control" id="barang_id" name="barang_id" required>
                        <option value="">- Pilih Barang -</option> @foreach($barang as $item)
                        <option value="{{ $item->barang_id }}" @if($item->barang_id ==
                            $transaksi->detail->barang_id) selected @endif>{{ $item->barang_nama }}</option> @endforeach
                    </select> 
                    @error('barang_id')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Pembeli</label>
                <div class="col-11">
                    <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{ old('pembeli', $transaksi->pembeli) }}" required>
                    @error('pembeli')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Tanggal</label>
                <div class="col-11">
                    <input type="date" class="form-control" id="penjualan_tanggal" name="penjualan_tanggal" value="{{ old('penjualan_tanggal', date('Y-m-d',strtotime($transaksi->penjualan_tanggal))) }}" required>
                    @error('penjualan_tanggal')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Jumlah</label>
                <div class="col-11">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $transaksi->detail->jumlah) }}" required>
                    @error('jumlah')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label">Harga</label>
                <div class="col-11">
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $transaksi->detail->harga) }}" required>
                    @error('harga')
                    <small class="form-text text-danger">{{ $message }}</small> @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-1 control-label col-form-label"></label>
                <div class="col-11">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('transaksi') }}">Kembali</a>
                </div>
            </div>
        </form> @endempty
    </div>
</div> @endsection

@push('css') 
@endpush 
@push('js')
@endpush