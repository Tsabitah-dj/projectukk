<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('custom.css') }}">
  <title>Data Ahli Waris Per Bulan</title>
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="p-3">

<h1 class="text-center mt-5">Data Ahli Waris Per Bulan</h1>

@include('Layout.navbar')

<section class="container mt-4">

  <div class="card shadow">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Data Bulanan</h4>
      <!-- Pilih Bulan -->
      <form action="{{ route('perbulan.index') }}" method="GET" class="d-flex">
        <input type="month" name="bulan" class="form-control form-control-sm me-2" value="{{ request('bulan') }}">
        <button type="submit" class="btn btn-light btn-sm">Filter</button>
      </form>
    </div>

    <div class="card-body mt-3">
      <table class="table table-bordered table-striped text-center">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama Pemohon</th>
            <th>Tanggal</th>
            <th>No Register</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($ahliwaris ?? [] as $i => $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>{{ $item->nama_pemohon }}</td>
              <td>{{ $item->tanggal }}</td>
              <td>{{ $item->no_register }}</td>
              <td>{{ $item->alamat }}</td>
              <td>
                <a href="{{ route('surat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">Tidak ada data untuk bulan ini</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</section>

</body>
</html>
