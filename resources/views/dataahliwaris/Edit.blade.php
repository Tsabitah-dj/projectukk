<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Edit Data Ahli Waris</title>
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0">

    <h1 class="text-center mt-5"></h1>

    @include('Layout.navbar')

    <section class="container mt-4">

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Edit Data Ahli Waris</h4>
        </div>

        <div class="card-body">
          <!-- Form Edit -->
          <form action="{{ route('dataahliwaris.update', $dataahliwaris->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="nama_alm" class="form-label">Nama Ahli Waris</label>
              <input type="text" class="form-control" id="nama_alm" name="nama_alm" value="{{ old('nama_alm', $dataahliwaris->nama_alm) }}" required>
            </div>

            <div class="mb-3">
              <label for="nama_pewaris" class="form-label">Nama Pewaris</label>
              <input type="text" class="form-control" id="nama_pewaris" name="nama_pewaris" value="{{ old('nama_pewaris', $dataahliwaris->nama_pewaris) }}" required>
            </div>

           <div class="mb-3">
                <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                <input type="text" class="form-control" id="hubungan_keluarga" name="hubungan_keluarga" value="{{ old('hubungan_keluarga', $dataahliwaris->hubungan_keluarga) }}" required>
           </div>

            <div class="mb-3">
              <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir', $dataahliwaris->tanggal_lahir) }}" required>
            </div>

            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $dataahliwaris->alamat) }}</textarea>
            </div>

           <div class="d-flex justify-content-between">
              <a href="{{ route('dashboard') }}" class="btn btn-secondary">Batal</a>
              <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>

          </form>
        </div>
      </div>

    </section>

  </body>
</html>
