<?php
require __DIR__ . "/../includes/auth.php";
require __DIR__ . "/../includes/auth.php";

$currentPage = 'buku_tambah';
$page_title = "Tambah Buku";
include __DIR__ . "/../includes/header.php";

$flash = $_SESSION["flash"] ?? null;
unset($_SESSION["flash"]);
?>

<main class="m-14 container">
  <div class="mb-8">
    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Directory</span>
    <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Tambah Buku</h1>
  </div>
  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
    <?php if ($flash): ?>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            customClass: { popup: 'font-sans' }
          });
          Toast.fire({
            icon: '<?php echo ($flash["type"] ?? "") === "success"
                ? "success"
                : "error"; ?>',
            title: '<?php echo addslashes(
                htmlspecialchars($flash["pesan"])
            ); ?>'
          });
        });
      </script>
    <?php endif; ?>
    <form id="form-tambah" method="post" action="proses_tambah.php" class="space-y-4">
      <div>
        <label for="judul" class="block text-xs font-semibold text-slate-800 mb-1.5">
          Judul Buku
        </label>
        <input 
          type="text" 
          id="judul" 
          name="judul" 
          required
          placeholder="Masukkan judul buku..." 
          class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
        />
      </div>
      <div>
        <label for="pengarang" class="block text-xs font-semibold text-slate-800 mb-1.5">
          Nama Pengarang
        </label>
        <input 
          type="text" 
          id="pengarang" 
          name="pengarang" 
          required
          placeholder="Masukkan nama pengarang..." 
          class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
        />
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="tahun" class="block text-xs font-semibold text-slate-800 mb-1.5">
            Tahun Publikasi
          </label>
          <input 
            type="number" 
            id="tahun" 
            name="tahun" 
            required
            placeholder="cth. 2024" 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div>
          <label for="isbn" class="block text-xs font-semibold text-slate-800 mb-1.5">
            ISBN
          </label>
          <input 
            type="text" 
            id="isbn" 
            name="isbn" 
            required
            placeholder="Masukkan Nomor ISBN.." 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="stok" class="block text-xs font-semibold text-slate-800 mb-1.5">
            Jumlah Stok
          </label>
          <input 
            type="number" 
            id="stok" 
            name="stok" 
            required
            placeholder="0" 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div>
          <label for="kategori" class="block text-xs font-semibold text-slate-800 mb-1.5">
            Kategori
          </label>
          <div class="relative">
            <select 
              id="kategori" 
              name="kategori" 
              class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all font-medium appearance-none cursor-pointer pr-10"
            >
              <option value="fiksi">Fiksi</option>
              <option value="non-fiksi">Non-Fiksi</option>
              <option value="referensi">Referensi</option>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-slate-400">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-between pt-6 mt-6 border-t border-slate-100">
        <a 
          href="list.php" 
          class="text-sm font-semibold text-slate-700 hover:text-slate-900 underline underline-offset-4 transition-colors"
        >
          Batal
        </a>
        <div class="flex items-center gap-2">
          <button 
            type="submit" 
            class="px-5 py-2.5 bg-slate-900 text-white font-semibold text-sm rounded-xl hover:bg-slate-800 focus:ring-4 focus:ring-slate-200 transition-all shadow-sm active:scale-95"
          >
            Simpan Buku
          </button>
        </div>
      </div>
    </form>
  </div>
</main>
