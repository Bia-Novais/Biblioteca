<x-app-layout style="background-color: hsl(30, 100%, 95%);">


    <div class="flex" style="background-color: hsl(30, 100%, 95%);" >
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

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-2xl font-bold mb-6">Livros Cadastrados</h1>

                        <!-- Tabela com livros -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($livros as $livro)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $livro->titulo }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $livro->autor }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="/edit/{{ $livro->id }}" class="text-indigo-600 hover:text-indigo-900"> Editar</a> | 
                                            <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
