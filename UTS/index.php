<?php
  $page_title = "Beranda";
  include __DIR__ . '/includes/header.php';
?>

<main class="m-14 container">
  <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
      <span class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Directory</span>
      <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Dashboard</h1>
    </div>
    <div class="flex items-center gap-3">
      <div class="relative hidden sm:block">
        <input 
          type="text" 
          placeholder="Search..." 
          class="pl-9 pr-4 py-2 bg-white border border-slate-200 text-slate-700 placeholder-slate-400 text-xs font-medium rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500/20 shadow-sm"
        />
        <svg class="w-4 h-4 text-slate-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      </div>

      <a href="buku/tambah.php" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold text-xs rounded-xl shadow-sm transition-all flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Add New Book
      </a>
    </div>
  </div>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
      <div class="flex items-center justify-between mb-4">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
        <button class="text-slate-300 hover:text-slate-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
        </button>
      </div>
      <div>
        <p class="text-xs font-semibold text-slate-500">Total Books</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-1">12</h3>
      </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
      <div class="flex items-center justify-between mb-4">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
        </div>
        <button class="text-slate-300 hover:text-slate-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
        </button>
      </div>
      <div>
        <p class="text-xs font-semibold text-slate-500">Total Anggotas</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-1">8</h3>
      </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
      <div class="flex items-center justify-between mb-4">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <button class="text-slate-300 hover:text-slate-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
        </button>
      </div>
      <div>
        <p class="text-xs font-semibold text-slate-500">Borrowed</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-1">3</h3>
      </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
      <div class="flex items-center justify-between mb-4">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <button class="text-slate-300 hover:text-slate-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
        </button>
      </div>
      <div>
        <p class="text-xs font-semibold text-slate-500">In Transit</p>
        <h3 class="text-2xl font-bold text-slate-900 mt-1">6</h3>
      </div>
    </div>
    <div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-all">
      <div class="flex items-center justify-between mb-4">
        <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <button class="text-slate-300 hover:text-slate-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm0 2c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm0 6c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z"/></svg>
        </button>
      </div>
      <div>
        <p class="text-xs font-semibold text-slate-500">Overdue Books</p>
        <div class="flex items-baseline justify-between mt-1">
          <h3 class="text-2xl font-bold text-slate-900">5</h3>
          <span class="text-[10px] font-semibold text-red-600 bg-red-50 px-2 py-0.5 rounded-full">Action Needed</span>
        </div>
      </div>
    </div>
  </div>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
      <div>
        <h2 class="text-lg font-bold text-slate-900">Aktivitas Terkini / Peminjam</h2>
        <p class="text-xs text-slate-400 font-medium mt-0.5">Daftar peminjaman buku terbaru di SIMPUS-Mini</p>
      </div>

      <div class="flex items-center gap-3">
        <a href="buku/list.php" class="px-3 py-1.5 bg-slate-50 hover:bg-slate-100 text-slate-600 font-semibold text-xs rounded-xl border border-slate-200 transition-colors">
          View All Books
        </a>
      </div>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="text-xs font-semibold text-slate-400 uppercase border-b border-slate-100">
            <th class="pb-3 pl-2">Judul Buku</th>
            <th class="pb-3 px-4">Peminjam</th>
            <th class="pb-3 px-4">Status</th>
            <th class="pb-3 pr-2 text-right">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 text-sm">
          <tr class="hover:bg-slate-50/80 transition-colors">
            <td class="py-3.5 pl-2 font-semibold text-slate-800">Laskar Pelangi</td>
            <td class="py-3.5 px-4 text-slate-600">
              <div class="flex items-center gap-2">
                <img src="https://ui-avatars.com/api/?name=Ahmad+Fauzi&background=random" class="w-6 h-6 rounded-full" alt="User">
                <span>Ahmad Fauzi</span>
              </div>
            </td>
            <td class="py-3.5 px-4">
              <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 font-semibold text-[11px] rounded-full">Borrowed</span>
            </td>
            <td class="py-3.5 pr-2 text-right">
              <button class="text-slate-400 hover:text-slate-600 text-xs font-semibold">Details</button>
            </td>
          </tr>
          <tr class="hover:bg-slate-50/80 transition-colors">
            <td class="py-3.5 pl-2 font-semibold text-slate-800">Bumi Manusia</td>
            <td class="py-3.5 px-4 text-slate-600">
              <div class="flex items-center gap-2">
                <img src="https://ui-avatars.com/api/?name=Siti+Aminah&background=random" class="w-6 h-6 rounded-full" alt="User">
                <span>Siti Aminah</span>
              </div>
            </td>
            <td class="py-3.5 px-4">
              <span class="px-2.5 py-1 bg-amber-50 text-amber-600 font-semibold text-[11px] rounded-full">In Transit</span>
            </td>
            <td class="py-3.5 pr-2 text-right">
              <button class="text-slate-400 hover:text-slate-600 text-xs font-semibold">Details</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</main>