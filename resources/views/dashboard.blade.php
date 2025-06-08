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
                <a href="{{ route('books.index') }}" class="block hover:text-green-400">📚 Biblioteca</a>
                <a href="{{ route('books.create') }}" class="block hover:text-green-400">➕ Adicionar Livro</a>
                <a href="#" class="block hover:text-green-400">❤️ Favoritos</a>
                <a href="#" class="block hover:text-green-400">📜 Minhas Listas</a>
            </nav>
        </aside>

        <!-- Conteúdo principal -->
        <main class="col-span-4 bg-gray-100 overflow-y-auto p-6">
            <h2 class="text-xl font-semibold mb-4">📚 Seus Livros</h2>

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

    <!-- Player Fixo -->
    <footer class="fixed bottom-0 left-0 right-0 bg-white shadow-inner h-20 flex items-center justify-between px-6">
        <div class="flex items-center gap-4">
            <img src="https://via.placeholder.com/50" class="h-12 w-12 object-cover rounded" alt="">
            <div>
                <p class="text-sm font-semibold">Título do Livro</p>
                <p class="text-xs text-gray-500">Autor</p>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <button class="text-gray-600 hover:text-black">⏮️</button>
            <button class="text-gray-600 hover:text-black">▶️</button>
            <button class="text-gray-600 hover:text-black">⏭️</button>
        </div>
    </footer>
</x-app-layout>