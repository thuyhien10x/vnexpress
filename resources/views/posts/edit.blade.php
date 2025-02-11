<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold text-center text-gray-800">Chỉnh sửa bài viết</h1>
    </x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700 font-semibold">Tiêu đề</label>
                <input type="text" name="title" value="{{ $post->title }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Mô tả</label>
                <input type="text" name="description" value="{{ $post->description }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Đường dẫn ảnh</label>
                <input type="text" name="image_path" value="{{ $post->image_path }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Nội dung</label>
                <textarea name="content" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 h-32">{{ $post->content }}</textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Tag ID</label>
                <input type="number" name="tag_id" value="{{ $post->tag_id }}" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Cập nhật</button>
            </div>
        </form>
    </div>
</x-layout>
