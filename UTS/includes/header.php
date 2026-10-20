<?php
  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  $sudahLogin = isset($_SESSION["user_id"]);
  $_jobsheetRoot = dirname(__DIR__);
  $__scriptDir = dirname($_SERVER["SCRIPT_FILENAME"]);
  $_rel = ltrim(
      str_replace("\\", "/", substr($__scriptDir, strlen($_jobsheetRoot))),
      "/"
  );
  $base = $_rel === "" ? "" : str_repeat("../", substr_count($_rel, "/") + 1);

  if (session_status() === PHP_SESSION_NONE) {
      session_start();
  }

  $sudahLogin = isset($_SESSION["user_id"]);
  $_jobsheetRoot = dirname(__DIR__);
  $__scriptDir = dirname($_SERVER["SCRIPT_FILENAME"]);
  $_rel = ltrim(
      str_replace("\\", "/", substr($__scriptDir, strlen($_jobsheetRoot))),
      "/"
  );
  $base = $_rel === "" ? "" : str_repeat("../", substr_count($_rel, "/") + 1);

  $uri = $_SERVER["SCRIPT_NAME"];
  if (!function_exists("isActiveMenu")) {
      function isActiveMenu($path)
      {
          $currentScript = $_SERVER["SCRIPT_NAME"] ?? "";
          return strpos($currentScript, $path) !== false;
      }
  }

  $activeClass = "bg-indigo-50 text-indigo-600 font-semibold shadow-sm";
  $inactiveClass =
      "text-slate-600 hover:bg-slate-100/80 hover:text-slate-900 font-medium";

  $activeIcon = "text-indigo-600";
  $inactiveIcon = "text-slate-500";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMPUS-Mini<?php echo isset($page_title)
        ? " | " . htmlspecialchars($page_title)
        : ""; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link rel="stylesheet" href="<?php echo $base; ?>assets/css/style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script>
      tailwind.config = {
        theme: {
          extend: {
            fontFamily: {
              poppins: ['Poppins', 'sans-serif'],
            },
          },
        },
      }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>
  <body class="font-poppins bg-slate-50 text-slate-700 min-h-screen flex">

<aside class="w-64 bg-white border-r border-slate-100 min-h-screen p-5 flex flex-col justify-between shrink-0 shadow-sm">
  <div>
    <div class="flex items-center gap-3 mb-8 px-2">
      <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-blue-700 to-indigo-500 flex items-center justify-center text-amber-300 shadow-md shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
          <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z" />
          <path d="M21 5c-1.11 0-2.08.45-2.8 1.17C17.48 5.45 16.51 5 15.4 5c-1.85 0-3.4 1.27-3.83 2.98C11.13 7.35 10.12 7 9 7c-2.76 0-5 2.24-5 5v7c0 .55.45 1 1 1h14c1.1 0 2-.9 2-2V6c0-.55-.45-1-1-1zm-2 13H5v-6c0-1.66 1.34-3 3-3 1.31 0 2.42.83 2.83 2H9c-.55 0-1 .45-1 1s.45 1 1 1h3c.55 0 1-.45 1-1V9.5c0-1.38 1.12-2.5 2.5-2.5s2.5 1.12 2.5 2.5V18z"/>
        </svg>
      </div>
      <span class="text-xl font-bold text-slate-800 tracking-tight">SIMPUS-Mini</span>
    </div>
    <nav class="space-y-1.5">
      <?php $active = isActiveMenu("index.php"); ?>
      <a href="<?php echo $base; ?>index.php" 
         class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
             ? $activeClass
             : $inactiveClass; ?>">
        <svg class="w-5 h-5 <?php echo $active
            ? $activeIcon
            : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 00-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Beranda
      </a>
      <?php $active = isActiveMenu("buku/list.php") || isActiveMenu("buku/edit.php");?>
      <a href="<?php echo $base; ?>buku/list.php" 
         class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
             ? $activeClass
             : $inactiveClass; ?>">
        <svg class="w-5 h-5 <?php echo $active
            ? $activeIcon
            : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        Daftar Buku
      </a>
      <?php if ($sudahLogin): ?>
        <?php $active = isActiveMenu("buku/tambah.php"); ?>
        <a href="<?php echo $base; ?>buku/tambah.php" 
           class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
               ? $activeClass
               : $inactiveClass; ?>">
          <svg class="w-5 h-5 <?php echo $active
              ? $activeIcon
              : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Tambah Buku
        </a>
        <?php $active = isActiveMenu("anggota/list.php") || isActiveMenu("anggota/edit.php"); ?>
        <a href="<?php echo $base; ?>anggota/list.php" 
           class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
               ? $activeClass
               : $inactiveClass; ?>">
          <svg class="w-5 h-5 <?php echo $active
              ? $activeIcon
              : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          Daftar Anggota
        </a>
        <?php $active = isActiveMenu("anggota/tambah.php"); ?>
        <a href="<?php echo $base; ?>anggota/tambah.php" 
           class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
               ? $activeClass
               : $inactiveClass; ?>">
          <svg class="w-5 h-5 <?php echo $active
              ? $activeIcon
              : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
          </svg>
          Tambah Anggota
        </a>
      <?php endif; ?>
    </nav>
  </div>
  <div class="pt-4 border-t border-slate-100">
    <?php if ($sudahLogin): ?>
      <a href="<?php echo $base; ?>auth/logout.php" 
         class="flex items-center gap-3.5 px-4 py-3 text-red-600 font-medium rounded-xl hover:bg-red-50 transition-all">
        <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
        </svg>
        Logout
      </a>
    <?php else: ?>
      <?php $active = isActiveMenu("auth/login.php"); ?>
      <a href="<?php echo $base; ?>auth/login.php" 
         class="flex items-center gap-3.5 px-4 py-3 rounded-xl transition-all <?php echo $active
             ? $activeClass
             : $inactiveClass; ?>">
        <svg class="w-5 h-5 <?php echo $active
            ? $activeIcon
            : $inactiveIcon; ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
        </svg>
        Login
      </a>
    <?php endif; ?>
  </div>
</aside>
