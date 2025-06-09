<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-white"><i class="fa-solid fa-book-open"></i> Todos os Livros</h2>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('books.create') }}" class="bg-indigo-500 text-white px-4 py-2 rounded">Adicionar Livro</a>
        <div class="mt-6 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($books as $book)
                <div class="bg-white rounded shadow hover:shadow-md p-2">
                    @if($book->cover_path)
                        <img src="{{ asset('storage/' . $book->cover_path) }}" class="h-40 w-full object-cover rounded mb-2" />
                    @endif
                    <h3 class="font-bold text-sm">{{ $book->title }}</h3>
                    <p class="text-xs text-gray-500">{{ $book->author }}</p>
                    <a href="{{ route('books.show', $book) }}" class="text-indigo-600 text-sm">Ver mais</a>

                    <div class="flex gap-2 mt-2 items-center">
                        <a href="{{ route('books.edit', $book) }}" class="text-indigo-600 text-sm">Editar</a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 text-sm">Excluir</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
