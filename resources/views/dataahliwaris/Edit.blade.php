<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Data Ahli Waris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('custom.css') }}">
</head>
<body class="bg-light">

@include('Layout.navbar')

<section class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Edit Data Ahli Waris</h4>
            <span class="badge bg-light text-dark">User: {{ auth()->user()->name }}</span>
        </div>

        <div class="card-body">

            {{-- Notifikasi sukses --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            {{-- Notifikasi error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('dataahliwaris.update', $dataahliwaris->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_pewaris" class="form-label">Nama Pewaris</label>
                    <input type="text" class="form-control @error('nama_pewaris') is-invalid @enderror" 
                        id="nama_pewaris" name="nama_pewaris" 
                        value="{{ old('nama_pewaris', $dataahliwaris->nama_pewaris) }}" required>
                    @error('nama_pewaris')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="nama_ahliwaris" class="form-label">Nama Ahli Waris</label>
                    <input type="text" class="form-control @error('nama_ahliwaris') is-invalid @enderror" 
                        id="nama_ahliwaris" name="nama_ahliwaris" 
                        value="{{ old('nama_ahliwaris', $dataahliwaris->nama_ahliwaris) }}" required>
                    @error('nama_ahliwaris')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="hubungan_keluarga" class="form-label">Hubungan Keluarga</label>
                    <input type="text" class="form-control @error('hubungan_keluarga') is-invalid @enderror" 
                        id="hubungan_keluarga" name="hubungan_keluarga" 
                        value="{{ old('hubungan_keluarga', $dataahliwaris->hubungan_keluarga) }}" required>
                    @error('hubungan_keluarga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" 
                        id="tanggal_lahir" name="tanggal_lahir" 
                        value="{{ old('tanggal_lahir', $dataahliwaris->tanggal_lahir) }}" required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" 
                        id="alamat" name="alamat" rows="3" required>{{ old('alamat', $dataahliwaris->alamat) }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="dokumen" class="form-label">Dokumen (PDF, DOC, DOCX, XLS, XLSX - Max 2MB)</label>
                    <input type="file" class="form-control @error('dokumen') is-invalid @enderror" 
                        id="dokumen" name="dokumen" accept=".pdf,.doc,.docx,.xls,.xlsx">
                    @error('dokumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($dataahliwaris->dokumen)
                        <small class="text-muted d-block mt-2">File saat ini: 
                            <a href="{{ asset('storage/' . $dataahliwaris->dokumen) }}" target="_blank" class="text-primary">Lihat</a>
                        </small>
                    @endif
                </div>

                <div class="d-flex gap-2">
                    <a href="{{ route('dataahliwaris.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>

            </form>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
