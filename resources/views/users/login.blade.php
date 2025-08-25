@extends('layouts.app')

@section('title', 'Entrar — Minha Loja')

@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-md-6 col-lg-5">
    <div class="card p-4">
      <h1 class="h4 mb-3">Entrar</h1>
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">E-mail</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Senha</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button class="btn btn-accent w-100" type="submit">Entrar</button>
      </form>
    </div>
  </div>
</div>
@endsection
