<?php
require __DIR__ . '/../includes/auth.php';
$page_title = "Edit Buku";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM buku WHERE id = :id");
$stmt->execute(['id' => $id]);
$buku = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$buku) {
    header('Location: list.php');
    exit;
}
?>

<main class="m-14 container">
  <div class="mb-6">
    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">DIRECTORY</span>
    <h1 class="text-3xl font-bold text-slate-900 tracking-tight mt-1">Edit Buku</h1>
  </div>

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
          icon: '<?php echo ($flash['type'] ?? '') === 'success' ? 'success' : 'error'; ?>',
          title: '<?php echo addslashes(htmlspecialchars($flash['pesan'])); ?>'
        });
      });
    </script>
  <?php endif; ?>

  <div class="bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
    <form id="form-edit" method="post" action="proses_edit.php" class="space-y-4">
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($buku['id']); ?>">
      <div>
        <label for="judul" class="block text-xs font-semibold text-slate-800 mb-1.5">
          Judul Buku
        </label>
        <input 
          type="text" 
          id="judul" 
          name="judul" 
          value="<?php echo htmlspecialchars($buku['judul']); ?>" 
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
          value="<?php echo htmlspecialchars($buku['pengarang']); ?>" 
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
            value="<?php echo htmlspecialchars($buku['tahun']); ?>" 
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
            value="<?php echo htmlspecialchars($buku['isbn']); ?>" 
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
            value="<?php echo htmlspecialchars($buku['stok']); ?>" 
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
              <?php foreach (['fiksi' => 'Fiksi', 'non-fiksi' => 'Non-Fiksi', 'referensi' => 'Referensi'] as $value => $label): ?>
                <option value="<?php echo $value; ?>" <?php echo $buku['kategori'] === $value ? 'selected' : ''; ?>>
                  <?php echo $label; ?>
                </option>
              <?php endforeach; ?>
            </select>
            <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-slate-400">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="flex items-center justify-between pt-6 mt-6">
        <a 
          href="list.php" 
          class="text-sm font-semibold text-slate-700 hover:text-slate-900 underline underline-offset-4 transition-colors"
        >
          Batal
        </a>
        <button 
          type="submit" 
          class="px-5 py-2.5 bg-slate-900 text-white font-semibold text-sm rounded-xl hover:bg-slate-800 focus:ring-4 focus:ring-slate-200 transition-all shadow-sm active:scale-95"
        >
          Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</main>