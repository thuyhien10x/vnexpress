<x-layout>
    <x-slot:heading>
        <h1 class="text-2xl font-bold text-gray-800">Danh sách bài viết</h1>
    </x-slot:heading>

    <div class="max-w-10xl mx-auto">
        <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
            Tạo bài viết
        </a>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            @foreach($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-4 flex flex-col h-[420px]">
                <h2 class="text-xl font-semibold text-gray-900 h-20 overflow-hidden">
                    {{ $post->title }}
                </h2>

                <div class="mt-2">
                    <img src="{{ Storage::url($post->image_path) }}" alt="Post Image" class="w-full h-40 object-cover rounded-lg">
                </div>

                <p class="text-gray-700 mt-2 h-40 overflow-hidden">
                    {{ $post->description }}
                </p>

                <div class="mt-auto flex justify-between items-center pt-4">
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.show', $post->id) }}"
                            class="px-3 py-1 bg-green-500 text-white rounded-lg text-sm hover:bg-green-600">
                            Xem
                        </a>
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-sm hover:bg-yellow-600">
                            Sửa
                        </a>
                    </div>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa bài viết này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded-lg text-sm hover:bg-red-600">
                            Xóa
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-layout>