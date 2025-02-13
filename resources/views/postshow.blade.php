<x-layout >
    <x-slot:heading>
        {{-- <h1 class=" text-4xl font-bold text-center text-gray-800">{{ $post->title }}</h1> --}}
    </x-slot:heading>

    <div class="post-content  mx-auto max-w-6xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold  text-gray-800 mb-5">{{ $post->title }}</h1>

        <h3 class="text-gray-800 mb-2"> {{ $tag->name }}</h3>
        <p class="text-lg text-gray-700 leading-relaxed mb-8">{{ $post->description }}</p>

        @if($post->image_path)
            <div class="post-image mt-6 flex justify-center mb-8">
                <img src="{{ asset($post->image_path) }}" alt="{{ $post->title }}" class="w-8/10 h-auto rounded-lg shadow-md mx-auto">
            </div>
        @endif
        <p class="text-lg text-gray-700 leading-relaxed">{!! nl2br(e($post->content)) !!}</p>

    </div>
</x-layout>
