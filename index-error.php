<!DOCTYPE html>
<html>
<head>
    <title>Error Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Error!</h4>
                    <?php if (isset($_GET['error_message'])): ?>
                        <p><?= htmlspecialchars($_GET['error_message']) ?></p>
                    <?php else: ?>
                        <p>Terjadi kesalahan dalam memuat halaman.</p>
                    <?php endif; ?>
                    <hr>
                    <p class="mb-0">Silakan coba lagi nanti.</p>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="index.php" class="btn btn-primary">Kembali ke Halaman Utama</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>