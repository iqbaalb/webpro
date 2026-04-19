<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tugas Laravel + AJAX</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin-top: 50px;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: bold;
        }

        .btn-purple {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 10px 30px;
            transition: transform 0.2s;
        }

        .btn-purple:hover {
            transform: scale(1.05);
            color: white;
            background: linear-gradient(135deg, #5a67d8 0%, #6b46a0 100%);
        }

        .table {
            margin-top: 20px;
        }

        .loading {
            display: none;
            text-align: center;
            padding: 20px;
        }

        .card-data {
            transition: all 0.3s ease;
        }

        .card-data:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h3 class="mb-0"> Aplikasi Data Mahasiswa</h3>
            </div>
            <div class="card-body text-center">
                <h4 class="mb-4">Selamat Datang di Halaman Utama</h4>
                <button id="btnTampilkanData" class="btn btn-purple btn-lg">
                    Tampilkan Data Mahasiswa
                </button>

                <div class="loading mt-4" id="loading">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Mengambil data...</p>
                </div>

                <div id="hasilData" class="mt-4"></div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btnTampilkanData').click(function() {
                $('#loading').show();
                $('#hasilData').html('');

                $.ajax({
                    url: '/get-mahasiswa',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#loading').hide();
                        tampilkanData(data);
                    },
                    error: function(xhr, status, error) {
                        $('#loading').hide();
                        $('#hasilData').html(`
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Gagal mengambil data. Silakan coba lagi.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `);
                        console.error('Error:', error);
                    }
                });
            });

            function tampilkanData(data) {
                if (data.length === 0) {
                    $('#hasilData').html(`
                        <div class="alert alert-info">
                            Tidak ada data mahasiswa.
                        </div>
                    `);
                    return;
                }

                let html = `
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                `;

                $.each(data, function(index, mahasiswa) {
                    html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td><strong>${mahasiswa.nama}</strong></td>
                            <td>${mahasiswa.nim}</td>
                            <td><span class="badge bg-primary">${mahasiswa.kelas}</span></td>
                            <td>${mahasiswa.prodi}</td>
                        </tr>
                    `;
                });

                html += `
                            </tbody>
                        </table>
                    </div>
                `;

                html += `
                    <hr>
                    <h5 class="mt-4 text-center">Tampilan Card</h5>
                    <div class="row mt-3">
                `;

                $.each(data, function(index, mahasiswa) {
                    html += `
                        <div class="col-md-4 mb-3">
                            <div class="card card-data">
                                <div class="card-body">
                                    <h5 class="card-title">${mahasiswa.nama}</h5>
                                    <p class="card-text">
                                        <strong>NIM:</strong> ${mahasiswa.nim}<br>
                                        <strong>Kelas:</strong> ${mahasiswa.kelas}<br>
                                        <strong>Prodi:</strong> ${mahasiswa.prodi}
                                    </p>
                                </div>
                            </div>
                        </div>
                    `;
                });

                html += `</div>`;
                $('#hasilData').html(html);
            }
        });
    </script>
</body>

</html>
