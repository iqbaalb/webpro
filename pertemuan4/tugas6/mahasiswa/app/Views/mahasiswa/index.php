<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <!--  NOTIFIKASI -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- CARD -->
        <div class="card shadow">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Data Mahasiswa</h4>
                <a href="/mahasiswa/form" class="btn btn-success btn-sm">+ Tambah</a>
            </div>

            <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                ajax: '/mahasiswa/getData',
                columns: [{
                        data: 'nama'
                    },
                    {
                        data: 'nim'
                    },
                    {
                        data: 'id',
                        render: function(id) {
                            return `
                                <a href="/mahasiswa/edit/${id}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="/mahasiswa/delete/${id}" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus data?')">
                                   Delete
                                </a>
                            `;
                        }
                    }
                ]
            });
        });
    </script>

</body>

</html>