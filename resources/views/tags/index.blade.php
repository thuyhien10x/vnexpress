<x-admin-layout>
    <x-slot:heading>
        <h1 class="text-2xl font-bold text-gray-800">Danh sách danh mục</h1>
    </x-slot:heading>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
    <h2 class="text-lg font-semibold text-gray-700 mb-4">Thêm danh mục mới</h2>
    
    <form action="{{ route('tag.store') }}" method="POST" class="flex space-x-2">
    @csrf
    <input type="text" name="name" placeholder="Nhập tên danh mục" 
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
    
    <button type="submit" 
        class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
        Thêm
    </button>
</form>


    @if ($errors->has('name'))
        <p class="text-red-500 text-sm mt-2">{{ $errors->first('name') }}</p>
    @endif
</div>


    @if($tags->isEmpty())
        <p class="text-gray-500 text-center mt-4">Không có danh mục.</p>
    @else
        <ul class="mt-4 space-y-3">
            @foreach($tags as $tag)
                <li class="flex justify-between items-center bg-white shadow-md rounded-lg p-4 hover:bg-gray-50 transition">
                    <div class="flex items-center space-x-3">
                        <span class="text-lg font-medium text-blue-600">
                            <a href="{{ route('tags.show', $tag->id) }}" class="hover:underline">{{ $tag->name }}</a>
                        </span>
                    </div>
                    <div class="space-x-2">
                        <a href="{{ route('tags.edit', $tag->id) }}" class="text-sm text-white bg-yellow-500 px-3 py-1 rounded-lg hover:bg-yellow-600 transition">Sửa</a>
                       
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</x-admin-layout>
