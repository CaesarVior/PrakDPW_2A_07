# Wireframe & User Flow — SIMPUS-Mini

**Tugas**: Jobsheet 4 – Perancangan UI/UX Aplikasi  
**Sub-CPMK**: Merancang UI/UX aplikasi SIMPUS-Mini.

Pada pengerjaan Jobsheet 4 ini, saya menyusun dokumen rancangan antarmuka (*wireframe*) dan alur pengguna (*user flow*) untuk proyek aplikasi **SIMPUS-Mini** (Sistem Informasi Perpustakaan).

Halaman yang telah saya buat pada Jobsheet 1 sampai 3 sebelumnya baru sampai tampilan dasar seperti Beranda dan Katalog Buku. Oleh karena itu, pada tugas ini saya melengkapi perancangan wireframe untuk fitur-fitur baru—yaitu Login Petugas, Dashboard Petugas, List Petugas, serta transaksi Peminjaman dan Pengembalian—sebagai acuan sebelum mulai mengimplementasikannya ke dalam kode program pada Jobsheet selanjutnya.

---

## Aktor

* **Tamu**: hanya bisa melihat katalog buku (Beranda, Katalog Buku) tanpa login. Tidak dapat melakukan tambah/edit/hapus buku dan tidak dapat mengakses daftar petugas.
* **Petugas**: login untuk mengakses seluruh fitur CRUD buku, melihat daftar petugas, serta mengelola transaksi peminjaman dan pengembalian.

---

## User Flow — Peminjaman Buku

[Petugas Login] -> [Dashboard] -> [Pilih menu "Peminjaman Baru"]
   -> [Pilih Anggota] -> [Pilih Buku (stok > 0)]
   -> [Simpan] -> [Stok buku berkurang 1] -> [Kembali ke Dashboard]

---

## User Flow — Pengembalian Buku

[Dashboard] -> [Menu "Pengembalian"] -> [Cari transaksi aktif (anggota/buku)]
   -> [Tandai "Dikembalikan"] -> [Stok buku bertambah 1]
   -> [Kembali ke Dashboard]

---

## Wireframe: Katalog Buku (Tamu / Tanpa Login)
Tampilan katalog publik yang dapat diakses oleh siapa saja tanpa memerlukan proses autentikasi.

```
+-----------------------------------------------------------------------+
| SIMPUS-Mini          Beranda | Katalog Buku            [ Login ]     |
+-----------------------------------------------------------------------+
| Katalog Buku Perpustakaan                                             |
|                                                                       |
| Cari Buku: [___________________]                                      |
|                                                                       |
| +-------------------------------------------------------------------+ |
| | Judul Buku           | Pengarang        | Kategori   | Stok       | |
| +-------------------------------------------------------------------+ |
| | Laskar Pelangi       | Andrea Hirata    | Novel      | 5          | |
| | Bumi Manusia         | Pramoedya A. T.  | Novel      | 2          | |
| +-------------------------------------------------------------------+ |
+-----------------------------------------------------------------------+
```
---

## Wireframe: Halaman Login
Halaman khusus bagi user Petugas untuk mendapatkan akses pengelolaan sistem.
```
+-------------------------------------------------------------------+
| SIMPUS-Mini        Beranda | Katalog Buku               [ Login ] |
+-------------------------------------------------------------------+
| Katalog Buku Perpustakaan                                         |
|                                                                   |
| Cari Buku: [___________________]                                  |
|                                                                   |
| +---------------------------------------------------------------+ |
| | Judul Buku        | Pengarang       | Kategori | Stok | Aksi  | |
| +---------------------------------------------------------------+ |
| | Laskar Pelangi    | Andrea Hirata   | Novel    | 5    | Lihat | |
| | Bumi Manusia      | Pramoedya A. T. | Novel    | 2    | Lihat | |
| +---------------------------------------------------------------+ |
+-------------------------------------------------------------------+
```

---

