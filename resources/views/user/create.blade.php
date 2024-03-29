@extends('layout.app')
{{-- Customize layout sections --}}
@section('subtitle', 'User')
@section('content_header_title', 'User')
@section('content_header_subtitle', 'Create')
{{-- Content body: main page content --}}
@section('content')
<div class="container">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Tambah user baru</h3>
</div>
<form method="post" action="../user">
@csrf
<div class="card-body">
<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" id="username"
name="username" placeholder="Username">
</div>
<div class="form-group">
<label for="nama">Nama</label>
<input type="text" class="form-control" id="nama"
name="nama" placeholder="Nama">
</div>
<div class="form-group">
<label for="password">Password</label>
<input type="password" class="form-control" id="password"
name="password" placeholder="Password">
</div>
<div class="form-group">
<label for="level_id">ID Level</label>
<input type="number" class="form-control" id="level_id"
name="level_id" placeholder="Id Level">
</div>
</div>
<div class="card-footer">
<button type="submit" class="btn btn-primary fileinputbutton">Simpan</button>
</div>
</form>
</div>
</div>
@endsection
