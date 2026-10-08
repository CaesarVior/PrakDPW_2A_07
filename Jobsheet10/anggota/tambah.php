<?php

require __DIR__ . '/../includes/auth.php';

$page_title = "Tambah Anggota";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<main>
  <section>
      <h2>Tambah Anggota</h2>

      <?php if ($flash): ?>
          <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
      <?php endif; ?>

      <form id="form-tambah" method="post" action="proses_tambah.php">
          <div class="mb-3">
              <label for="nama" class="form-label fw-semibold">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Anda" />
          </div>
          <div class="mb-3">
              <label for="no_anggota" class="form-label fw-semibold">No. Anggota</label>
              <input
                  type="text"
                  class="form-control"
                  id="no_anggota"
                  name="no_anggota"
                  placeholder="Masukkan No. Anggota"
              />
          </div>
          <div class="mb-3">
              <label for="alamat" class="form-label fw-semibold">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Anda" />
          </div>
          <div class="mb-3">
              <label for="no_hp" class="form-label fw-semibold">No. HP</label>
              <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan No. Hp Anda" />
          </div>
          <button type="submit" class="btn" style="background-color: #403d88; color: #fff">Simpan</button>
      </form>
  </section>
</main>

<?php 
include __DIR__ . '/../includes/footer.php';
?>