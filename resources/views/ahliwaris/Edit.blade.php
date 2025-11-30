<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Edit Data register Ahli Waris</title>
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0">

    <h1 class="text-center mt-5"></h1>

    @include('Layout.navbar')

    <section class="container mt-4">

      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Edit Registrasi Ahli Waris</h4>
        </div>

        <div class="card-body">
          <!-- Form Edit -->
          <form action="{{ route('surat.update', $ahliwaris->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                    <label for="dataahliwaris_id" class="form-label">Pilih Data Ahli Waris</label>
                    <select name="dataahliwaris_id" id="dataahliwaris_id" class="form-control" required>
                        <option value="">-- Pilih Ahli Waris --</option>
                        @foreach($dataAhliWaris as $data)
                            <option value="{{ $data->id }}" {{ $ahliwaris->dataahliwaris_id == $data->id ? 'selected' : '' }}>
                                {{ $data->nama_pewaris }} - {{ $data->nama_ahliwaris }}
                            </option>
                        @endforeach
                    </select>
                </div>

            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $ahliwaris->tanggal) }}" required>
            </div>

            <div class="mb-3">
              <label for="no_register" class="form-label">No Register</label>
              <input type="text" class="form-control" id="no_register" name="no_register" value="{{ old('no_register', $ahliwaris->no_register) }}" required>
            </div>

            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $ahliwaris->alamat) }}</textarea>
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
