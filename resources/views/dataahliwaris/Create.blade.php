<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
     <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Buat Data Ahli Waris</title>
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
<h1 class="text-center mt-5"></h1>

  @include('Layout.navbar')
    
  <section class="container mt-4">
    

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Buat Data Ahli Waris</h4>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('dataahliwaris.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_alm" class="form-label">Nama Pewaris</label>
        <input type="text" class="form-control" id="nama_alm" name="nama_alm" required>
    </div>
    <div class="mb-3">
        <label for="nama_pewaris" class="form-label">Nama Ahli Waris</label>
        <input type="text" class="form-control" id="nama_pewaris" name="nama_pewaris" required>
    </div>
    <div class="mb-3">
        <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
        <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" required>
    </div>
    <div class="mb-3">
        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="nalamat" name="alamat" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Data</button>

        </div>
    </div>

</section>

  </body>
</html>