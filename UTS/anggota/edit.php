<?php
$page_title = "Edit Anggota";
include __DIR__ . '/../includes/header.php';
require __DIR__ . '/../includes/koneksi.php';

$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM anggota WHERE id = :id");
$stmt->execute(['id' => $id]);
$anggota = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$anggota) {
    header('Location: list.php');
    exit;
}
?>

<main class="m-14 container">
  <div class="mb-6">
    <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">DIRECTORY</span>
    <h1 class="text-3xl font-bold text-slate-900 tracking-tight mt-1">Edit Anggota</h1>
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
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($anggota['id']); ?>">
      <div>
        <label for="nama" class="block text-xs font-semibold text-slate-800 mb-1.5">
          Nama Lengkap
        </label>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          value="<?php echo htmlspecialchars($anggota['nama']); ?>" 
          required
          placeholder="Masukkan nama lengkap..." 
          class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
        />
      </div>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
          <label for="no_anggota" class="block text-xs font-semibold text-slate-800 mb-1.5">
            Nomor Anggota
          </label>
          <input 
            type="text" 
            id="no_anggota" 
            name="no_anggota" 
            value="<?php echo htmlspecialchars($anggota['no_anggota']); ?>" 
            placeholder="cth. MBR-001" 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div>
          <label for="no_hp" class="block text-xs font-semibold text-slate-800 mb-1.5">
            Nomor Telepon
          </label>
          <input 
            type="text" 
            id="no_hp" 
            name="no_hp" 
            value="<?php echo htmlspecialchars($anggota['no_hp']); ?>" 
            placeholder="cth. 08123456789" 
            class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
      </div>
      <div>
        <label for="alamat" class="block text-xs font-semibold text-slate-800 mb-1.5">
          Alamat
        </label>
        <input 
          type="text" 
          id="alamat" 
          name="alamat" 
          value="<?php echo htmlspecialchars($anggota['alamat']); ?>" 
          placeholder="Masukkan alamat lengkap..." 
          class="w-full px-4 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
        />
      </div>
      <div class="flex items-center justify-between pt-6 mt-6 border-t border-slate-100">
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
