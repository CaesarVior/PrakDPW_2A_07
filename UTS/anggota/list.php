<?php
    require __DIR__ . '/../includes/auth.php';

    $page_title = "Daftar Anggota";
    include __DIR__ . '/../includes/header.php';
    require __DIR__ . '/../includes/koneksi.php';

    $currentPage = 'anggota_list';
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);

    $perPage = 5;
    $page = max(1, (int) ($_GET['page'] ?? 1));
    $offset = ($page - 1) * $perPage;
    $keyword = trim($_GET['q'] ?? '');

    if ($keyword !== '') {
        $hitung = $pdo->prepare("SELECT COUNT(*) 
        FROM anggota WHERE nama ILIKE :kw");
        $hitung->execute(['kw' => '%' . $keyword . '%']);
        $totalRows = $hitung->fetchColumn();

        $stmt = $pdo->prepare("SELECT * FROM 
        anggota WHERE nama ILIKE :kw ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue('kw', '%' . $keyword . '%');
    } else {
        $totalRows = $pdo->query("SELECT COUNT(*) FROM anggota")->fetchColumn();
        $stmt = $pdo->prepare("SELECT * FROM anggota ORDER BY id DESC LIMIT :limit OFFSET :offset");
    }

    $stmt->bindValue('limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue('offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $daftarAnggota = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalPages = max(1, (int) ceil($totalRows / $perPage));
?>

<main class="m-14 container">
  <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
    <div>
      <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Directory</span>
      <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Daftar Pengguna</h1>
    </div>
    <a href="tambah.php" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-white text-sm font-semibold rounded-xl hover:bg-slate-800 transition-all shadow-sm self-start md:self-auto">
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
      </svg>
      Tambah Pengguna
    </a>
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
          icon: '<?php echo ($flash["type"] ?? "") === "success"
              ? "success"
              : "error"; ?>',
          title: '<?php echo addslashes(htmlspecialchars($flash["pesan"])); ?>'
        });
      });
    </script>
  <?php endif; ?>
  <div class="mb-6 max-w-md">
    <form method="get" action="list.php" class="relative flex items-center">
      <label for="search-input" class="sr-only">Search Anggota</label>
      <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
      <input 
        type="text"
        id="search-input"
        name="q"
        value="<?php echo htmlspecialchars($keyword ?? ""); ?>"
        placeholder="Cari Nama Pengguna..."
        class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 text-slate-700 placeholder-slate-400 text-sm font-medium rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all shadow-sm"
      />
    </form>
  </div>
  <div class="overflow-x-auto bg-white rounded-3xl border border-slate-200/80 shadow-sm p-6 sm:p-8">
    <table class="w-full text-left border-separate border-spacing-y-2">
      <thead>
        <tr class="text-xs font-semibold text-slate-500 uppercase tracking-wider">
          <th class="pb-2 pl-4">Nama</th>
          <th class="pb-2 px-4">Kontak</th>
          <th class="pb-2 px-4">Alamat</th>
          <th class="pb-2 pr-4 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($daftarAnggota)): ?>
          <tr>
            <td colspan="4" class="py-12 text-center text-slate-400 font-medium bg-white rounded-2xl border border-slate-100">
              No Anggota data found.
            </td>
          </tr>
        <?php else: ?>
          <?php foreach ($daftarAnggota as $anggota): ?>
        <script>
          function confirmDelete(event, form) {
            event.preventDefault();

            Swal.fire({
              title: 'Hapus Anggota?',
              text: 'Anggota <?php echo htmlspecialchars($anggota["nama"]); ?> akan dihapus secara permanen!',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#ef4444', 
              cancelButtonColor: '#94a3b8',  
              confirmButtonText: 'Ya, Hapus!',
              cancelButtonText: 'Batal',
              customClass: {
                popup: 'rounded-2xl font-sans',
                confirmButton: 'rounded-xl text-xs font-semibold px-4 py-2.5',
                cancelButton: 'rounded-xl text-xs font-semibold px-4 py-2.5'
              }
            }).then((result) => {
              if (result.isConfirmed) {
                form.submit();
              }
            });
          }
        </script>
            <tr class="bg-slate-50/80 hover:bg-slate-100/80 transition-colors rounded-2xl">
              <td class="py-3.5 pl-4 pr-4 rounded-l-2xl">
                <div class="flex items-center gap-3">
                  <img 
                    src="https://ui-avatars.com/api/?name=<?php echo urlencode(
                        $anggota["nama"]
                    ); ?>&background=random&bold=true&size=128" 
                    alt="<?php echo htmlspecialchars($anggota["nama"]); ?>" 
                    class="w-10 h-10 rounded-full object-cover shrink-0 shadow-sm"
                  />
                  <div>
                    <p class="font-semibold text-slate-900 text-sm leading-snug">
                      <?php echo htmlspecialchars($anggota["nama"]); ?>
                    </p>
                    <p class="text-xs text-slate-400 font-medium">
                      ID: <?php echo htmlspecialchars(
                          $anggota["no_anggota"]
                      ); ?>
                    </p>
                  </div>
                </div>
              </td>
              <td class="py-3.5 px-4 text-sm font-medium text-slate-700">
                <?php echo htmlspecialchars($anggota["no_hp"]); ?>
              </td>
              <td class="py-3.5 px-4 text-sm font-medium text-slate-600 max-w-xs truncate">
                <?php echo htmlspecialchars($anggota["alamat"]); ?>
              </td>
              <td class="py-3.5 pr-4 pl-4 text-center rounded-r-2xl">
                <div class="inline-flex items-center justify-end gap-2">
                  <a 
                    href="edit.php?id=<?php echo $anggota["id"]; ?>" 
                    class="px-3 py-1.5 text-xs font-semibold text-slate-700 bg-white hover:bg-slate-200/70 border border-slate-200 rounded-lg transition-all shadow-sm"
                  >
                    Ubah
                  </a>
                    <form method="post" action="hapus.php" class="inline" onsubmit="confirmDelete(event, this)">
                        <input type="hidden" name="id" value="<?php echo $anggota['id']; ?>">
                        <button 
                            type="submit" 
                            class="px-3 py-1.5 text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all"
                        >
                            Hapus
                        </button>
                    </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
  <?php if (isset($totalPages) && $totalPages > 1): ?>
    <nav class="flex justify-center items-center gap-2 mt-8">
      <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="list.php?page=<?php
        echo $i;
        echo !empty($keyword) ? "&q=" . urlencode($keyword) : "";
        ?>"
           class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-semibold transition-all <?php echo $i ===
           $page
               ? "bg-slate-900 text-white shadow-md"
               : "bg-white text-slate-600 border border-slate-200 hover:bg-slate-50"; ?>">
          <?php echo $i; ?>
        </a>
      <?php endfor; ?>
    </nav>
  <?php endif; ?>
</main>