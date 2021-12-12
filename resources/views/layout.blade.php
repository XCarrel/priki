<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Priki</title>

    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">

    <script src="/js/app.js" defer></script>
    @stack('page-specific-scripts')
    @livewireStyles
</head>
<body class="container-fluid">
<div class="bg-info p-3 text-center row">
    <a href="/" class="col-4"><div class="title">Priki</div></a>
    <div class="form-group col-4">
        <label class="control-label">Domaine:</label>
        <select id="dpdDomain">
            <option value="0">Tous ({{ \App\Models\Practice::allPublished()->count() }})</option>
            @foreach(\App\Models\Domain::all() as $domain)
                <option value="{{ $domain->id }}" {{ Session::get('domain') == $domain->id ? 'selected' : '' }}>{{ $domain->name }} ({{ $domain->publishedPractices()->count() }})</option>
            @endforeach
        </select>
    </div>
    <div class="col-4">
        @if (Auth::check())
            <p>{{ Auth::user()->name }}</p>
            <p class="text-xs text-light">{{ Auth::user()->fullname }}</p>
            <form method="post" action="logout">
                @csrf
                <button type="submit" class="btn btn-primary btn-sm">Déco</button>
            </form>
        @else
            <a class="btn btn-primary" href="login">Connexion</a>
        @endif
    </div>
</div>
@yield('content')
@livewireScripts
</body>
</html>
