<?php

  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  $sudahLogin = isset($_SESSION['user_id']);

    $_jobsheetRoot = dirname(__DIR__);
    $__scriptDir   = dirname($_SERVER['SCRIPT_FILENAME']);
    $_rel          = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($_jobsheetRoot))), '/');
    $base          = $_rel === '' ? '' : str_repeat('../', substr_count($_rel, '/') + 1);
?>

<?php
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  $sudahLogin = isset($_SESSION['user_id']);

  $_jobsheetRoot = dirname(__DIR__);
  $__scriptDir   = dirname($_SERVER['SCRIPT_FILENAME']);
  $_rel          = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($_jobsheetRoot))), '/');
  $base          = $_rel === '' ? '' : str_repeat('../', substr_count($_rel, '/') + 1);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . htmlspecialchars($page_title) : ''; ?></title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css">
  </head>
  <body>
    <header
      class="navbar navbar-expand-lg navbar-dark"
      style="background-color: #403d88"
    >
      <div class="container">
        <a class="navbar-brand fw-semibold" href="<?php echo $base; ?>index.php">SIMPUS-Mini</a>
        <button
          type="button"
          id="nav-toggle-btn"
          class="nav-toggle-label"
          aria-label="Menu"
        >
          &#9776;
        </button>
        <nav id="navMenu">
          <ul class="navbar-nav ms-auto">
            <!-- Menu Publik (Selalu Tampil) -->
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $base; ?>index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $base; ?>buku/list.php">Daftar Buku</a>
            </li>

            <!-- Menu Khusus (Hanya Tampil Jika Sudah Login) -->
            <?php if ($sudahLogin): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $base; ?>buku/tambah.php">Tambah Buku</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $base; ?>anggota/list.php">Daftar Anggota</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo $base; ?>anggota/tambah.php">Tambah Anggota</a>
              </li>
            <?php endif; ?>

            <!-- Status Login / Logout -->
            <li class="nav-item">
              <?php if ($sudahLogin): ?>
                <a class="nav-link" href="<?php echo $base; ?>auth/logout.php">Logout</a>
              <?php else: ?>
                <a class="nav-link" href="<?php echo $base; ?>auth/login.php">Login</a>
              <?php endif; ?>
            </li>
          </ul>
        </nav>
      </div>
    </header>