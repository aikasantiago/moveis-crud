<x-app-layout>
    <div class="container mx-auto mt-12 p-8 bg-white rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Funcionario - {{ $funcionario->nome }}</h2>

        <p class="text-gray-600 mb-8">
            Tem certeza de que deseja excluir este suplemento? Esta ação é irreversível.
        </p>

        <form action="{{ route('funcionarios.destroy', ['funcionario' => $funcionario->id]) }}" method="post" class="inline-block">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">
                Excluir
            </button>
        </form>

        <a href="{{ route('funcionarios.index') }}" class="inline-block ml-4 text-blue-500 hover:text-blue-600 font-semibold transition duration-300">
            Cancelar
        </a>
    </div>
</x-app-layout>


