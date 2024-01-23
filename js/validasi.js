document.addEventListener('DOMContentLoaded', function() {
  var tingkatSekolah = document.getElementById('tingkat_sekolah');
  var feedback = document.querySelector('.invalid-feedback.nilai');
  tingkatSekolah.addEventListener('change', function() {
    var tingkat = this.value;
    var nilaiAkhir = document.getElementById('nilai_akhir');
    if (tingkat == 'S1' || tingkat == 'S2' || tingkat == 'S3') {
      nilaiAkhir.setAttribute('max', '4');
      feedback.textContent = 'Nilai akhir minimal 1 dan maksimal 4.';
    } else {
      nilaiAkhir.setAttribute('max', '10');
      feedback.textContent = 'Nilai akhir minimal 1 dan maksimal 10.';
    }
  });
});

// Menggunakan JavaScript untuk validasi form insert
(() => {
  'use strict';

  const forms = document.querySelectorAll('.insert-validation');

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
      } else {
        const tingkatSekolahValue = document.getElementById('tingkat_sekolah').value;
        const namaSekolahValue = document.getElementById('nama_sekolah').value;
        const jurusanValue = document.getElementById('nama_jurusan').value;

        if (!confirm('Apakah Anda yakin ingin menyimpan data dengan tingkat '
          + tingkatSekolahValue + ' nama sekolah '
          + namaSekolahValue + ', dan jurusan '
          + jurusanValue + '?')) {
          event.preventDefault();
          event.stopPropagation();
        }
      }
    }, false);
  });
})();

// Menggunakan JavaScript untuk validasi form update
(() => {
  'use strict';

  const forms = document.querySelectorAll('.update-validation');

  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        form.classList.add('was-validated');
      } else {
        const tingkatSekolahValue = document.getElementById('tingkat_sekolah').value;
        const namaSekolahValue = document.getElementById('nama_sekolah').value;
        const jurusanValue = document.getElementById('nama_jurusan').value;

        if (!confirm('Apakah Anda yakin ingin mengupdate data dengan tingkat '
          + tingkatSekolahValue + ' nama sekolah '
          + namaSekolahValue + ', dan jurusan '
          + jurusanValue + '?')) {
          event.preventDefault();
          event.stopPropagation();
        }
      }
    }, false);
  });
})();

// Menggunakan JavaScript untuk mencegah penghapusan langsung
(() => {
  'use strict';

  const deleteForms = document.querySelectorAll('.delete-data');

  Array.from(deleteForms).forEach(form => {
    form.addEventListener('submit', event => {
      event.preventDefault(); // Mencegah pengiriman form secara langsung

      const tingkat = form.querySelector('input[name="tingkat"]').value;
      const sekolah = form.querySelector('input[name="sekolah"]').value;
      const jurusan = form.querySelector('input[name="jurusan"]').value;

      if (confirm('Apakah Anda yakin ingin menghapus data dengan tingkat '
        + tingkat + ' nama sekolah '
        + sekolah + ', dan jurusan '
        + jurusan + '?')) {
        form.submit(); // Mengirimkan form jika pengguna mengonfirmasi
      }
    });
  });
})();