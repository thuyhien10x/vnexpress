<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HomePage</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
  .scrollbar-hidden::-webkit-scrollbar {
    display: none;
  }
  .scrollbar-hidden {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
</style>
</head>

<body class="h-full">

  <div class="min-h-full">

    <nav class="bg-white">

      <div class="mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between h-10 mx-10">
          <!-- Phần bên trái (Ảnh vnexpress) -->
          <div class="flex items-center">
            <x-nav-link class="hover:" href="/">
              <img src="{{ asset('uploads/images/vnexpress.png') }}" alt="Home" class="h-6 w-auto">
            </x-nav-link>
          </div>

          <!-- Phần bên phải (Login và tên đăng nhập) -->
          <div class="flex items-center space-x-4 ml-auto">
            <!-- Kiểm tra nếu chưa đăng nhập -->
            @guest
            <!-- Nút Login -->
            <x-nav-link href="/dashboard">Login</x-nav-link>
            <x-nav-link href="/register">Register</x-nav-link>
            @endguest

            <!-- Kiểm tra nếu đã đăng nhập -->
            @auth
            <div class="flex items-center">
              <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                  <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                    <div>{{ Auth::user()->name }}</div>
                    <div class="ms-1">
                      <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                      </svg>
                    </div>
                  </button>
                </x-slot>
                <x-slot name="content">
                  <x-dropdown-link :href="route('profile.edit')">{{ __('Profile') }}</x-dropdown-link>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">{{ __('Log Out') }}</x-dropdown-link>
                  </form>
                </x-slot>
              </x-dropdown>
            </div>
            @endauth
          </div>
        </div>
      </div>

      {{-- nav cac the loai bai bao khi o man hình lớn--}}
      <div class="hidden md:block mx-auto  px-4 sm:px-6 ">
        <div class="flex h-16 items-center justify-between ml-9">
          <div class="flex items-center">
            <div class="hidden md:block">
              <div class="ml-10 flex items-baseline space-x-4">
                <x-nav-link href="/">
                  Trang chủ
                </x-nav-link>
                @foreach($tagData as $tag)
                <x-nav-link href="{{ route('tags.show', ['tagId' => $tag->id]) }}">
                  {{ $tag->name }}
                </x-nav-link>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Mobile menu-->
      <div class="block md:hidden mx-auto px-4 sm:px-6">
        <div class="flex h-16 items-center justify-between ml-9">
          <div class="flex items-center w-full">
            <div class="w-full overflow-x-auto whitespace-nowrap scrollbar-hidden">
              <div class="ml-10 flex space-x-4">
                <x-nav-link href="/">Trang chủ</x-nav-link>
                @foreach($tagData as $tag)
                <x-nav-link href="{{ route('tags.show', ['tagId' => $tag->id]) }}">
                  {{ $tag->name }}
                </x-nav-link>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>

    </nav>

   
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{$slot}}
      </div>
    </main>
  </div>
  <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>