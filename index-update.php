<!DOCTYPE html>
<html>

<head>
    <title>Mini Project - Data Pendidikan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

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
    </style>

</head>

<body>

    <?php
    include 'functions.php';
    $adaTabel = dataPendidikan($koneksi);

    $id;
    $tingkat;
    $nama_sekolah;
    $jurusan;
    $tahun_mulai;
    $tahun_selesai;
    $nilai_akhir;
    $bersertifikat;

    ?>

    <div class="container">
        <main>
            <div class="py-5">
                <div class="text-center">
                    <h1>Update Data Pendidikan</h1>
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $hasil = dml_select($koneksi, $_POST['id']);
                        if ($hasil->num_rows > 0) {
                            while ($baris = $hasil->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $baris["tingkat"] . "</td>";
                                echo "<td>" . $baris["nama_sekolah"] . "</td>";
                                echo "<td>" . $baris["jurusan"] . "</td>";
                                echo "<td>" . $baris["tahun_mulai"] . "</td>";
                                echo "<td>" . $baris["tahun_selesai"] . "</td>";
                                echo "<td>" . $baris["nilai_akhir"] . "</td>";
                                echo "<td>" . $baris["bersertifikat"] . "</td>";;
                                echo "</tr>";

                                // Menyimpan data yang akan di-update ke dalam variabel
                                $id = $baris["id"];
                                $tingkat = $baris["tingkat"];
                                $nama_sekolah = $baris["nama_sekolah"];
                                $jurusan = $baris["jurusan"];
                                $tahun_mulai = $baris["tahun_mulai"];
                                $tahun_selesai = $baris["tahun_selesai"];
                                $nilai_akhir = $baris["nilai_akhir"];
                                $bersertifikat = $baris["bersertifikat"];
                            }
                        } else {
                            echo "<tr><td colspan='7'>Belum ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    <a href="index.php" class="btn btn-primary" type="button">KEMBALI</a>
                </div>
            </div>
            <div class="py-5 text-center">
                <h2>Form Update Data</h2>
                <p class="lead">Silakan masukkan update-data pendidikan Anda untuk data di atas pada form berikut:</p>
            <?php endif; ?>
            </div>

            <?php if ($adaTabel) : ?>
                <div class="row g-5">
                <?php else : ?>
                    <div class="row g-5 tidak-ada-tabel">
                        <div class="blur-overlay"></div>
                    <?php endif; ?>

                    <div class="col-md-5 col-lg-4 order-md-last">
                        <img src="img/update.png" class="img-fluid" alt="Input Data" height="450">
                    </div>

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Update Data</h4>
                        <form class="update-validation" novalidate action="dml-update.php" method="POST">
                            <div class="row g-3">
                                <div class="col-sm-4">
                                    <label for="tingkat_sekolah" class="form-label">Tingkat:</label>
                                    <select name="tingkat" class="form-select" id="tingkat_sekolah" required>
                                        <option value="SD" <?php if ($tingkat == 'SD') echo 'selected'; ?>>SD</option>
                                        <option value="SMP" <?php if ($tingkat == 'SMP') echo 'selected'; ?>>SMP</option>
                                        <option value="SMA/SMK" <?php if ($tingkat == 'SMA/SMK') echo 'selected'; ?>>SMA/SMK</option>
                                        <option value="S1" <?php if ($tingkat == 'S1') echo 'selected'; ?>>S1</option>
                                        <option value="S2" <?php if ($tingkat == 'S2') echo 'selected'; ?>>S2</option>
                                        <option value="S3" <?php if ($tingkat == 'S3') echo 'selected'; ?>>S3</option>
                                    </select>
                                </div>
                                <div class="col-sm-8">
                                    <label for="nama_sekolah" class="form-label">Nama Sekolah:</label>
                                    <input name="nama_sekolah" type="text" class="form-control" maxlength="35" id="nama_sekolah" placeholder="" value="<?php echo $nama_sekolah; ?>" required>
                                    <div class="invalid-feedback">
                                        Nama sekolah harus diisi.
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="nama_jurusan" class="form-label">Jurusan:</label>
                                    <input name="jurusan" type="text" class="form-control" maxlength="25" id="nama_jurusan" placeholder="" value="<?php echo $jurusan; ?>" required>
                                    <div class="invalid-feedback">
                                        Jurusan harus diisi * jika tidak ada, isi dengan tanda strip (-).
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="tahun_mulai" class="form-label">Tahun Mulai:</label>
                                    <input name="tahun_mulai" type="number" class="form-control" min="1000" max="9999" id="tahun_mulai" placeholder="" value="<?php echo $tahun_mulai; ?>" required>
                                    <div class="invalid-feedback">
                                        Tahun mulai harus empat digit.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="tahun_selesai" class="form-label">Tahun Selesai:</label>
                                    <input name="tahun_selesai" type="number" class="form-control" min="1000" max="9999" id="tahun_selesai" placeholder="" value="<?php echo $tahun_selesai; ?>" required>
                                    <div class="invalid-feedback tahun_valid">
                                        Tahun selesai harus empat digit.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="nilai_akhir" class="form-label">Nilai Akhir:</label>
                                    <input name="nilai_akhir" type="number" class="form-control" step="0.01" min="0" max="10" id="nilai_akhir" placeholder="" value="<?php echo $nilai_akhir; ?>" required>
                                    <div class="invalid-feedback nilai">
                                        Nilai akhir minimal 1 dan maksimal 10.
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label for="bersertifikat" class="form-label">Sertifikat:</label>
                                    <select name="bersertifikat" class="form-select" id="bersertifikat" required>
                                        <option value="Ya" <?php if ($bersertifikat == 'Ya') echo 'selected';?>>Ya</option>
                                        <option value="Tidak" <?php if ($bersertifikat == 'Tidak') echo 'selected';?>>Tidak</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Sertifikat harus diisi.
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <div class="col-12 d-grid">
                                    <button class="btn btn-warning" type="submit">UPDATE</button>
                                </div>
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