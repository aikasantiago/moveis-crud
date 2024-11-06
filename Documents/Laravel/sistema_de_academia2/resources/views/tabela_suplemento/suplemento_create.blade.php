<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Cadastrar Suplemento</h2>

        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                {{ session()->get('message') }}
            </div>
        @endif

        <form action="{{ route('suplementos.store') }}" method="post" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="nome">Nome do Suplemento</label>
                <input type="text" name="nome" id="nome" placeholder="Nome do Suplemento" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="marca">Marca</label>
                <input type="text" name="marca" id="marca" placeholder="Marca" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" placeholder="Quantidade" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="peso">Peso</label>
                <input type="number" name="peso" id="peso" placeholder="Peso" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="formato">Formato</label>
                <select name="formato" id="formato" placeholder="Formato" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="Pó">Pó</option>
                    <option value="Cápsula">Cápsula</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="funcao">Função</label>
                <input type="text" name="funcao" id="funcao" placeholder="Função" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="valor">Valor</label>
                <input type="number" name="valor" id="valor" placeholder="Valor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Criar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
