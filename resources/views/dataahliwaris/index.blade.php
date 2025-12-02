<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Ahli Waris</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('custom.css') }}">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light p-3">
    <h1 class="text-center mt-5">Data Ahli Waris</h1>

@include('Layout.navbar')

<section class="container mt-5">

  <div class="card shadow">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Data Ahli Waris</h4>
      <a href="{{ route('dataahliwaris.create') }}" class="btn btn-light btn-sm">+ Tambah Data</a>
    </div>

    <div class="card-body mt-3">
      <table class="table table-bordered table-striped text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>User</th>
            <th>Nama Ahli Waris</th>
            <th>Nama Pewaris</th>
            <th>Hubungan Keluarga</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Dokumen</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          @forelse ($dataahliwaris as $i => $item)
            <tr>
              <td>{{ $i + 1 }}</td>
              <td>
                <span class="badge bg-info text-dark">{{ $item->user?->name ?? '-' }}</span>
              </td>
              <td>{{ $item->nama_ahliwaris }}</td>
              <td>{{ $item->nama_pewaris }}</td>
              <td>{{ $item->hubungan_keluarga }}</td>
              <td>{{ $item->tanggal_lahir }}</td>
              <td>{{ $item->alamat }}</td>
              <td>
                  @if($item->dokumen)
                   @php
                      $color = $item->user?->role === 'admin' ? 'green' : 'blue';
                   @endphp

                   <a href="{{ asset('storage/' . $item->dokumen) }}"
                    target="_blank"
                    style="color: {{ $color }}; font-weight: bold;">
                     Download
                    </a>
                   @else
                     -
                   @endif
              </td>
              <td>
                <a href="{{ route('dataahliwaris.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('dataahliwaris.destroy', $item->id) }}" method="POST" class="d-inline">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" 
                    onclick="return confirm('Apa Anda Akan Menghapus Data ini ?')">Hapus</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="9">Data tidak tersedia.</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      {{-- Pagination --}}
      <div class="d-flex justify-content-center mt-3">
        {{ $dataahliwaris->links() }}
      </div>

    </div>
  </div>

</section>

</body>
</html>
