<x-layout title="Editar user">
    <form action="{{ route('dev-users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3" style="width: 200px;">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required>
        </div>
        <div class="mb-3" style="width: 200px;">
            <label for="funcao" class="form-label">Função:</label>
            <input type="text" id="funcao" name="funcao" class="form-control" value="{{ old('funcao', $user->funcao) }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</x-layout>
