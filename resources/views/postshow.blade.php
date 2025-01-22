<x-layout>
    <x-slot:heading>
        <h1 class="text-4xl font-bold text-center text-gray-800">{{ $post->title }}</h1>
    </x-slot:heading>

    <div class="post-content mt-8 p-4">
        <h3> {{ $tag->name }}</h3>
        <p class="text-lg text-gray-700 leading-relaxed">{{ $post->description }}</p>

        @if($post->image_path)
            <div class="post-image mt-6 flex justify-center mb-6">
                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" class="w-8/10 h-auto rounded-lg shadow-md mx-auto">
            </div>
        @endif
        <p class="text-lg text-gray-700 leading-relaxed">{{ $post->content }}</p>

    </div>
</x-layout>
