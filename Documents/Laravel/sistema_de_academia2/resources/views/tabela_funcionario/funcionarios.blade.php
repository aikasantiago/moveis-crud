<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Funcionarios') }}
        </h2>
    </x-slot>
    
    @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session()->get('message') }}
            </div>
        @endif
    
    <a href="{{ route('funcionarios.create') }}" class="mb-4 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Criar</a>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full bg-white dark:bg-gray-800">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Nome</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Data de Nascimento</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">CPF</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Número</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 dark:border-gray-700 text-left text-xs font-semibold text-gray-600 dark:text-gray-300 uppercase tracking-wider">Email</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @foreach ($funcionarios as $funcionario)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">{{ $funcionario->nome }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $funcionario->data_de_nascimento }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $funcionario->cpf }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $funcionario->numero }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">{{ $funcionario->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('funcionarios.edit', ['funcionario' => $funcionario->id]) }}" class="text-blue-600 hover:text-blue-900">Editar</a> |
                                    <a href="{{ route('funcionarios.show', ['funcionario' => $funcionario->id]) }}">Excluir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

