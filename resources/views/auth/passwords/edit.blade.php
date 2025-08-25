<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Senha</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/geral.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        /* 2 colunas */
        gap: 15px;
        /* espaçamento entre colunas e linhas */
        max-width: 600px;
    }

    /* inputs */
    .password,
    .email,
    .name {
        width: 100%;
        height: 40px;
        padding: 0.5rem;
        border: 1px solid #000000;
        border-radius: 5px;
        background: #dedede;
        cursor: pointer;
    }

    /* hover e focus */
    .password:hover,
    .email:hover,
    .name:hover {
        background: #9e9e9e;
    }

    .password:focus,
    .email:focus,
    .name:focus {
        border: 2px solid #353654;
        outline: none;
    }

    /* labels acima dos inputs */
    label {
        display: block;
    }

    .btn{
        margin-top: 15px;
    }
</style>

<body>
    <header>
        <h1>Crud completo</h1>
    </header>
    <main>
        <div class="main-container">
            <h1 class="mb-3">Editar nome, email e senha</h1>
            <?php
            if (session('status')) {
                echo '<div style="color:green">' . session('status') . '</div>';
            }
            if (session('success')) {
                echo '<div style="color:green">' . session('success') . '</div>';
            }
            if ($errors->any()) {
                echo '<div style="color:red">' . $errors->first() . '</div>';
            }
            ?>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <div>
                    <label>Email atual:</label>
                    <input type="email" name="current_email" class="email mt-3" value="{{ old('current_email') }}" required autofocus placeholder="Digite seu email atual">
                </div>
                <div>
                    <label>Novo nome:</label>
                    <input type="text" name="name" class="name mt-3" value="{{ old('name') }}" placeholder="Digite seu novo nome">
                </div>
                <div>
                    <label>Novo email:</label>
                    <input type="email" name="email" class="email mt-3" value="{{ old('email') }}" placeholder="Digite seu novo email">
                </div>
                <div>
                    <label>Nova senha:</label>
                    <input type="password" name="password" class="password mt-3" required placeholder="Digite sua nova senha">
                </div>
                <div>
                    <label>Confirme sua senha:</label>
                    <input type="password" name="password_confirmation" class="password confirmation mt-3" required placeholder="Confirme sua nova senha">
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('login') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p class="mt-3">&copy; 2025 Crud completo. Todos os direitos reservados.</p>
    </footer>
</body>

</html>