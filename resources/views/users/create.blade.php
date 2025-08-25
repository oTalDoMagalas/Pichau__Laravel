@extends('layouts.app')

@section('title', 'Novo Usuário — Minha Loja')

@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-md-7 col-lg-6">
    <div class="card p-4">
      <h1 class="h4 mb-3">Novo Usuário</h1>
      <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Nome</label>
          <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button class="btn btn-accent w-100">Salvar</button>
      </form>
    </div>
  </div>
</div>
@endsection
