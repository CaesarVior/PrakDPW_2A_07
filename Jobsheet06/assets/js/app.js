function initNavToggle() {
  const toggleBtn = document.getElementById("nav-toggle-btn");
  const nav = document.querySelector("header nav");

  // Guard Clause yang berfungsi untuk
  // Menghentikan jika elemen tidak ada di halaman
  if (!toggleBtn || !nav) return;

  toggleBtn.addEventListener("click", function () {
    nav.classList.toggle("nav-open");
  });
}

//  Popup Konfirmasi Hapus
function initHapusConfirm() {
  document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-hapus");
    if (!btn) return;

    const row = btn.closest("tr");
    const nama = row ? row.querySelector("td")?.textContent : "data ini";
    const yakin = confirm('Yakin ingin menghapus "' + nama + '"?');

    if (yakin && row) {
      row.remove();
    }
  });
}

// Melakukan filtering table secara realtime menggunakan search input
function initTableFilter() {
  const input = document.getElementById("search-input");
  const table = document.querySelector(".table-responsive table, table");

  // Guard Clause
  if (!input || !table) return;

  input.addEventListener("keyup", function () {
    const keyword = input.value.toLowerCase();
    const rows = table.querySelectorAll("tbody tr");

    rows.forEach(function (row) {
      const teks = row.textContent.toLowerCase();
      row.style.display = teks.includes(keyword) ? "" : "none";
    });
  });
}

// Fungsi untuk Menampilkan pesan error di bawah input
function tampilkanError(input, pesan) {
  hapusError(input);
  const span = document.createElement("span");
  span.className = "error";
  span.textContent = pesan;
  input.insertAdjacentElement("afterend", span);
}

// Fungsi untuk Menghapus pesan error
function hapusError(input) {
  const next = input.nextElementSibling;
  if (next && next.classList.contains("error")) {
    next.remove();
  }
}

// Fungsi Utama Validasi Form
function initValidasiForm() {
  const form = document.getElementById("form-tambah");

  // Guard Clause
  if (!form) return;

  form.addEventListener("submit", function (e) {
    let valid = true;

    // A. Validasi Judul Buku / Nama Anggota
    const judul = form.querySelector("[name='judul'], [name='nama']");
    if (judul && judul.value.trim() === "") {
      tampilkanError(judul, "Field ini wajib diisi.");
      valid = false;
    } else if (judul) {
      hapusError(judul);
    }

    // B. Validasi Pengarang / Alamat
    const pengarang = form.querySelector("[name='pengarang'], [name='alamat']");
    if (pengarang && pengarang.value.trim() === "") {
      tampilkanError(pengarang, "Field ini wajib diisi.");
      valid = false;
    } else if (pengarang) {
      hapusError(pengarang);
    }

    // C. Validasi Tahun Terbit
    const tahun = form.querySelector("[name='tahun']");
    if (tahun) {
      const nilai = parseInt(tahun.value, 10);
      if (isNaN(nilai) || nilai < 1900 || nilai > 2026) {
        tampilkanError(tahun, "Tahun harus di antara 1900-2026.");
        valid = false;
      } else {
        hapusError(tahun);
      }
    }

    // D. Validasi Stok dan Angka tidak boleh Negatif
    const stok = form.querySelector("[name='stok']");
    if (stok) {
      const nilaiStok = parseInt(stok.value, 10);
      if (isNaN(nilaiStok) || nilaiStok < 0) {
        tampilkanError(stok, "Stok tidak boleh negatif.");
        valid = false;
      } else {
        hapusError(stok);
      }
    }

    if (!valid) {
      e.preventDefault();
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  initNavToggle();
  initHapusConfirm();
  initTableFilter();
  initValidasiForm();
});
