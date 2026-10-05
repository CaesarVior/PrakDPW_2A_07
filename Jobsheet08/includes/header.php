<?php
    session_start();
    $_jobsheetRoot = dirname(__DIR__);
    $__scriptDir   = dirname($_SERVER['SCRIPT_FILENAME']);
    $_rel          = ltrim(str_replace('\\', '/', substr($__scriptDir, strlen($_jobsheetRoot))), '/');
    $base          = $_rel === '' ? '' : str_repeat('../', substr_count($_rel, '/') + 1);
?>

<php lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIMPUS-Mini<?php echo isset($page_title) ? ' | ' . $page_title : ''; ?></title>
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
        <a class="navbar-brand fw-semibold" href="../index.php">SIMPUS-Mini</a>
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
            <li class="nav-item">
              <a class="nav-link" href="../index.php">Beranda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../buku/list.php">Daftar Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../buku/tambah.php">Tambah Buku</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="../anggota/list.php">Daftar Anggota</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../anggota/tambah.php">Tambah Anggota</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>