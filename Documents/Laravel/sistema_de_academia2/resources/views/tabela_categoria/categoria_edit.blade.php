<x-app-layout>
    <div class="max-w-2xl mx-auto py-12">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Categorias</h2>


        <form action="{{ route('categorias.update', ['categoria' => $categoria->id]) }}" method="post" class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input type="hidden" name="_method" value="PUT">

            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $categoria->funcao }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Editar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