## Wireframe: Dashboard Petugas
Halaman yang muncul sesaat setelah Petugas berhasil melakukan login.
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini    Beranda | Buku | Petugas | Peminjaman | (Petugas) Logout|
+-----------------------------------------------------------------------+
|                                                                       |
| [ Total Buku ]     [ Total Anggota ]     [ Sedang Dipinjam ]          |
|                                                                       |
| Aksi Cepat:                                                           |
| [ + Peminjaman Baru ]    [ + Pengembalian ]                           |
|                                                                       |
| Transaksi Terbaru                                                     |
| --------------------------------------------------                    |
| Anggota | Buku | Tgl Pinjam | Status                                  |
|                                                                       |
+-----------------------------------------------------------------------+
```
---

## Wireframe: Kelola Data Buku (Khusus Petugas - CRUD)
Halaman pengelolaan list buku perpustakaan secara penuh.
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini    Beranda | Buku | Petugas | Peminjaman | (Petugas) Logout|
+-----------------------------------------------------------------------+
| Kelola Data Buku                                                      |
| [ + Tambah Buku Baru ]                                                |
|                                                                       |
| +-------------------------------------------------------------------+ |
| | Judul Buku    | Kategori | Stok | Aksi                            | |
| +-------------------------------------------------------------------+ |
| | Laskar Pelangi| Novel    | 5    | [ Edit ]  [ Hapus ]             | |
| | Bumi Manusia  | Novel    | 2    | [ Edit ]  [ Hapus ]             | |
| +-------------------------------------------------------------------+ |
+-----------------------------------------------------------------------+
```
---

## Wireframe: List Petugas (Khusus Petugas)
Halaman untuk melihat list petugas yang terdaftar dan memiliki akses sistem.
```
+-----------------------------------------------------------------------+
| SIMPUS-Mini    Beranda | Buku | Petugas | Peminjaman | (Petugas) Logout|
+-----------------------------------------------------------------------+
| Daftar Petugas Perpustakaan                                           |
|                                                                       |
| +-------------------------------------------------------------------+ |
| | NIP / ID  | Nama Petugas      | Email            | Jabatan        | |
| +-------------------------------------------------------------------+ |
| | P001      | Siti Aminah       | siti@simpus.id   | Admin          | |
| | P002      | Budi Santoso      | budi@simpus.id   | Staf           | |
| +-------------------------------------------------------------------+ |
+-----------------------------------------------------------------------+
```
---

## Wireframe: Form Peminjaman
Form input untuk mencatat data transaksi peminjaman buku baru.
```
+---------------------------------------------------+
| Form Peminjaman Buku                              |
+---------------------------------------------------+
| Anggota       : [ dropdown pilih anggota        ] |
| Buku          : [ dropdown, hanya stok > 0      ] |
| Tanggal Pinjam: [ auto: hari ini                ] |
|                                                   |
|           [ Simpan Peminjaman ]                   |
+---------------------------------------------------+
```
---

## Wireframe: Form Pengembalian
Formulir interaktif untuk memproses pengembalian buku yang dipinjam.
```
[Dashboard] -> [Menu "Pengembalian"] -> [Cari transaksi aktif (anggota/buku)]
   -> [Tandai "Dikembalikan"] -> [Stok buku bertambah 1]
   -> [Kembali ke Dashboard]
```
---

## Konsistensi dengan Desain yang Sudah Berjalan

* Warna aksen, tipografi navbar, dan gaya tabel/kartu mengikuti assets/css/style.css yang sudah dibangun sejak Jobsheet 2-3.
* Navbar untuk Tamu hanya menyediakan menu umum (Beranda, Katalog Buku, Tombol Login), sedangkan Petugas yang sudah login dapat melihat seluruh menu (Buku, Petugas, Peminjaman, Logout).
* Edge case yang perlu ditangani saat implementasi:
  1. Pengguna Tamu yang mencoba mengakses halaman List Petugas atau aksi Tambah/Edit/Hapus Buku via URL langsung akan dialihkan ke halaman Login.
  2. Buku dengan stok 0 tidak boleh bisa dipilih pada form peminjaman.