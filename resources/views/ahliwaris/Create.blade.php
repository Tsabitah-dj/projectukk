<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
     <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Buat Data Register Ahli Waris</title>
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
<h1 class="text-center mt-5"></h1>

  @include('Layout.navbar')
    
  <section class="container mt-4">
    

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Registrasi Surat Ahli Waris</h4>
        </div>

        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_pemohon" class="form-label">Nama Pewaris</label>
        <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" required>
    </div>
    <div class="mb-3">
        <label for="nama_alm" class="form-label">Nama Ahli Waris</label>
        <input type="text" class="form-control" id="nama_alm" name="nama_alm" required>
    </div>
    <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
    </div>
    <div class="mb-3">
        <label for="no_register" class="form-label">No Register</label>
        <input type="text" class="form-control" id="no_register" name="no_register" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required>
    </div>
    <div class="mb-3">
        <label for="bukti_register" class="form-label">Bukti Register</label>
        <input type="file" class="form-control" id="bukti_register" name="bukti_register" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

        </div>
    </div>

</section>

  </body>
</html>