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

<main>
    <section>
    <h2>Edit Anggota</h2>

    <?php if ($flash): ?>
        <div class="alert alert-<?php echo $flash['type']; ?>">
            <?php echo $flash['pesan']; ?>
        </div>
    <?php endif; ?>

    <form id="form-tambah" method="post" action="proses_edit.php">
        <input type="hidden" name="id" value="<?php echo $anggota['id']; ?>">

        <p>
            <label for="nama">Nama</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $anggota['nama']; ?>" required>
        </p>

        <p>
            <label for="no_anggota">Nomor Anggota</label><br>
            <input type="text" id="no_anggota" name="no_anggota" value="<?php echo $anggota['no_anggota']; ?>">
        </p>

        <p>
            <label for="no_hp">Nomor Telepon</label><br>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo $anggota['no_hp']; ?>">
        </p>

        <p>
            <label for="alamat">Alamat</label><br>
            <input type="text" id="alamat" name="alamat" value="<?php echo $anggota['alamat']; ?>">
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="list.php">Batal</a>
    </form>
</section>
</main>

<?php include __DIR__ . '/../includes/footer.php'; ?>