<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION["user_id"])) {
        header("Location: ../index.php");
        exit();
    }

    $page_title = "Login";
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
    <main class="min-h-screen w-full bg-white flex items-center justify-center font-poppins">
        <div class="w-full min-h-screen grid grid-cols-1 lg:grid-cols-2">
            <div class="hidden lg:block relative w-full h-full overflow-hidden bg-[#fcd535]">
                <img 
                    src="/assets/img/login-img.jpg" 
                    alt="E-Library Illustration" 
                    class="w-full h-full object-cover"
                />
            </div>

            <div class="bg-[#FBEFEF] flex flex-col justify-between p-8 sm:p-12 lg:p-16 w-full max-w-md sm:max-w-lg mx-auto lg:max-w-none">
            <div class="my-auto py-6">
                <div class="text-center mb-8">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-poppins font-semibold text-slate-900 tracking-tight mb-2">
                    Welcome Back!
                </h1>
                <p class="text-lg sm:text-xl font-poppins text-slate-800">
                    Login please
                </p>
                </div>
                <?php if (isset($_SESSION["flash"])): ?>
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
                        icon: '<?php echo ($_SESSION["flash"]["type"] ?? "") === "success" ? "success" : "error"; ?>',
                        title: '<?php echo addslashes(htmlspecialchars($_SESSION["flash"]["pesan"])); ?>'
                    });
                    });
                </script>
                <?php unset($_SESSION["flash"]); ?>
                <?php endif; ?>
                <form action="proses_login.php" method="POST" class="space-y-5 max-w-sm mx-auto">
                <div>
                    <label for="username" class="block text-xs font-semibold text-slate-800 mb-1.5 ml-3">
                    Username
                    </label>
                    <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    required 
                    placeholder="Enter your username"
                    class="w-full px-5 py-3 bg-white text-slate-800 text-sm rounded-full border border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all font-medium"
                    />
                </div>
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-800 mb-1.5 ml-3">
                    Password
                    </label>
                    <div class="relative flex items-center">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        required 
                        placeholder="Enter your password"
                        class="w-full pl-5 pr-12 py-3 bg-white text-slate-800 text-sm rounded-full border border-slate-900 focus:outline-none focus:ring-2 focus:ring-slate-900 transition-all font-medium"
                    />
                    <button type="button" class="absolute right-4 text-slate-800 hover:text-slate-600 focus:outline-none">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </button>
                    </div>
                </div>
                <div class="pt-3 flex flex-col items-center gap-3">
                    <button 
                        type="submit" 
                        class="w-full px-8 py-2.5 bg-slate-900 text-white font-medium text-sm rounded-full hover:bg-slate-800 focus:ring-4 focus:ring-slate-200 transition-all shadow-md active:scale-95 cursor-pointer"
                    >
                        Login
                    </button>
                    <a
                        href="/index.php"
                        class="w-full text-center px-8 py-2.5 border border-slate-900 text-slate-900 hover:bg-slate-100 font-medium text-sm rounded-full transition-all active:scale-95"
                    >
                        Kembali
                    </a>
                </div>
                </form>
                <div class="mt-6 text-center">
                <p class="text-xs text-slate-600">
                    Belum mempunyai Akun?
                    <a href="register.php" class="font-semibold text-slate-900 underline underline-offset-2 hover:text-indigo-600 transition-colors">
                    Daftar Sekarang
                    </a>
                </p>
                </div>
            </div>
            </div>
        </div>
    </main>
</body>
