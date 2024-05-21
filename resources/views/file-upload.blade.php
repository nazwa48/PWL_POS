<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Upload File</title>
</head>
<body>
    <div class="container mt-3">
        <h2>Upload File</h2>
        <hr>

        <form class="m-lg-4" action="{{ url('/file-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nama_gambar" class="form-label">Nama Gambar</label>
                <input type="text" class="form-control" id="nama_gambar" name="nama_gambar" value="{{ old('nama_gambar') }}">
                @error('nama_gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="berkas_gambar" class="form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="berkas_gambar" name="berkas_gambar">
                @error('berkas_gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="nama_aplikasi" class="form-label">Nama Aplikasi</label>
                <input type="text" class="form-control" id="nama_aplikasi" name="nama_aplikasi" value="{{ old('nama_aplikasi') }}">
                @error('nama_aplikasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <label for="berkas_aplikasi" class="form-label">File Aplikasi</label>
                <input type="file" class="form-control" id="berkas_aplikasi" name="berkas_aplikasi">
                @error('berkas_aplikasi')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary my-2">Upload</button>
        </form>
    </div>
</body>
</html>
