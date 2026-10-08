<?php
require __DIR__ . '/../includes/auth.php';
require __DIR__ . '/../includes/auth.php';

$page_title = "Tambah Buku";
include __DIR__ . '/../includes/header.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);
?>

<main>
  <section>
      <h2>Tambah Buku</h2>
      <?php if ($flash): ?>
          <p class="flash flash-<?php echo $flash['type']; ?>"><?php echo $flash['pesan']; ?></p>
      <?php endif; ?>

      <form id="form-tambah" method="post" action="proses_tambah.php">
          <div class="mb-3">
              <label for="judul" class="form-label fw-semibold">Judul</label>
              <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Buku" />
          </div>
          <div class="mb-3">
              <label for="pengarang" class="form-label fw-semibold">Pengarang</label>
              <input
                  type="text"
                  class="form-control"
                  id="pengarang"
                  placeholder="Masukkan Nama Pengarang"
                  name="pengarang"
              />
          </div>
          <div class="mb-3">
              <label for="tahun" class="form-label fw-semibold">Tahun Terbit</label>
              <input type="number" class="form-control" id="tahun" name="tahun" placeholder="Masukkan Tahun Terbit" />
          </div>
          <div class="mb-3">
              <label for="isbn" class="form-label fw-semibold">ISBN</label>
              <input type="text" class="form-control" id="isbn" name="isbn" placeholder="Masukkan ISBN" />
          </div>
          <div class="mb-3">
              <label for="stok" class="form-label fw-semibold">Stok</label>
              <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" />
          </div>
          <div class="mb-3">
              <label for="kategori" class="form-label fw-semibold">Kategori</label>
              <select class="form-select" id="kategori" name="kategori">
                  <option value="fiksi">Fiksi</option>
                  <option value="non-fiksi">Non-Fiksi</option>
                  <option value="referensi">Referensi</option>
              </select>
          </div>
          <button type="submit" class="btn" style="background-color: #403d88; color: #fff">Simpan</button>
      </form>
  </section>
</main>

<?php 
include __DIR__ . '/../includes/footer.php';
?>