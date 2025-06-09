<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-white flex items-center gap-2">
            <i class="fa-solid fa-plus mr-2"></i> Novo Livro
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto border border-gray-300 shadow-md rounded-lg p-8 mt-6">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 mb-4">
            @csrf

            <div>
                <x-input-label for="title" value="Título" />
                <x-text-input 
                    id="title" name="title" type="text" 
                    class="w-full mt-1 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                    required 
                    placeholder="Digite o título do livro" 
                />
            </div>

            <div>
                <x-input-label for="author" value="Autor" />
                <x-text-input 
                    id="author" name="author" type="text" 
                    class="w-full mt-1 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500" 
                    required 
                    placeholder="Nome do autor" 
                />
            </div>

            <div>
                <x-input-label for="genre" value="Gênero" />
                    <select name="genre" id="genre" class="w-full rounded border-gray-300">
                        <option value="">Selecione um gênero</option>
                        <option value="Romance" {{ old('genre', $book->genre ?? '') == 'Romance' ? 'selected' : '' }}>Romance</option>
                        <option value="Ficção" {{ old('genre', $book->genre ?? '') == 'Ficção' ? 'selected' : '' }}>Ficção</option>
                        <option value="Suspense" {{ old('genre', $book->genre ?? '') == 'Suspense' ? 'selected' : '' }}>Suspense</option>
                        <option value="Drama" {{ old('genre', $book->genre ?? '') == 'Drama' ? 'selected' : '' }}>Drama</option>
                        <option value="Aventura" {{ old('genre', $book->genre ?? '') == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                        <option value="Outros" {{ old('genre', $book->genre ?? '') == 'Outros' ? 'selected' : '' }}>Outros</option>
                    </select>

            </div>

            <div>
                <x-input-label for="description" value="Descrição" />
                <textarea 
                    id="description" name="description" rows="4" 
                    class="w-full mt-1 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 resize-none p-2" 
                    placeholder="Escreva uma breve descrição do livro"
                ></textarea>
            </div>

            <div>
                <x-input-label for="cover" value="Capa" />
                <input 
                    type="file" id="cover" name="cover" 
                    accept="image/*" 
                    class="w-full mt-1 text-gray-600 file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0
                           file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700
                           hover:file:bg-indigo-100
                           cursor-pointer"
                />
            </div>

            <div>
                <x-input-label for="file" value="Arquivo do Livro (PDF/EPUB/MP3)" />
                <input 
                    type="file" id="file" name="file" 
                    accept=".pdf,.epub,audio/mpeg,audio/mp3" 
                    class="w-full mt-1 text-gray-600 file:mr-4 file:py-2 file:px-4
                           file:rounded file:border-0
                           file:text-sm file:font-semibold
                           file:bg-indigo-50 file:text-indigo-700
                           hover:file:bg-indigo-100
                           cursor-pointer"
                    
                />
            </div>

            <div>
                <x-input-label for="type" value="Tipo" />
                <select 
                    name="type" id="type" 
                    class="w-full mt-1 rounded-md border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="ebook">E-book</option>
                    <option value="audiobook">Audiobook</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Salvar
                </button>

            </div>
        </form>
    </div>
</x-app-layout>
