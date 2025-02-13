<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100">

  <!-- Wrapper chứa menu -->
  <div x-data="{ open: false }" class="flex">

    <!-- Navbar bên trái -->
    <nav class="fixed top-0 left-0 w-64 h-screen bg-white shadow-lg flex flex-col p-4 
                transform md:translate-x-0 transition-transform duration-300"
         :class="open ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
      
      <div class="mb-5 text-center">
        <a href="/dashboard">
          <img src="{{ asset('uploads/images/vnexpress.png') }}" alt="Logo" class="h-8 mx-auto">
        </a>
      </div>

      <div class="flex flex-col space-y-2">
        <a href="/posts-list" class="p-3 rounded-lg hover:bg-gray-200">📄 Quản lý bài viết</a>
        <a href="/tags-list" class="p-3 rounded-lg hover:bg-gray-200">📁 Quản lý danh mục</a>
      </div>

      <!-- Đăng nhập / Đăng xuất -->
      <div class="mt-auto">
        @guest
          <a href="/login" class="p-3 rounded-lg hover:bg-gray-200 block">🔑 Đăng nhập</a>
          <a href="/register" class="p-3 rounded-lg hover:bg-gray-200 block">📝 Đăng ký</a>
        @endguest
        @auth
          <div class="border-t mt-4 pt-4">
            <p class="text-md ml-3 font-semibold text-gray-600 mb-2">{{ Auth::user()->name }}</p>
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full p-3 text-left rounded-lg hover:bg-gray-200"> Đăng xuất</button>
            </form>
          </div>
        @endauth
      </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="flex-1 min-h-screen md:ml-64">
      <!-- Header -->
      <header class="bg-gray-100 p-4 shadow-md flex items-center">
        <!-- Nút mở menu trên mobile -->
        <button @click="open = !open" class="md:hidden p-2 text-gray-600 hover:bg-gray-200 rounded-lg">
          ☰
        </button>
        <h1 class="text-2xl font-bold text-gray-900 ml-4">{{ $heading }}</h1>
      </header>

      <!-- Main content -->
      <main class="p-6">
        {{ $slot }}
      </main>
    </div>

  </div>

</body>
</html>
