<?php
    $page_title = "Daftar Buku";
    include __DIR__ . "/../includes/header.php";
    require __DIR__ . "/../includes/koneksi.php";

    $currentPage = "buku_list";
    $flash = $_SESSION["flash"] ?? null;
    unset($_SESSION["flash"]);

    $perPage = 5;
    $page = max(1, (int) ($_GET["page"] ?? 1));
    $offset = ($page - 1) * $perPage;
    $keyword = trim($_GET["q"] ?? "");

    if ($keyword !== "") {
        $hitung = $pdo->prepare("SELECT COUNT(*) FROM buku WHERE 
                    judul ILIKE :kw");
        $hitung->execute(["kw" => "%" . $keyword . "%"]);
        $totalRows = $hitung->fetchColumn();

        $stmt = $pdo->prepare("SELECT * FROM buku WHERE judul ILIKE 
                    :kw ORDER BY id DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue("kw", "%" . $keyword . "%");
    } else {
        $totalRows = $pdo->query("SELECT COUNT(*) FROM buku")->fetchColumn();
        $stmt = $pdo->prepare("SELECT * FROM buku ORDER BY id 
                    DESC LIMIT :limit OFFSET :offset");
    }

    $stmt->bindValue("limit", $perPage, PDO::PARAM_INT);
    $stmt->bindValue("offset", $offset, PDO::PARAM_INT);
    $stmt->execute();
    $daftarBuku = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // var_dump($daftarBuku);

    $totalPages = max(1, (int) ceil($totalRows / $perPage));
    ?>

<main class="m-14 container">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Directory</span>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Daftar Buku</h1>
        </div>
        <a href="tambah.php" class="inline-flex items-center gap-2 px-4 py-2.5 bg-slate-900 text-white text-sm font-semibold rounded-xl hover:bg-slate-800 transition-all shadow-sm self-start md:self-auto">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M12 4v16m8-8H4"/>
        </svg>
        Tambah Buku
        </a>
    </div>

    <div class="mb-6 max-w-md">
        <form method="get" action="list.php" class="relative flex items-center">
        <label for="search-input" class="sr-only">Cari buku</label>
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
            placeholder="Cari Judul Buku" 
            class="w-full pl-10 pr-4 py-2 bg-white border border-slate-200 text-slate-700 placeholder-slate-400 text-sm font-medium rounded-xl focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all shadow-sm"
        />
        </form>
    </div>
    <section class="py-4">

    <?php if ($flash): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            customClass: {
                popup: 'font-sans' 
            },
            didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
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
    <?php if (empty($daftarBuku)): ?>
        <div class="text-center py-16 bg-white rounded-2xl border border-slate-100 shadow-sm">
        <p class="text-slate-400 font-medium">No book data available.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        <?php foreach ($daftarBuku as $buku): ?>

        <script>
            function confirmDelete(event, form) {
            event.preventDefault();

            Swal.fire({
                title: 'Hapus buku?',
                text: 'Buku <?php echo htmlspecialchars($buku["judul"]); ?> akan dihapus secara permanen!',
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
            <div class="bg-white rounded-2xl p-3 border border-slate-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col justify-between">
            <div>
                <div class="relative aspect-[2/3] w-full rounded-xl bg-slate-100 overflow-hidden mb-3 shadow-sm">
                <?php if (!empty($buku["cover"])): ?>
                    <img src="<?php echo htmlspecialchars(
                        $buku["cover"]
                    ); ?>" alt="<?php echo htmlspecialchars(
                        $buku["judul"]
                    ); ?>" class="w-full h-full object-cover">
                <?php else: ?>
                    <div class="w-full h-full bg-gradient-to-tr from-slate-800 to-indigo-900 flex flex-col justify-between p-3 text-white">
                        <span class="text-[10px] font-semibold uppercase tracking-wider text-slate-300"><?php echo htmlspecialchars(
                            $buku["kategori"]
                        ); ?></span>
                        <p class="text-xs font-bold line-clamp-3 leading-tight"><?php echo htmlspecialchars(
                            $buku["judul"]
                        ); ?></p>
                        </div>
                <?php endif; ?>

                <span class="absolute top-2 left-2 px-2 py-0.5 bg-black/50 backdrop-blur-md text-white text-[10px] font-medium rounded-md">
                    <?php echo ucfirst(htmlspecialchars($buku["kategori"])); ?>
                </span>

                    <span class="absolute top-2 right-2 px-2 py-0.5 <?php echo $buku[
                        "stok"
                    ] > 0
                        ? "bg-emerald-500/90"
                        : "bg-red-500/90"; ?> backdrop-blur-md text-white text-[10px] font-semibold rounded-md">
                        Stock: <?php echo htmlspecialchars($buku["stok"]); ?>
                    </span>
                </div>

                <h3 class="font-bold text-slate-800 text-sm leading-snug line-clamp-1 group-hover:text-indigo-600 transition-colors" title="<?php echo htmlspecialchars(
                    $buku["judul"]
                ); ?>">
                    <?php echo htmlspecialchars($buku["judul"]); ?>
                </h3>
                <p class="text-xs text-slate-400 font-medium mt-0.5 line-clamp-1">
                    <?php echo htmlspecialchars($buku["pengarang"]); ?>
                </p>

                <div class="mt-3 text-[11px] text-slate-400 space-y-1 border-t border-slate-100 pt-2">
                <div class="flex justify-between">
                    <span>Year:</span>
                    <span class="font-semibold text-slate-600"><?php echo htmlspecialchars(
                        $buku["tahun"]
                    ); ?></span>
                </div>
                <div class="flex justify-between">
                    <span>ISBN:</span>
                    <span class="font-semibold text-slate-600 truncate max-w-[90px]"><?php echo htmlspecialchars(
                        $buku["isbn"]
                    ); ?></span>
                </div>
                </div>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center gap-2">
                <a 
                    href="edit.php?id=<?php echo htmlspecialchars(
                        $buku["id"]
                    ); ?>" 
                    class="flex-1 inline-flex items-center justify-center py-2 px-3 text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200/80 rounded-lg transition-all"
                >
                    Edit
                </a>
                <form method="post" action="hapus.php" class="flex-1" onsubmit="confirmDelete(event, this)">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars(
                        $buku["id"]
                    ); ?>">
                    <button 
                    type="submit" 
                    class="w-full inline-flex items-center justify-center py-2 px-3 text-xs font-semibold text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-all cursor-pointer"
                    >
                    Delete
                    </button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>

    <?php if (isset($totalPages) && $totalPages > 1): ?>
        <nav class="flex justify-center items-center gap-2 mt-10">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="list.php?page=<?php
            echo $i;
            echo !empty($keyword) ? "&q=" . urlencode($keyword) : "";
            ?>"
            class="w-9 h-9 flex items-center justify-center rounded-xl text-sm font-semibold transition-all <?php echo $i ===
            $page
                ? "bg-indigo-600 text-white shadow-md shadow-indigo-200"
                : "bg-white text-slate-600 border border-slate-100 hover:bg-slate-50"; ?>">
            <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        </nav>
    <?php endif; ?>
    </section>
</main>