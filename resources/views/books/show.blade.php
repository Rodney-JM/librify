<x-app-layout>
    <div class="p-4">
        <h1 class="text-2xl font-bold text-white">{{ $book->title }}</h1>
        <p class="text-sm text-gray-300">{{ $book->author }}</p>
        <p class="text-gray-300 mt-2">{{ $book->description }}</p>

        @if($book->cover_path)
            <img src="{{ asset('storage/' . $book->cover_path) }}" class="w-60 my-4" />
        @endif

        @if($book->type === 'ebook')
            <iframe src="{{ asset('storage/' . $book->file_path) }}" class="w-full h-[500px] border" frameborder="0"></iframe>
        @elseif($book->type === 'audiobook')
            <audio controls class="mt-4 w-full">
                <source src="{{ asset('storage/' . $book->file_path) }}" type="audio/mpeg">
                Seu navegador não suporta áudio.
            </audio>
        @endif
    </div>
</x-app-layout>
