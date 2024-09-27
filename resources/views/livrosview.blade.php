<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do Livro') }}
        </h2>
    </x-slot>
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

        <div class="py-12" style="background-color: hsl(30, 100%, 95%);">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-bold mb-4">{{ $livro->titulo }}</h1>
                        <p class="text-gray-700 text-lg mb-2"><strong>Autor:</strong> {{ $livro->autor }}</p>
                        <div class="mb-4">
                            <p class="text-gray-600"><strong>Descrição:</strong></p>
                            <p class="mt-2 text-gray-700">{{ $livro->descricao }}</p>
                        </div>
                        @if($livro->imagem)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $livro->imagem) }}" alt="{{ $livro->titulo }}" class="w-48 h-auto">
                            </div>
                        @endif
                        @if($livro->arquivo_pdf)
                            <a href="{{ route('livros.download', $livro->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Baixar PDF
                            </a>
                        @endif
                        <a href="{{ route('livros.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Voltar para a lista de livros
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
