<?php
  $page_title = "Beranda";
  include __DIR__ . '/includes/header.php';
?>
<main>
    <section>
        <h2>Selamat Datang Sistem Perpustakaan Mini</h2>
        <p>Aplikasi sederhana untuk mengelola koleksi buku dan anggota perpustakaan.</p>
        <img src="assets/img/my-photo.jpg" style="display: block; margin: 25px auto" width="20%" />
    </section>

    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h2 class="card-title mb-3" style="color: #403d88">Ringkasan</h2>
            <div class="row g-3 text-center">
                <div class="col-6 col-md-4">
                    <div class="p-3 rounded-3" style="background-color: #fff6fd">
                        <h3 class="h6 text-secondary">Total Buku</h3>
                        <p class="fs-2 fw-bold mb-0" style="color: #403d88">12</p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="p-3 rounded-3" style="background-color: #fff6fd">
                        <h3 class="h6 text-secondary">Total Anggota</h3>
                        <p class="fs-2 fw-bold mb-0" style="color: #403d88">8</p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="p-3 rounded-3" style="background-color: #fff6fd">
                        <h3 class="h6 text-secondary">Sedang Dipinjam</h3>
                        <p class="fs-2 fw-bold mb-0" style="color: #403d88">3</p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="p-3 rounded-3" style="background-color: #fff6fd">
                        <h3 class="h6 text-secondary">Sedang Diantar</h3>
                        <p class="fs-2 fw-bold mb-0" style="color: #403d88">6</p>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="p-3 rounded-3" style="background-color: #fff6fd">
                        <h3 class="h6 text-secondary">Buku Terlambat</h3>
                        <p class="fs-2 fw-bold mb-0" style="color: #403d88">5</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php 
  include __DIR__ . '/includes/footer.php'; 
?>
