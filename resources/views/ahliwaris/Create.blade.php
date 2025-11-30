<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi Surat Ahli Waris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3 m-0 border-0">
<h1 class="text-center mt-5">Form Registrasi Surat Ahli Waris</h1>

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

            <form action="{{ route('surat.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="dataahliwaris_id" class="form-label">Pilih Data Ahli Waris</label>
                    <select name="dataahliwaris_id" id="dataahliwaris_id" class="form-control" required>
                        <option value="">-- Pilih Ahli Waris --</option>
                        @foreach($dataAhliWaris as $data)
                            <option value="{{ $data->id }}">
                                {{ $data->nama_pewaris }} - {{ $data->nama_ahliwaris }}
                            </option>
                        @endforeach
                    </select>
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

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

        </div>
    </div>
</section>

</body>
</html>
