<!DOCTYPE html>
<html>

<head>
    <title>Mini Project - Data Pendidikan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/048de552e6.js" crossorigin="anonymous"></script>

    <style>
        .row {
            position: relative;
        }

        .tidak-ada-tabel {
            pointer-events: none;
            user-select: none;
        }

        .blur-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: transparent;
            backdrop-filter: blur(5px);
            pointer-events: none;
            user-select: none;
            z-index: 1;
        }

        .dml-edit-delete button {
            width: 30px;
            height: 30px;
            padding: 0;
        }

    </style>

</head>

<body>

    <?php
    require_once 'koneksi.php';
    $koneksi = koneksi();
    $adaTabel = $koneksi->query("SHOW TABLES LIKE 'data_pendidikan'")->num_rows > 0;
    ?>

    <div class="container">
        <main>
            <div class="py-5">
                <div class="text-center">
                    <h1>Data Pendidikan</h1>
                    <?php if (!$adaTabel) : ?>
                        <p class="lead text-danger">Mohon maaf, tabel yang diperlukan untuk proses input data belum tersedia. Untuk melanjutkan, Anda dapat membuat tabel tersebut dengan satu klik menggunakan tombol berikut:</p>
                        <a href="ddl-tabel.php" class="btn btn-primary">Buat Tabel</a>
                </div>
            <?php else : ?>
                <table class="text-start table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Tingkat</th>
                            <th scope="col">Nama Sekolah</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Tahun Mulai</th>
                            <th scope="col">Tahun Selesai</th>
                            <th scope="col">Nilai Akhir</th>
                            <th scope="col">Bersertifikat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM data_pendidikan";
                        $hasil = $koneksi->query($sql);
                        if ($hasil->num_rows > 0) {
                            while ($baris = $hasil->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $baris["tingkat"] . "</td>";
                                echo "<td>" . $baris["nama_sekolah"] . "</td>";
                                echo "<td>" . $baris["jurusan"] . "</td>";
                                echo "<td>" . $baris["tahun_mulai"] . "</td>";
                                echo "<td>" . $baris["tahun_selesai"] . "</td>";
                                echo "<td>" . $baris["nilai_akhir"] . "</td>";
                                echo "<td>" . $baris["bersertifikat"] . "</td>";
                                echo "<td class='d-flex dml-edit-delete'>";
                                echo "<form action='index-update.php' method='POST'>
                                        <input type='hidden' name='id' value='" . $baris["id"] . "'>
                                        <button type='submit' class='btn btn-primary' title='Edit'><i class='fa fa-edit'></i></button>
                                    </form>";
                                echo "<span class='mx-1'></span>";
                                echo "<form action='dml-delete.php' method='POST' class='delete-data'>
                                        <input type='hidden' name='id' value='" . $baris["id"] . "'>
                                        <input type='hidden' name='tingkat' value='" . $baris["tingkat"] . "'>
                                        <input type='hidden' name='sekolah' value='" . $baris["nama_sekolah"] . "'>
                                        <input type='hidden' name='jurusan' value='" . $baris["jurusan"] . "'>
                                        <button type='submit' class='btn btn-danger' title='Delete'><i class='fa fa-trash'></i></button>
                                    </form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>Belum ada data</td></tr>";
                        }
                        $koneksi->close();
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="py-5 text-center">
                <h2>Form Input Data</h2>
                <p class="lead">Silakan masukkan data pendidikan Anda pada form berikut:</p>
            <?php endif; ?>
            </div>

            <?php if ($adaTabel) : ?>
                <div class="row g-5">
                <?php else : ?>
                    <div class="row g-5 tidak-ada-tabel">
                        <div class="blur-overlay"></div>
                    <?php endif; ?>

                    <div class="col-md-5 col-lg-4 order-md-last">
                        <img src="img/input.png" class="img-fluid" alt="Input Data" height="450">
                    </div>

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Input Data</h4>
                        <form class="insert-validation" novalidate action="dml-insert.php" method="POST">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <label for="tingkat_sekolah" class="form-label">Tingkat:</label>
                                    <select name="tingkat" class="form-select" id="tingkat_sekolah" required>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA/SMK">SMA/SMK</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="nama_sekolah" class="form-label">Nama Sekolah:</label>
                                    <input name="nama_sekolah" type="text" class="form-control" id="nama_sekolah" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Nama sekolah harus diisi.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="nama_jurusan" class="form-label">Jurusan:</label>
                                    <input name="jurusan" type="text" class="form-control" id="nama_jurusan" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Jurusan harus diisi.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="tahun_mulai" class="form-label">Tahun Mulai:</label>
                                    <input name="tahun_mulai" type="number" class="form-control" id="tahun_mulai" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Tahun mulai harus diisi.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="tahun_selesai" class="form-label">Tahun Selesai:</label>
                                    <input name="tahun_selesai" type="number" class="form-control" id="tahun_selesai" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Tahun selesai harus diisi.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="nilai_akhir" class="form-label">Nilai Akhir:</label>
                                    <input name="nilai_akhir" type="number" class="form-control" id="nilai_akhir" placeholder="" value="" required>
                                    <div class="invalid-feedback">
                                        Nilai akhir harus diisi.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="bersertifikat" class="form-label">Sertifikat:</label>
                                    <select name="bersertifikat" class="form-select" id="bersertifikat" required>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Sertifikat harus diisi.
                                    </div>
                                </div>
                                <div class="col-12 d-grid">
                                    <button class="btn btn-success" type="submit">SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/validasi.js"></script>

</body>

</html>