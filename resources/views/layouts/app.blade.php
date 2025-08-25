<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Minha Loja')</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root{
            --bg: #0f0f10;
            --bg-2: #151517;
            --text: #e7e7e9;
            --muted: #a5a7ab;
            --accent: #ff6a00; /* laranja Pichau-like */
            --accent-2: #ff8533;
            --card: #1a1b1e;
            --success:#2ecc71;
            --danger:#e74c3c;
        }
        *{ box-sizing: border-box; }
        html, body { height:100%; }
        body{
            background: var(--bg);
            color: var(--text);
            font-family: system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji","Segoe UI Emoji";
        }
        a{ color: var(--text); text-decoration: none; }
        a:hover{ color: var(--accent-2); }
        .navbar{
            background: var(--bg-2);
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .brand{
            font-weight: 800;
            letter-spacing: .5px;
        }
        .badge-accent{
            background: var(--accent);
            color: #111;
            font-weight: 700;
        }
        .btn-accent{
            background: var(--accent);
            color: #111;
            border: none;
        }
        .btn-accent:hover{ background: var(--accent-2); color:#111; }
        .search-input{
            background: #0e0f11;
            border: 1px solid rgba(255,255,255,.08);
            color: var(--text);
        }
        .search-input::placeholder{ color: var(--muted); }
        .card{
            background: var(--card);
            border: 1px solid rgba(255,255,255,.06);
            color: var(--text);
        }
        .card .price{ color: var(--accent-2); font-weight: 700; }
        footer{
            border-top: 1px solid rgba(255,255,255,.06);
            background: var(--bg-2);
            color: var(--muted);
        }
        .pill{
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 999px;
            padding: .375rem .75rem;
            color: var(--muted);
        }
    </style>

    @stack('head')
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top">
  <div class="container-xxl">
    <a class="navbar-brand d-flex align-items-center gap-2 brand" href="{{ url('/') }}">
        <i class="bi bi-cpu"></i> Minha Loja
        <span class="badge rounded-pill badge-accent ms-2">HOT</span>
    </a>

    <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <ul class="navbar-nav me-3 mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#">Ofertas</a></li>
        <li class="nav-item"><a class="nav-link" href="#">PCs Gamer</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Periféricos</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Hardware</a></li>
      </ul>

      <form class="d-flex flex-grow-1 me-3" role="search">
        <input class="form-control search-input" type="search" placeholder="Buscar produtos, marcas..." aria-label="Search">
      </form>

      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
        @if (Route::has('login'))
            @auth
                <li class="nav-item me-2"><a class="nav-link" href="{{ url('/dashboard') }}"><i class="bi bi-speedometer2"></i> Painel</a></li>
            @else
                <li class="nav-item me-2">
                    <a class="btn btn-accent" href="{{ route('login') }}"><i class="bi bi-person"></i> Entrar</a>
                </li>
            @endauth
        @endif
        <li class="nav-item">
            <a class="nav-link position-relative" href="#">
                <i class="bi bi-cart3 fs-5"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-accent">0</span>
            </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="py-4">
  <div class="container-xxl">
    @yield('content')
  </div>
</main>

<footer class="py-4">
  <div class="container-xxl d-flex justify-content-between align-items-center">
    <div class="small">© {{ date('Y') }} Minha Loja — Todos os direitos reservados.</div>
    <div class="d-flex gap-2">
      <span class="pill">Suporte</span>
      <span class="pill">Trocas</span>
      <span class="pill">Frete</span>
    </div>
  </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stack('scripts')
</body>
</html>
