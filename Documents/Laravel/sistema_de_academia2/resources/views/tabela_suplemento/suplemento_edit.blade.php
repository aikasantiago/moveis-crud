<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Editar Suplemento</h2>


        <form action="{{ route('suplementos.update', ['suplemento' => $suplemento->id]) }}" method="post" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $suplemento->nome }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="{{ $suplemento->marca }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="quantidade">Quantidade</label>
                <input type="text" name="quantidade" id="quantidade" value="{{ $suplemento->quantidade }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="peso">Peso</label>
                <input type="text" name="peso" id="peso" value="{{ $suplemento->peso }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
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
                <input type="text" name="funcao" id="funcao" value="{{ $suplemento->funcao }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="valor">Valor</label>
                <input type="text" name="valor" id="valor" value="{{ $suplemento->valor }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Editar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
