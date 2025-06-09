<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Librify</h2>
    </x-slot>

    <div class="grid grid-cols-5 h-[calc(100vh-64px)]">
        <!-- Sidebar -->
        <aside class="col-span-1 bg-gray-900 text-white p-4 space-y-6">
            <div>
                <h1 class="text-2xl font-bold">Librify</h1>
            </div>
            <nav class="space-y-4">
                <a href="{{ route('books.index') }}" class="block hover:text-blue-400 transition-all"><i class="fa-solid fa-book mr-2"></i> Biblioteca</a>
                <a href="{{ route('books.create') }}" class="block hover:text-blue-400 transition-all"><i class="fa-solid fa-plus mr-2"></i> Adicionar Livro</a>
                <a href="#" class="block hover:text-blue-400 transition-all"><i class="fa-solid fa-heart mr-2"></i> Favoritos</a>
                <a href="#" class="block hover:text-blue-400 transition-all"><i class="fa-solid fa-clipboard-list mr-2"></i> Minhas Listas</a>
            </nav>
        </aside>

        <!-- Conteúdo principal -->
        <main class="col-span-4 bg-gray-100 overflow-y-auto p-6">
            <h2 class="text-xl font-semibold mb-4"><i class="fa-solid fa-book-open"></i> Seus Livros</h2>

            @if ($books->isEmpty())
                <p>Você ainda não adicionou nenhum livro.</p>
            @else
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                    @foreach ($books as $book)
                        <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
                            @if ($book->cover_path)
                                <img src="{{ asset('storage/' . $book->cover_path) }}" alt="{{ $book->title }}" class="w-full h-40 object-cover rounded-md mb-2">
                            @endif

                            <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $book->author }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $book->type }}</p>

                            <div class="flex justify-between items-center mt-3">
                                <a href="{{ route('books.edit', $book) }}" class="text-indigo-500 text-sm">Editar</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 text-sm">Excluir</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    </div>

</x-app-layout>