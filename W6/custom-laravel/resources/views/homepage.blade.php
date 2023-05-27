<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
        crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <link href="{{ asset('fa/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('fa/css/solid.css') }}" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                    data-bs-target="#createDataModal">
                <i class="fa-solid fa-plus"></i> Tambahkan Data Pegawai</button>
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

            <table class="table table-bordered table-hover">
                <thead class="table-white">
                    <th class="col-2">Nama</th>
                    <th class="col-2">Jabatan</th>
                    <th class="col-1">Umur</th>
                    <th class="col-5">Alamat</th>
                    <th class="col-2">Opsi</th>
                </thead>
                <tbody>
                <?php
                    foreach ($pegawai as $row) {
                        echo "<tr>";
                        echo "<td>".$row->nama."</td>";
                        echo "<td>".$row->jabatan."</td>";
                        echo "<td>".$row->umur."</td>";
                        echo "<td>".$row->alamat."</td>";
                        echo "<td>
                            <button type=\"button\" class=\"btn btn-warning\"
                                id=\"updateData\" onclick=\"getData('$row->id')\">Update</button>&nbsp&nbsp|&nbsp
                            <button type=\"button\" class=\"btn btn-danger\"
                                id=\"deleteData\" onclick=\"deleteData('$row->id')\">Delete</button>
                            </td>";
                        echo "</tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <!-- Create Data Modal -->
    <div class="modal fade" id="createDataModal" tabindex="-1" aria-labelledby="createDataModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form action="/insertData" method="post" id="createData">
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama Lengkap</label>
                                <input class="form-control" type="text"
                                    name="nama" placeholder="Masukkan Nama ...">
                            </div>
                            <div class="mb-3">
                                <label for="">Jabatan</label>
                                <input class="form-control" type="text"
                                    name="jabatan" placeholder="Masukkan Jabatan ...">
                            </div>
                            <div class="mb-3">
                                <label for="">Umur</label>
                                <input class="form-control" type="number"
                                    name="umur" placeholder="Masukkan Umur ...">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Rumah</label>
                                <textarea class="form-control"
                                    name="alamat" placeholder="Masukkan Alamat ...">
                                </textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitInserData()">Create Data</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Update Data Modal -->
    <div class="modal fade" id="updateDataModal" tabindex="-1" aria-labelledby="updateDataModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Data Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <form id="updateData">
                            @csrf
                            <div class="mb-3">
                                <label for="">Nama Lengkap</label>
                                <input class="form-control" type="text"
                                    name="nama" id="namaPegawai">
                            </div>
                            <div class="mb-3">
                                <label for="">Jabatan</label>
                                <input class="form-control" type="text"
                                    name="jabatan" id="jabatanPegawai">
                            </div>
                            <div class="mb-3">
                                <label for="">Umur</label>
                                <input class="form-control" type="number"
                                    name="umur" id="umurPegawai">
                            </div>
                            <div class="mb-3">
                                <label for="">Alamat Rumah</label>
                                <textarea class="form-control"
                                    name="alamat" id="alamatPegawai">
                                </textarea>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" onclick="submitUpdateData()">Save Data</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    var csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    var idPegawai;
    function submitInserData()
    {
        document.getElementById('createData').submit();
    }
    function getData(param)
    {
        fetch(`/getData/${param}`, {
            method: 'POST',
            headers: { 'X-CSRF-Token': csrfToken },
        }).then(res => res.json()).then(res => {
            idPegawai = res.id;
            document.querySelector('input[id="namaPegawai"]').setAttribute('value', res.nama);
            document.querySelector('input[id="jabatanPegawai"]').setAttribute('value', res.jabatan);
            document.querySelector('input[id="umurPegawai"]').setAttribute('value', res.umur);
            document.getElementById('alamatPegawai').value = res.alamat;
            var modal = document.getElementById('updateDataModal');
            var bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        })
    }
    function submitUpdateData()
    {
        var id = idPegawai;
        // alert(document.getElementById('namaPegawai').getAttribute('value'));
        var form = new FormData();
        form.append('nama', document.getElementById('namaPegawai').value)
        form.append('jabatan', document.getElementById('jabatanPegawai').value)
        form.append('umur', document.getElementById('umurPegawai').value)
        form.append('alamat', document.getElementById('alamatPegawai').value)
        console.log(form)
        fetch(`/updateData/${id}`, {
            method: 'POST',
            headers: { 'X-CSRF-Token': csrfToken },
            body: form
        }).then(res => {
            res.json()
        })
        .then(data => {
            window.location.reload();
        }).catch(e => {
            alert(e);
        })
    }
    function deleteData(param)
    {
        fetch(`/deleteData/${param}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-Token': csrfToken },

        }).then(res => {
            window.location.reload();
        })
    }
</script>
</html>