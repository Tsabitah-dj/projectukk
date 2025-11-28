<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Welcome</title>
    <link rel="stylesheet" href="custom.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  </head>
    <body class="p-3 m-0 border-0 bd-example m-0 border-0">
<h1 class="text-center mt-5">Dashboard</h1>

  @include('Layout.navbar')
    
 <section class="container mt-4">
    <div class="row g-3">
        
        <!-- Card 1 -->
        <div class="col-md-3">
            <div class="soft-card shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="soft-icon me-3" style=" background: linear-gradient(90deg, #F5C857, #E2852E);">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png">
                    </div>
                    <div>
                        <h6 class="mb-1">Total Surat</h6>
                        <h3 class="fw-bold">{{ $totalSurat ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-3">
            <div class="soft-card shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="soft-icon me-3" style="background: linear-gradient(90deg, #FF937E, #FF5555);">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828817.png">
                    </div>
                    <div>
                        <h6 class="mb-1">Surat Bulan Ini</h6>
                        <h3 class="fw-bold">{{ $suratBulanIni ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-md-3">
            <div class="soft-card shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="soft-icon me-3" style=" background: linear-gradient(90deg, #F5C857, #E2852E);">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828945.png">
                    </div>
                    <div>
                        <h6 class="mb-1">Surat Tahun Ini</h6>
                        <h3 class="fw-bold">{{ $suratTahunIni ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-md-3">
            <div class="soft-card shadow-sm">
                <div class="d-flex align-items-center">
                    <div class="soft-icon me-3" style="background: linear-gradient(90deg, #F2AEBB, #EDFFF0);">
                        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828859.png">
                    </div>
                    <div>
                        <h6 class="mb-1">Total Ahli Waris</h6>
                        <h3 class="fw-bold">{{ $totalAhliWaris ?? 0 }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

  </body>
</html>
