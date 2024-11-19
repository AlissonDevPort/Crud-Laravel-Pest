<x-layout title="Novo user">
    <form action="{{route('dev-users.store')}}" method="post">
        @csrf
        <div class="mb-3" style="width: 200px;"
        >
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <div class="mb-3" style="width: 200px;"
        >
            <label for="funcao" class="form-label">Função:</label>
            <input type="text" id="funcao" name="funcao" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>
