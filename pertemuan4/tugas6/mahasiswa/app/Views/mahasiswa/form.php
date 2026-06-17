<!DOCTYPE html>
<html>

<head>
    <title>Tambah Mahasiswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4>Tambah Data Mahasiswa</h4>
            </div>

            <div class="card-body">
                <form action="/mahasiswa/save" method="post">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" required>
                    </div>

                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                    </div>

                    <button class="btn btn-success">💾 Simpan</button>
                    <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>

</body>

</html>