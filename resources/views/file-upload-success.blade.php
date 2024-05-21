<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Upload File Berhasil</title>
</head>
<body>
    <div class="container mt-3">
        <h2>File Berhasil Diupload</h2>
        <hr>

        <p>Gambar berhasil diupload ke <a href="{{ $pathBaruGambar }}">{{ $namaFileGambar }}</a></p>
        <img src="{{ $pathBaruGambar }}" style="width: 500px; height: 500px;">

        <p>File aplikasi berhasil diupload ke <a href="{{ $pathBaruAplikasi }}">{{ $NamaFileAplikasi }}</a></p>
    </div>
</body>
</html>
