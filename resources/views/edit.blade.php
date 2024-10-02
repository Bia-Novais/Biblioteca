{{-- resources/views/editar.blade.php --}}
<x-app-layout style="background-color: hsl(30, 100%, 95%);">


    <div class="flex">
        <!-- Sidebar Menu Vertical -->
        <aside class="w-64 h-screen" style="background-color: hsl(25, 50%, 50%); color: white;">
            <nav class="px-6 py-4">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded hover:bg-[rgba(216, 183, 163, 0.5)]">
                            Adicionar Novo Livro
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('livros.store') }}" class="block py-2 px-4 rounded hover:bg-[rgba(216, 183, 163, 0.5)]">
                            Listar Livros
                        </a>
                    </li>
                               
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-12" style="background-color: hsl(30, 100%, 95%);">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div style="background-color: hsl(25, 30%, 85%);" class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white text-gray-900 rounded-lg">
                        <h1 class="text-2xl font-bold mb-6" style="color:   rgb(201, 89, 14);">Editar Novo Livro</h1>
                        <form action="{{ route('livros.atualizar', $livro->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset class="mb-4">
                            <legend class="text-lg font-semibold" style="color:   rgb(201, 89, 14);">Informações do Livro</legend>

                            <div class="mb-4">
                                <label for="titulo" class="block text-sm font-medium text-gray-700">Título</label>
                                <input type="text" value="{{ $livro->titulo }}" name="titulo" id="titulo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[rgb(155, 110, 214)] focus:ring focus:ring-[rgb(155, 110, 214)] focus:ring-opacity-50" required>
                                @error('titulo')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="autor" class="block text-sm font-medium text-gray-700">Autor</label>
                                <input type="text" name="autor" value="{{ $livro->autor }}" id="autor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[rgb(155, 110, 214)] focus:ring focus:ring-[rgb(155, 110, 214)] focus:ring-opacity-50" required>
                                @error('autor')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição</label>
                                <textarea name="descricao" id="descricao" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[rgb(155, 110, 214)] focus:ring focus:ring-[rgb(155, 110, 214)] focus:ring-opacity-50">{{ $livro->descricao }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="arquivo_pdf" class="block text-sm font-medium text-gray-700">Arquivo PDF</label>
                                <input type="file" name="arquivo_pdf" id="arquivo_pdf" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[rgb(155, 110, 214)] focus:ring focus:ring-[rgb(155, 110, 214)] focus:ring-opacity-50">
                                @error('arquivo_pdf')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="imagem" class="block text-sm font-medium text-gray-700">Imagem</label>
                                <input type="file" name="imagem" id="imagem" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[rgb(155, 110, 214)] focus:ring focus:ring-[rgb(155, 110, 214)] focus:ring-opacity-50">
                                @error('imagem')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </fieldset>

                        <button type="submit" style="background-color: rgb(201, 89, 14);" class="hover:bg-[rgb(207, 161, 144)] text-white px-4 py-2 rounded focus:outline-none focus:shadow-outline">Atualizar Livro</button>
                    </form>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
