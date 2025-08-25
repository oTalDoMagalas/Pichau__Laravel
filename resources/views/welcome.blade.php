@extends('layouts.app')

@section('title', 'Início — Minha Loja')

@section('content')
<div class="p-3 p-md-4 rounded-4" style="background:linear-gradient(135deg, rgba(255,106,0,.12), rgba(255,106,0,0) 60%); border:1px solid rgba(255,255,255,.06)">
  <div class="row align-items-center g-3">
    <div class="col-md-7">
      <h1 class="display-5 fw-bold mb-2">Promoções que queimam 🔥</h1>
      <p class="lead text-secondary">Monte seu setup gamer com placas de vídeo, teclados mecânicos e monitores 144Hz. Preços imperdíveis, estilo Pichau!</p>
      <div class="d-flex gap-2 mt-2">
        <a href="#" class="btn btn-accent btn-lg">Ver ofertas</a>
        <a href="#" class="btn btn-outline-light btn-lg">PCs Gamer</a>
      </div>
    </div>
    <div class="col-md-5">
      <div class="card p-3">
        <div class="d-flex align-items-center gap-3">
          <i class="bi bi-gpu-card fs-1"></i>
          <div>
            <div class="h5 mb-0">Placa de Vídeo RTX</div>
            <div class="small text-secondary">Entrega rápida • Garantia 12 meses</div>
          </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <span class="text-secondary">a partir de</span>
          <span class="price fs-4">R$ 1.999,90</span>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="mt-4">
  <h2 class="h4 mb-3">Destaques</h2>
  <div class="row g-3">
    @for($i=0;$i<8;$i++)
    <div class="col-6 col-md-4 col-lg-3">
      <div class="card h-100">
        <img src="https://picsum.photos/seed/prod{{ $i }}/600/400" class="card-img-top" alt="Produto">
        <div class="card-body">
          <h3 class="h6">Produto {{ $i+1 }}</h3>
          <div class="price">R$ {{ number_format(199.9 + $i*10, 2, ',', '.') }}</div>
        </div>
        <div class="card-footer bg-transparent border-0">
          <button class="btn btn-accent w-100">Comprar</button>
        </div>
      </div>
    </div>
    @endfor
  </div>
</div>

@if (Auth::check())
  <div class="alert alert-success mt-4">Olá, {{ Auth::user()->name }}! Você está logado.</div>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm mt-2"><i class="bi bi-box-arrow-right"></i> Sair</button>
  </form>
@endif
@endsection
