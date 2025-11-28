<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Registrasi Ahli Waris</title>
    <link rel="stylesheet" href="custom.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
<h1 class="text-center mt-5">Data Registrasi</h1>

  @include('Layout.navbar')
    
 <section class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Registrasi Surat Ahli Waris</h4>

            <!-- Tombol Tambah Data -->
            <a href="{{ route('surat.create') }}" class="btn btn-light btn-sm">+ Tambah Data</a>
        </div>

        <div class="card-body mt-3">

            <table class="table table-bordered table-striped text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Ahli Waris</th>
                        <th>Nama Pewaris</th>
                        <th>Tanggal</th>
                        <th>No Register</th>
                        <th>Alamat</th>
                        <th>Bukti Register</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($ahliwaris ?? [] as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->nama_pemohon }}</td>
                            <td>{{ $item->nama_alm }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>{{ $item->no_register }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                @if($item->bukti_register)
                                 <a href="{{ asset('storage/' . $item->bukti_register) }}" target="_blank">Lihat Foto</a>
                                @else
        -
                                 @endif
                        </td>
                            <td>
                                <a href="{{ route('surat.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('surat.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data?')">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</section>



  </body>
</html>
