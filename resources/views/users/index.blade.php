@extends('layouts.app')

@section('title', 'Usuários — Minha Loja')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h1 class="h4 m-0">Usuários</h1>
  @if (Route::has('users.create'))
    <a href="{{ route('users.create') }}" class="btn btn-accent"><i class="bi bi-plus-circle"></i> Novo</a>
  @endif
</div>

<div class="card p-0">
  <div class="table-responsive">
    <table class="table table-dark table-hover align-middle m-0">
      <thead>
        <tr>
          <th>#</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th class="text-end">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users ?? [] as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td class="text-end">
              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-light"><i class="bi bi-pencil"></i></a>
              <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir {{ $user->name }}?')"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-center text-secondary">Nenhum usuário encontrado.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
