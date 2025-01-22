<x-layout>
  <x-slot:heading>
      <h1>Tất cả bài viết</h1>
  </x-slot:heading>

  @if($posts->isEmpty())
      <p>Không có bài viết nào.</p>
  @else
      <ul>
          @foreach($posts as $post)
              <li class="mb-4 flex space-x-4">
                  @if($post->image_path)
                      <div class="w-32 h-32">
                          <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}"
                              class="w-full h-full object-cover rounded-md">
                      </div>
                  @endif
                  <div class="flex-1">
                      <a href="{{ route('posts.show', $post->id) }}" class="text-xl font-semibold text-black-500 hover:text-blue-500 block mb-2">
                          {{ $post->title }}
                      </a>
                      <p class="text-lg text-gray-700 leading-relaxed">{{ $post->description }}</p>
                  </div>
              </li>
          @endforeach
      </ul>
  @endif
</x-layout>
