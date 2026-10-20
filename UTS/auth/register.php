<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit;
}

$page_title = "Registrasi Petugas";
?>


<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMPUS-Mini<?php echo isset($page_title)
        ? " | " . htmlspecialchars($page_title)
        : ""; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body>
<main class="min-h-screen grid grid-cols-1 lg:grid-cols-2 font-sans bg-[#FAF5F5]">
  <div class="hidden lg:flex items-center justify-center bg-white p-8 lg:p-12 border-r border-slate-100">
    <img 
      src="/assets/img/login-img.jpg" 
      alt="Register Illustration" 
      class="max-w-md w-full h-auto object-contain"
    />
  </div>
  <div class="flex items-center justify-center p-6 sm:p-12 bg-[#FAF5F5]">
    <div class="w-full max-w-sm">

    <?php if (isset($_SESSION['flash'])): ?>
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
              icon: '<?php echo ($_SESSION['flash']['type'] ?? '') === 'success' ? 'success' : 'error'; ?>',
              title: '<?php echo addslashes(htmlspecialchars($_SESSION['flash']['pesan'])); ?>'
            });
          });
        </script>
        <?php unset($_SESSION['flash']); ?>
      <?php endif; ?>

      <!-- Header Title -->
      <div class="text-center mb-6">
        <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Create Account!</h1>
        <p class="text-xs text-slate-500 mt-1">Register please</p>
      </div>

      <form action="proses_register.php" method="POST" class="space-y-4">
        <div>
          <label for="nama" class="block text-xs font-semibold text-slate-800 mb-1.5 ml-1">
            Nama Lengkap
          </label>
          <input 
            type="text" 
            id="nama" 
            name="nama" 
            required
            placeholder="Enter your full name" 
            class="w-full px-5 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div>
          <label for="username" class="block text-xs font-semibold text-slate-800 mb-1.5 ml-1">
            Username
          </label>
          <input 
            type="text" 
            id="username" 
            name="username" 
            required
            placeholder="Enter your username" 
            class="w-full px-5 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div>
          <label for="password" class="block text-xs font-semibold text-slate-800 mb-1.5 ml-1">
            Password
          </label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            minlength="6" 
            required
            placeholder="Enter your password" 
            class="w-full px-5 py-2.5 bg-white border border-slate-200 text-slate-800 text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-400 transition-all placeholder:text-slate-400 font-medium"
          />
        </div>
        <div class="pt-2 space-y-2.5">
          <button 
            type="submit" 
            class="w-full py-2.5 bg-[#111827] text-white font-medium text-sm rounded-full hover:bg-slate-800 focus:ring-4 focus:ring-slate-200 transition-all shadow-sm active:scale-95 cursor-pointer"
          >
            Daftar
          </button>
          <a
            href="index.php"
            class="block w-full text-center py-2.5 border border-slate-300 text-slate-800 font-medium text-sm rounded-full hover:bg-white/80 transition-all active:scale-95"
          >
            Kembali
          </a>
        </div>

      </form>
      <p class="text-xs text-slate-500 text-center mt-6">
        Sudah mempunyai Akun? <a href="login.php" class="font-bold text-slate-900 hover:underline">Login Sekarang</a>
      </p>
    </div>
  </div>
</main>
</body>


