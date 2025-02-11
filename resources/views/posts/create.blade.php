<x-layout>
    <x-slot:heading>
        <h1 class="text-3xl font-bold text-center text-gray-800">Tạo bài viết</h1>
    </x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6 mt-6">
        <form action="{{ route('posts.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold">Tiêu đề</label>
                <input type="text" name="title" placeholder="Tiêu đề" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Mô tả</label>
                <input type="text" name="description" placeholder="Mô tả" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Hình ảnh</label>
                <input type="text" name="image_path" placeholder="URL hình ảnh" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">Nội dung</label>
                <textarea name="content" placeholder="Nội dung" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 h-32"></textarea>
            </div>

            <div>
                <label class="block text-gray-700 font-semibold">ID của Tag</label>
                <input type="number" name="tag_id" placeholder="ID của Tag" required
                    class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300">
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Lưu</button>
            </div>
        </form>
    </div>
</x-layout>
