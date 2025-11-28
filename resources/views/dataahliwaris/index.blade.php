<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Data Ahli Waris</title>
    <link rel="stylesheet" href="custom.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
<h1 class="text-center mt-5">Data Ahli Waris</h1>

  @include('Layout.navbar')
    
 <section class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Ahli Waris</h4>

            <!-- Tombol Tambah Data -->
            <a href="{{ route('dataahliwaris.create') }}" class="btn btn-light btn-sm">+ Tambah Data</a>
        </div>

        <div class="card-body mt-3">
            <table class="table table-bordered table-striped text-center">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pewaris</th>
                        <th>Nama Ahli Waris</th>
                        <th>Hubungan Keluarga</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($dataahliwaris ?? [] as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->nama_alm }}</td>
                            <td>{{ $item->nama_pewaris }}</td>
                            <td>{{ $item->hubungan_keluarga}}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <a href="{{ route('dataahliwaris.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('dataahliwaris.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apa Anda Akan Menghapus Data ini ?')">Delete</button>
                                </form>
                        </tr>
                        @endforeach
                </tbody>

            </table>

        </div>
    </div>

</section>



  </body>
</html>
