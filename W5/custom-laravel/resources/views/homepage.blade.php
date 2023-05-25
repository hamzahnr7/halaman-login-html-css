<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pelatihan Framework Laravel</title>
</head>
<body>
    <main class="container-lg">
        <div class="container border border-secondary border-2 rounded">
            <div class="text-center">
                <h2>
                    <a href="{{ url('/') }}" class="text-decoration-none text-dark">
                        Data Pegawai PT Maju Jaya Abadi</a></h2>
            </div>
            <div class="d-grid gap-2 my-3">
                <button class="btn btn-primary" type="button" id="addData">Tambahkan Data Pegawai</button>
            </div>
            <div>
                <p>Pencarian Data Pegawai : </p>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Pegawai"
                        aria-label="Cari Data Pegawai" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
            <br>
            <table class="table">
                <thead class="table-secondary">
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>Opsi</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>
</body>
</html>