<!DOCTYPE html>
<html>

<head>
    <title>Edit Mahasiswa</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4>Edit Data Mahasiswa</h4>
            </div>

            <div class="card-body">
                <form action="/mahasiswa/update/<?= $mhs['id']; ?>" method="post">

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text" name="nama" value="<?= $mhs['nama']; ?>" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>NIM</label>
                        <input type="text" name="nim" value="<?= $mhs['nim']; ?>" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">✏️ Update</button>
                    <a href="/mahasiswa" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>

</body>

</html>