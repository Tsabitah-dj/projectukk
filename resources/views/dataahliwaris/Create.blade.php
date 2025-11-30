<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Data Ahli Waris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
</head>
<body class="bg-light">

    @include('Layout.navbar')

    <section class="container mt-5">

        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Buat Data Ahli Waris</h4>
            </div>

            <div class="card-body">

                {{-- Notifikasi sukses --}}
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('dataahliwaris.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_pewaris" class="form-label">Nama Pewaris</label>
                        <input type="text" class="form-control" id="nama_pewaris" name="nama_pewaris" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_ahliwaris" class="form-label">Nama Ahli Waris</label>
                        <input type="text" class="form-control" id="nama_ahliwaris" name="nama_ahliwaris" required>
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
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="dokumen" class="form-label">Dokumen (PDF, DOC, XLS, dll)</label>
                        <input type="file" class="form-control" id="dokumen" name="dokumen">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </form>

            </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
