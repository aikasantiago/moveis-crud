<br>
<h2>Editar</h2>

@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<form action="{{ route('movels.update', ['movel' => $movel->id]) }}" method="post">
    @csrf
    @method('PUT') <!-- Use esta diretiva do Blade para definir o método PUT -->
    
    <h6>Nome do móvel</h6>
    <input type="text" name="nome" placeholder="Digite o nome do móvel" value="{{ old('nome', $movel->nome) }}"> 
    <br><br>
    
    <h6>Preço do móvel</h6>
    <input type="text" name="preco" placeholder="Digite o preço do móvel" value="{{ old('preco', $movel->preco) }}">
    <br><br>
    
    <h6>Estoque</h6>
    <input type="text" name="estoque" placeholder="Digite o estoque do móvel" value="{{ old('estoque', $movel->estoque) }}"> 
    <br><br>

    <h6>Estoque</h6>
    <input type="text" name="categoria" placeholder="Digite o categoria do móvel" value="{{ old('categoria', $movel->categoria) }}"> 
    <br><br>
    
    <button type="submit" class="btn btn-secondary">Concluir</button>
    <a href="{{ route('movels.index') }}" class="btn btn-danger">Cancelar</a>
</form>

@endsection
